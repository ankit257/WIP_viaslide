<?php
	class Controller_Siteuser {
		
		public	$SiteUser_Model;
		

		public function __construct() {
			require_once('model/account/model_account_siteuser.php');
			$this->SiteUser_Model =  new Model_SiteUser();
		}
		
		public function index() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			$sortby = isset($_GET[sort]) ? $_GET[sort] : 'user_name';
			$sortorder = isset($_GET[order]) ? $_GET[order] : 'ASC';
			
			$pageNo = isset($_POST[page]) ? $_POST[page] : 1;
		
			$query ="1";
			if(isset($_GET[filter_title]) && isset($_GET[filter_status])) {
				$query = "user_name like '$_GET[filter_title]%' and status = $_GET[filter_status] order by $sortby $sortorder";
			}else if( isset($_GET[filter_title]) ) {
				$query = "user_name like '$_GET[filter_title]%' order by $sortby $sortorder";
			}else if( isset($_GET[filter_status]) ) {
				$query = "status = $_GET[filter_status] order by $sortby $sortorder";
			}else {
				$query = "1 order by $sortby $sortorder";
			}
			//echo $query;
			$results = $this->SiteUser_Model->getDetailsByQuery("*", $query, $pageNo);
			
			$totalRecords = $this->SiteUser_Model->TotalRecords($query);
			$pageLimit = ADMIN_PAGE_LIMIT;
			$recordFrom = (($pageNo-1) * $pageLimit) + 1 ;
			$recordTo = $recordFrom + count($results) - 1;
			$totalPages = ceil($totalRecords/$pageLimit);

			global $header; global $menu; global $footer;
			include_once('view/templates/account/template_account_siteuser.php');

		}
		

		public function insert() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			$notification = ""; $username=""; $meta_description=""; $meta_keyword=""; $content=""; $parent=""; $filter=""; $keyword=""; $image=""; $top="0"; $column="1"; $sort_order="0"; $status="1"; 
			if(isset($_POST['info'])) {
				$dbInfo = $_POST['info'] ;
				
				$username=$dbInfo['user_name']; $first_name=$dbInfo['first_name']; $last_name=$dbInfo['last_name']; $password=$dbInfo['password']; $email=$dbInfo['email']; $image=$dbInfo['image']; $status=$dbInfo['status'];
			
				$user_name_error = empty($dbInfo['user_name']) || strlen($dbInfo['user_name'])<2 || strlen($dbInfo['user_name'])>32 ? "User Name must be between 2 and 32 characters!" : "" ;
				
				$email_error = empty($dbInfo['email']) || strlen($dbInfo['email'])<10 || strlen($dbInfo['email'])>100 ? "User Email must be between 10 and 100 characters!" : "" ;
				
				$pwd_error = empty($_POST['password']) || strlen($_POST['password'])<6 || strlen($_POST['password'])>32 ? "User Password must be between 6 and 32 characters!" : "" ;

				
				if(!empty($user_name_error) || !empty($email_error) || !empty($pwd_error))
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				else {
					$dbInfo['password']=md5($dbInfo['password']);
					$dbInfo['created'] = time();
					$dbInfo['modified'] = time();
					if($this->SiteUser_Model->insert($dbInfo)) {
						echo '<script>window.location.href="index.php?route=account/siteuser"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				//echo "<pre>"; print_r($dbInfo); echo "</pre>";echo "<pre>"; print_r($_POST); echo "</pre>";
	
			}
			global $header; global $menu; global $footer;
			include_once('view/templates/account/template_account_form.php');
			
		}


		public function update() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			if(isset($_POST['info'])) {
				//print_r($_POST);
				$dbInfo = $_POST['info'] ;
				
				$user_name_error = empty($dbInfo['user_name']) || strlen($dbInfo['user_name'])<2 || strlen($dbInfo['user_name'])>32 ? "User Name must be between 2 and 32 characters!" : "" ;
				
				$email_error = empty($dbInfo['email']) || strlen($dbInfo['email'])<10 || strlen($dbInfo['user_name'])>100 ? "User Email must be between 10 and 100 characters!" : "" ;

				if(!empty($user_name_error) || !empty($email_error) ) {
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				} else {
					if(  !empty( $_POST['password'] )  )
						$dbInfo['password']=md5($_POST['password']);
	
					$dbInfo['modified'] = time();
					if($this->SiteUser_Model->edit($dbInfo, $_GET['id'])) {
						echo '<script>window.location.href="index.php?route=account/siteuser"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				
			}else {
				$dbInfo =  $this->SiteUser_Model->getDetailsById($_GET['id']);
			}
			
			$username=$dbInfo['user_name']; $first_name=$dbInfo['first_name']; $last_name=$dbInfo['last_name']; $password=""; $email=$dbInfo['email']; $image=$dbInfo['image']; $status=$dbInfo['status'];
			
			global $header; global $menu; global $footer;
			include_once('view/templates/account/template_account_siteuser_form.php');

		}

		public function delete() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			//echo "<pre>"; print_r($_POST); echo "<pre>";
			if($this->SiteUser_Model->toggle("deleted","id in (". implode( ",", $_POST[selected] ). ")")) {
				echo '<script>window.location.href="index.php?route=account/user"</script>';
				exit();
			} else {
				$notification	=	"Warning: Unknown Error Occurs" ;
			}
		}
		
		public function autocomplete() {
			echo json_encode ($this->SiteUser_Model->getDetailsByFilter($_GET['filter_name']));	
		}


	}

?>