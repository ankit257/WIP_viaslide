<?php
	class Controller_Information {
		
		public	$model;
		

		public function __construct() {
			require_once('model/catalog/model_catalog_information.php');
			$this->model =  new Model_Information();
		}
		
		public function index() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			$sortby = isset($_GET[sort]) ? $_GET[sort] : 'title';
			$sortorder = isset($_GET[order]) ? $_GET[order] : 'ASC';
			
			$pageNo = isset($_POST[page]) ? $_POST[page] : 1;
		
			$query ="1";
			if(isset($_GET[filter_title]) && isset($_GET[filter_status])) {
				$query = "title like '$_GET[filter_title]%' and status = $_GET[filter_status] order by $sortby $sortorder";
			}else if( isset($_GET[filter_title]) ) {
				$query = "title like '$_GET[filter_title]%' order by $sortby $sortorder";
			}else if( isset($_GET[filter_status]) ) {
				$query = "status = $_GET[filter_status] order by $sortby $sortorder";
			}else {
				$query = "1 order by $sortby $sortorder";
			}
			
			$results = $this->model->getDetailsByQuery("*", $query, $pageNo);		
			$totalRecords = $this->model->TotalRecords($query);
			$pageLimit = ADMIN_PAGE_LIMIT;
			$recordFrom = (($pageNo-1) * $pageLimit) + 1 ;
			$recordTo = $recordFrom + count($results) - 1;
			$totalPages = ceil($totalRecords/$pageLimit);

			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/information/template_catalog_information_index.php');

		}
		

		public function insert() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			if($_SESSION['AdminUser'][user_type_id]!=1) { echo "Permission Denied"; exit; }	
					
			$notification = ""; $cat_name=""; $meta_description=""; $meta_keyword=""; $content=""; $parent=""; $filter=""; $keyword=""; $image=""; $top="0"; $column="1"; $sort_order="0"; $status="1"; 
			if(isset($_POST[info])) {
				$dbInfo = $_POST[info] ;
				
				$name=$dbInfo[title]; $meta_description=$dbInfo[meta_description]; $meta_keyword=$dbInfo[meta_keyword]; $content=$dbInfo[content]; $keyword=$dbInfo[keyword]; $image=$dbInfo[image]; $sort_order=$dbInfo[sort_order]; $status=$dbInfo[status];
				
				$information_name_error = empty($dbInfo[title]) || strlen($dbInfo[title])<2 || strlen($dbInfo[title])>50 ? "information Name must be between 2 and 50 characters!" : "" ;
				if(!empty($information_name_error))
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				else {
					$dbInfo[created] = time();
					$dbInfo[modified] = time();
					if($this->model->insert($dbInfo)) {
						echo '<script>window.location.href="index.php?route=catalog/information"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				//echo "<pre>"; print_r($dbInfo); echo "</pre>";echo "<pre>"; print_r($_POST); echo "</pre>";
	
			}

			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/information/template_catalog_information_form.php');
			
		}


		public function update() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			if(isset($_POST[info])) {
				$dbInfo = $_POST[info] ;
				
				$information_name_error = empty($dbInfo[title]) || strlen($dbInfo[title])<2 || strlen($dbInfo[title])>50 ? "Information Title must be between 2 and 50 characters!" : "" ;

				if(!empty($information_name_error)) {
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				} else {
					$dbInfo[modified] = time();
					if($this->model->edit($dbInfo, $_GET['id'])) {
						echo '<script>window.location.href="index.php?route=catalog/information"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				
			}else {
				$dbInfo =  $this->model->getDetailsById($_GET['id']);
			}
			
			$name=$dbInfo[title]; $meta_description=$dbInfo[meta_description]; $meta_keyword=$dbInfo[meta_keyword]; $content=$dbInfo[content];$keyword=$dbInfo[keyword]; $image=$dbInfo[image]; $sort_order=$dbInfo[sort_order]; $status=$dbInfo[status];
			
			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/information/template_catalog_information_form.php');

		}

		public function delete() {
			//echo "<pre>"; print_r($_POST); echo "<pre>";
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			if($_SESSION['AdminUser'][user_type_id]!=3) { echo "Permission Denied"; exit; }	
			
			if($this->model->toggle("deleted","id in (". implode( ",", $_POST[selected] ). ")")) {
				echo '<script>window.location.href="index.php?route=catalog/information"</script>';
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