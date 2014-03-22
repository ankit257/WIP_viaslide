<?php
	class Controller_Post {
		
		public	$model;
		

		public function __construct() {
			require_once('model/catalog/model_catalog_post.php');
			$this->model =  new Model_post();
		}
		
		public function index() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			$sortby = isset($_GET[sort]) ? $_GET[sort] : 'name';
			$sortorder = isset($_GET[order]) ? $_GET[order] : 'ASC';
			
			$pageNo = isset($_POST[page]) ? $_POST[page] : 1;
		
			$query ="1";
			if(isset($_GET[filter_name]) && isset($_GET[filter_status])) {
				$query = "name like '$_GET[filter_name]%' and status = $_GET[filter_status] order by $sortby $sortorder";
			}else if( isset($_GET[filter_name]) ) {
				$query = "name like '$_GET[filter_name]%' order by $sortby $sortorder";
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
			include_once('view/templates/catalog/post/template_catalog_post_index.php');

		}
		

		public function insert() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			$Fields = $this->model->getAllFields(0);
			//echo "<pre>"; print_r($Fields); echo "</pre>";
			$notification = ""; $cat_name=""; $meta_description=""; $meta_keyword=""; $content=""; $parent=""; $keyword=""; $image=""; $top="0"; $column="1"; $sort_order="0"; $status="1"; 
			if(isset($_POST[info])) {
				$dbInfo[main] = $_POST[info] ;
				$dbInfo[field] = $_POST[field] ;
				$dbInfo[cat] = $_POST[product_category] ;
			
				$name=$dbInfo[main][name]; $meta_description=$dbInfo[main][meta_description]; $meta_keyword=$dbInfo[main][meta_keyword]; $content=$dbInfo[main][content]; $keyword=$dbInfo[main][keyword]; $image=$dbInfo[main][image]; $sort_order=$dbInfo[main][sort_order]; $status=$dbInfo[main][status];
				
				$post_name_error = empty($dbInfo[main][name]) || strlen($dbInfo[main][name])<2 || strlen($dbInfo[main][name])>32 ? "post Name must be between 2 and 32 characters!" : "" ;
				
				//echo "<pre>"; print_r($dbInfo); echo "</pre>";
				if(!empty($post_name_error))
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				else {
					$dbInfo[main][created] = time();
					$dbInfo[main][modified] = time();
					if($this->model->insert($dbInfo)) {
						echo '<script>window.location.href="index.php?route=catalog/post"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				
	
			}

			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/post/template_catalog_post_form.php');
			
		}


		public function update() {

			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			if(isset($_POST[info])) {
				$dbInfo[main] = $_POST[info] ;
				$dbInfo[field] = $_POST[field] ;
				$dbInfo[cat] = $_POST[product_category] ;
				
				$post_name_error = empty($dbInfo[main][name]) || strlen($dbInfo[main][name])<2 || strlen($dbInfo[main][name])>32 ? "post Title must be between 2 and 32 characters!" : "" ;

				if(!empty($post_name_error)) {
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				} else {
					$dbInfo[main][modified] = time();
					if($this->model->edit($dbInfo, $_GET['id'])) {
						echo '<script>window.location.href="index.php?route=catalog/post"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				
			}else {
				$Fields = $this->model->getAllFields($_GET[id]);
				$dbInfo =  $this->model->getDetailsById($_GET['id']);
				$categories = $this->model->getAllCategories($_GET['id']);
				//echo "<pre>"; print_r($categories); echo "</pre>";
				
			}
			
			$name=$dbInfo[name]; $meta_description=$dbInfo[meta_description]; $meta_keyword=$dbInfo[meta_keyword]; $content=$dbInfo[content];$keyword=$dbInfo[keyword]; $image=$dbInfo[image]; $sort_order=$dbInfo[sort_order]; $status=$dbInfo[status];
			
			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/post/template_catalog_post_form.php');

		}

		public function delete() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			//echo "<pre>"; print_r($_POST); echo "<pre>";
			if($this->model->toggle("deleted","id in (". implode( ",", $_POST[selected] ). ")")) {
				echo '<script>window.location.href="index.php?route=catalog/post"</script>';
				exit();
			} else {
				$notification	=	"Warning: Unknown Error Occurs" ;
			}
		}
		
	}

?>