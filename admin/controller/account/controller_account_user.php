<?php
	class Controller_User {
		
		public	$model;
		

		public function __construct() {
			require_once('model/account/model_account_user.php');
			$this->model =  new Model_User();
		}
		
		public function index() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			$sortby = isset($_GET[sort]) ? $_GET[sort] : 'username';
			$sortorder = isset($_GET[order]) ? $_GET[order] : 'ASC';
			
			$pageNo = isset($_POST[page]) ? $_POST[page] : 1;
		
			$query ="1";
			if(isset($_GET[filter_title]) && isset($_GET[filter_status])) {
				$query = "username like '$_GET[filter_title]%' and status = $_GET[filter_status] order by $sortby $sortorder";
			}else if( isset($_GET[filter_title]) ) {
				$query = "username like '$_GET[filter_title]%' order by $sortby $sortorder";
			}else if( isset($_GET[filter_status]) ) {
				$query = "status = $_GET[filter_status] order by $sortby $sortorder";
			}else {
				$query = "1 order by $sortby $sortorder";
			}
			//echo $query;
			$results = $this->model->getDetailsByQuery("*", $query, $pageNo);
			
			$totalRecords = $this->model->TotalRecords($query);
			$pageLimit = ADMIN_PAGE_LIMIT;
			$recordFrom = (($pageNo-1) * $pageLimit) + 1 ;
			$recordTo = $recordFrom + count($results) - 1;
			$totalPages = ceil($totalRecords/$pageLimit);

			global $header; global $menu; global $footer;
			include_once('view/templates/account/template_account_index.php');

		}
		

		public function insert() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			$notification = ""; $username=""; $meta_description=""; $meta_keyword=""; $content=""; $parent=""; $filter=""; $keyword=""; $image=""; $top="0"; $column="1"; $sort_order="0"; $status="1"; 
			if(isset($_POST[info])) {
				$dbInfo = $_POST[info] ;
				
				$username=$dbInfo[username]; $password=$dbInfo[password]; $email=$dbInfo[email]; $usergroupid=$dbInfo[user_type_id]; $image=$dbInfo[image]; $sort_order=$dbInfo[sort_order]; $status=$dbInfo[status];
			
				$information_name_error = empty($dbInfo[username]) || strlen($dbInfo[username])<2 || strlen($dbInfo[username])>32 ? "User Name must be between 2 and 32 characters!" : "" ;
				if(!empty($information_name_error))
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				else {
					$dbInfo[password]=md5($dbInfo[password]);
					$dbInfo[created] = time();
					$dbInfo[modified] = time();
					if($this->model->insert($dbInfo)) {
						echo '<script>window.location.href="index.php?route=account/user"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				//echo "<pre>"; print_r($dbInfo); echo "</pre>";echo "<pre>"; print_r($_POST); echo "</pre>";
	
			}
			$usergroups = $this->model->getAllUserGroup("id,user_type");
			global $header; global $menu; global $footer;
			include_once('view/templates/account/template_account_form.php');
			
		}


		public function update() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			if(isset($_POST[info])) {
				//print_r($_POST);
				$dbInfo = $_POST[info] ;
				
				$information_name_error = empty($dbInfo[username]) || strlen($dbInfo[username])<2 || strlen($dbInfo[username])>32 ? "Information Title must be between 2 and 32 characters!" : "" ;

				if(!empty($information_name_error)) {
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				} else {
					$dbInfo[password]=md5($dbInfo[password]);
					$dbInfo[modified] = time();
					if($this->model->edit($dbInfo, $_GET['id'])) {
						echo '<script>window.location.href="index.php?route=account/user"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				
			}else {
				$dbInfo =  $this->model->getDetailsById($_GET['id']);
			}
			
			$username=$dbInfo[username]; $password=""; $email=$dbInfo[email]; $usergroupid=$dbInfo[user_type_id]; $content=$dbInfo[content]; $image=$dbInfo[image]; $sort_order=$dbInfo[sort_order]; $status=$dbInfo[status];
			$usergroups = $this->model->getAllUserGroup("id,user_type");
			
			global $header; global $menu; global $footer;
			include_once('view/templates/account/template_account_form.php');

		}

		public function delete() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			//echo "<pre>"; print_r($_POST); echo "<pre>";
			if($this->model->toggle("deleted","id in (". implode( ",", $_POST[selected] ). ")")) {
				echo '<script>window.location.href="index.php?route=account/user"</script>';
				exit();
			} else {
				$notification	=	"Warning: Unknown Error Occurs" ;
			}
		}
		
		public function autocomplete() {
			echo json_encode ($this->model->getDetailsByFilter($_GET['filter_name']));	
		}


	}

?>