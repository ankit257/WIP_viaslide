<?php
	class Controller_Testimonial {
		
		public	$model;
		

		public function __construct() {
			require_once('model/catalog/model_catalog_testimonial.php');
			$this->model =  new Model_Testimonial();
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
			include_once('view/templates/catalog/testimonial/template_catalog_testimonial_index.php');

		}
		

		public function insert() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			$notification = ""; $title=""; $content=""; $parent=""; $filter=""; $posted_by=""; $image=""; $posted_by_email=""; $sort_order="0"; $status="1"; 
			if(isset($_POST[info])) {
				$dbInfo = $_POST[info] ;
				
				$title=$dbInfo[title]; $content=$dbInfo[content]; $posted_by=$dbInfo[posted_by_email]; $posted_by=$dbInfo[posted_by_email]; $image=$dbInfo[image]; $sort_order=$dbInfo[sort_order]; $status=$dbInfo[status];
				
				$testimonial_name_error = empty($title) || strlen($title)<2 || strlen($title)>32 ? "Testimonial Title must be between 2 and 32 characters!" : "" ;
				if(!empty($testimonial_name_error))
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				else {
					$dbInfo[created] = time();
					$dbInfo[modified] = time();
					if($this->model->insert($dbInfo)) {
						echo '<script>window.location.href="index.php?route=catalog/testimonial"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				//echo "<pre>"; print_r($dbInfo); echo "</pre>";echo "<pre>"; print_r($_POST); echo "</pre>";
	
			}

			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/testimonial/template_catalog_testimonial_form.php');
			
		}


		public function update() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			if(isset($_POST[info])) {
				$dbInfo = $_POST[info] ;
				
				$testimonial_name_error = empty($dbInfo[title]) || strlen($dbInfo[title])<2 || strlen($dbInfo[title])>32 ? "Testimonial Title must be between 2 and 32 characters!" : "" ;

				if(!empty($testimonial_name_error)) {
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				} else {
					$dbInfo[modified] = time();
					if($this->model->edit($dbInfo, $_GET['id'])) {
						echo '<script>window.location.href="index.php?route=catalog/testimonial"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				
			}else {
				$dbInfo =  $this->model->getDetailsById($_GET['id']);
			}
			
			$title=$dbInfo[title]; $content=$dbInfo[content]; $posted_by=$dbInfo[posted_by]; $posted_by_email=$dbInfo[posted_by_email]; $image=$dbInfo[image]; $sort_order=$dbInfo[sort_order]; $status=$dbInfo[status];
			
			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/testimonial/template_catalog_testimonial_form.php');

		}

		public function delete() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			//echo "<pre>"; print_r($_POST); echo "<pre>";
			if($this->model->toggle("deleted","id in (". implode( ",", $_POST[selected] ). ")")) {
				echo '<script>window.location.href="index.php?route=catalog/testimonial"</script>';
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