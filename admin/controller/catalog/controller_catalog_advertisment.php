<?php
	class Controller_Advertisment {
		
		public function __construct() {
			require_once('model/catalog/model_catalog_advertisment.php');
			$this->model =  new Model_Advertisment();
		}
		
		public function index() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			$sortby = isset($_GET[sort]) ? $_GET[sort] : 'banner_name';
			$sortorder = isset($_GET[order]) ? $_GET[order] : 'ASC';
			
			$pageNo = isset($_POST[page]) ? $_POST[page] : 1;
		
			$query ="1";
			if(isset($_GET[filter_banner_name]) && isset($_GET[filter_status])) {
				$query = "banner_name like '$_GET[filter_banner_name]%' and status = $_GET[filter_status] order by $sortby $sortorder";
			}else if( isset($_GET[filter_banner_name]) ) {
				$query = "banner_name like '$_GET[filter_banner_name]%' order by $sortby $sortorder";
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
			include_once('view/templates/catalog/advertisment/template_catalog_advertisment_index.php');

		}
		

		public function insert() {
			$no_image = 'view/image/no_image-100x100.jpg';
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			if($_SESSION['AdminUser']['user_type_id']!=1) { echo "Permission Denied"; exit; }	
					
			$notification = ""; $cat_name=""; $meta_description=""; $meta_keyword=""; $content=""; $parent=""; $filter=""; $keyword=""; $image=""; $top="0"; $column="1"; $sort_order="0"; $status="1"; 
			if(isset($_POST['info'])) {
				$dbInfo = $_POST['info'] ;
				
				$name=$dbInfo['banner_name']; $content=$dbInfo['content']; $image=$dbInfo['banner_image']; $sort_order=$dbInfo['sort_order']; $status=$dbInfo['status'];
				
				$advertisment_name_error = empty($dbInfo['banner_name']) || strlen($dbInfo['banner_name'])<2 || strlen($dbInfo['banner_name'])>50 ? "advertisment Name must be between 2 and 50 characters!" : "" ;
				if(!empty($advertisment_name_error))
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				else {
					$dbInfo['layout_page'] = str_replace(" ","",$dbInfo['layout_page']);
					$dbInfo['banner_position'] = str_replace(" ","",$dbInfo['banner_position']);
					$dbInfo['created'] = time();
					$dbInfo['modified'] = time();
					if($this->model->insert($dbInfo)) {
						echo '<script>window.location.href="index.php?route=catalog/advertisment"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				//echo "<pre>"; print_r($dbInfo); echo "</pre>";echo "<pre>"; print_r($_POST); echo "</pre>";
	
			}

			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/advertisment/template_catalog_advertisment_form.php');
			
		}


		public function update() {
			$no_image = 'view/image/no_image-100x100.jpg';
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			if(isset($_POST['info'])) {
				$dbInfo = $_POST['info'] ;
				
				$advertisment_name_error = empty($dbInfo['banner_name']) || strlen($dbInfo['banner_name'])<2 || strlen($dbInfo['banner_name'])>50 ? "Advertisment Title must be between 2 and 50 characters!" : "" ;

				if(!empty($advertisment_name_error)) {
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				} else {
					$dbInfo['layout_page'] = str_replace(" ", "", $dbInfo['layout_page']);
					$dbInfo['banner_position'] = str_replace(" ", "", $dbInfo['banner_position']);
					$dbInfo['modified'] = time();
					if($this->model->edit($dbInfo, $_GET['id'])) {
						echo '<script>window.location.href="index.php?route=catalog/advertisment"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				
			}else {
				$dbInfo =  $this->model->getDetailsById($_GET['id']);
			}
			
			$name=$dbInfo['banner_name']; $content=$dbInfo['content'];$image=$dbInfo['banner_image']; $sort_order=$dbInfo['sort_order']; $status=$dbInfo['status'];
			
			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/advertisment/template_catalog_advertisment_form.php');

		}

		public function delete() {
			//echo "<pre>"; print_r($_POST); echo "<pre>";
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			if($_SESSION['AdminUser'][user_type_id]!=3) { echo "Permission Denied"; exit; }	
			
			if($this->model->toggle("deleted","id in (". implode( ",", $_POST[selected] ). ")")) {
				echo '<script>window.location.href="index.php?route=catalog/advertisment"</script>';
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