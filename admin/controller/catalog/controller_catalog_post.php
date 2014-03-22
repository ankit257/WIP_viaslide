<?php
	class Controller_Post {
		
		public	$model;
		

		public function __construct() {
			require_once('model/catalog/model_catalog_post.php');
			$this->model =  new Model_post();
		}
		
		public function index() {
			$sortby = isset($_GET[sort]) ? $_GET[sort] : 'title';
			$sortorder = isset($_GET[order]) ? $_GET[order] : 'ASC';
			
			$pageNo = isset($_POST[page]) ? $_POST[page] : 1;
		
			$query ="1";
			if(isset($_GET[filter_name]) && isset($_GET[filter_status])) {
				$query = "title like '$_GET[filter_name]%' and status = $_GET[filter_status] order by `$sortby` $sortorder";
			}else if( isset($_GET[filter_name]) ) {
				$query = "title like '$_GET[filter_name]%' order by `$sortby` $sortorder";
			}else if( isset($_GET[filter_type]) ) {
				$query = "type like '$_GET[filter_type]%' order by `type` $sortorder";
			}else if( isset($_GET[filter_status]) ) {
				$query = "status = $_GET[filter_status] order by `$sortby` $sortorder";
			}else {
				$query = "1 order by `$sortby` $sortorder";
			}
			//echo $query;
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
			$no_image = 'view/image/no_image-100x100.jpg';
			/* Getting List of Categories */
			require_once('model/catalog/model_catalog_category.php');
			$catModel =  new Model_Category();
			$categories = $catModel->getAll("sort_order","ASC");
			$SelectedCategoriesID = array();
			
			//echo "<pre>"; print_r($Fields); echo "</pre>";
			$notification = ""; $meta_description=""; $meta_keyword=""; $content="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa. Sed eleifend nonummy diam. Praesent mauris ante, elementum et, bibendum at, posuere sit amet, nibh. Duis tincidunt lectus quis dui viverra vestibulum. Suspendisse vulputate aliquam dui. Nulla elementum dui ut augue. Aliquam vehicula mi at mauris. Maecenas placerat, nisl at consequat rhoncus, sem nunc gravida justo, quis eleifend arcu velit quis lacus. Morbi magna magna, tincidunt a, mattis non, imperdiet vitae, tellus. Sed odio est, auctor ac, sollicitudin in, consequat vitae, orci. Fusce id felis. Vivamus sollicitudin metus eget eros."; $type=""; $keyword=""; $rating="0"; $total_views="0"; $total_likes="0"; $total_dislikes="0"; $home_page_display=1; $image=""; $top="0"; $column="1"; $sort_order="0"; $status="1"; $image_row =  1; $video_row =  1; $menu_row=1;

			
			if(isset($_POST['info'])) {
				//echo "<pre>"; print_r($_POST); echo "</pre>";exit;
				$dbInfo['main'] = $_POST['info'] ;
				$dbInfo['categories'] = array_filter($_POST['post_category']) ;
				$dbInfo['images'] = $_POST['post_image'] ;
				$dbInfo['videos'] = $_POST['post_video'] ;
			
				$title=$dbInfo['main']['title']; $meta_description=$dbInfo['main']['meta_description']; $meta_keyword=$dbInfo['main']['meta_keyword']; $content=$dbInfo['main']['content']; $keyword=$dbInfo['main']['keyword']; $rating=$dbInfo['main']['rating']; $total_views=$dbInfo['main']['total_views']; $total_likes=$dbInfo['main']['total_likes']; $total_dislikes=$dbInfo['main']['total_dislikes']; $home_page_display=$dbInfo['main']['home_page_display']; $image=$dbInfo['main']['image']; $sort_order=$dbInfo['main']['sort_order']; $status=$dbInfo['main']['status'];
				
				
				$post_name_error = empty($dbInfo['main']['title']) || strlen($dbInfo['main']['title'])<2 || strlen($dbInfo['main']['title'])>100 ? "Post Name must be between 2 and 100 characters!" : "" ;
				
				//echo "<pre>"; print_r($dbInfo); echo "</pre>";
				if(!empty($post_name_error))
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				else {
					$dbInfo['main']['created'] = time();
					$dbInfo['main']['modified'] = time();
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

			$no_image = 'view/image/no_image-100x100.jpg';
			if(isset($_POST[info])) {
				//echo "<pre>"; print_r($_POST); echo "</pre>";exit;
				$dbInfo['main'] = $_POST['info'] ;
				$dbInfo['categories'] = array_filter($_POST['post_category']) ;
				$dbInfo['images'] = $_POST['post_image'] ;
				$dbInfo['videos'] = $_POST['post_video'] ;
				
				$post_name_error = empty($dbInfo['main']['title']) || strlen($dbInfo['main']['title'])<2 || strlen($dbInfo['main']['title'])>100 ? "post Title must be between 2 and 100 characters!" : "" ;

				if(!empty($post_name_error)) {
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				} else {
					$dbInfo['main']['modified'] = time();
					if($this->model->edit($dbInfo, $_GET['id'])) {
						echo '<script>window.location.href="index.php?route=catalog/post"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				
			}else {
				
				$dbInfo =  $this->model->getDetailsById($_GET['id']);
				$SelectedCategories = $this->model->getAllCategories($_GET['id']);
				$images = $this->model->getAllImages($_GET['id']);
				$image_row =  count($images) + 1;
				$videos = $this->model->getAllVideos($_GET['id']);
				$video_row =  count($videos) + 1;

				/* Getting List of Categories */
				require_once('model/catalog/model_catalog_category.php');
				$catModel =  new Model_Category();
				$categories = $catModel->getAll("sort_order","ASC");
				//$categories = $catModel->getChilernByParentID(176);

				$SelectedCategoriesID = array();
				foreach($SelectedCategories as $selectedCat) {
					if ($this->isExistCategory($selectedCat['category_id'], $categories))
						$SelectedCategoriesID[] = $selectedCat['category_id'];
				}


			}
			

			$title=$dbInfo['title']; $meta_description=$dbInfo['meta_description']; $meta_keyword=$dbInfo['meta_keyword']; $content=$dbInfo['content']; $type=$dbInfo['type']; $rating=$dbInfo['rating']; $total_views=$dbInfo['total_views']; $total_likes=$dbInfo['total_likes']; $total_dislikes=$dbInfo['total_dislikes'];  $home_page_display=$dbInfo['home_page_display']; $keyword=$dbInfo['keyword']; $image=$dbInfo['image']; $sort_order=$dbInfo['sort_order']; $status=$dbInfo['status'];
			$dbInfo['main'] = $dbInfo;
			
			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/post/template_catalog_post_form.php');

		}

		public function delete() {
			//echo "<pre>"; print_r($_POST); echo "<pre>";
			if($this->model->toggle("deleted","id in (". implode( ",", $_POST[selected] ). ")")) {
				echo '<script>window.location.href="index.php?route=catalog/post"</script>';
				exit();
			} else {
				$notification	=	"Warning: Unknown Error Occurs" ;
			}
		}
		
		
		function isExistCategory($id, $array) {
 		  foreach ($array as $key => $val) {
       		if ($val['id'] === $id) {
           		return true;
       	  	}
   		  }
	   		return false;
		}
		
	}

?>