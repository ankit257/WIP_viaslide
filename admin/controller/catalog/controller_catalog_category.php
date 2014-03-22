<?php
	class Controller_Category {
		
		public	$model;
		

		public function __construct() {
			require_once('model/catalog/model_catalog_category.php');
			$this->model =  new Model_Category();
		}
		
		private function categoriesToTree(&$categories) {

			$map = array(
				0 => array('subcategories' => array())
			);

			foreach ($categories as &$category) {
				$category['subcategories'] = array();
				$map[$category['id']] = &$category;
			}

			foreach ($categories as &$category) {
				$map[$category['parent_id']]['subcategories'][] = &$category;
			}

			return $map[0]['subcategories'];

		}

		private function buildTree($items) {

			$childs = array();

			foreach($items as &$item) $childs[$item['parent_id']][] = &$item;
			unset($item);

			foreach($items as &$item) if (isset($childs[$item['id']]))
					$item['childs'] = $childs[$item['id']];

			return $childs[0];
		}

		public function index() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			$sortby = isset($_GET[sort]) ? $_GET[sort] : 'name';
			$sortorder = isset($_GET[order]) ? $_GET[order] : 'ASC';
			$categories = $this->model->getAll($sortby, $sortorder);

			//$this->categoriesToTree(&$categories);
			if($categories)
				$categories = $this->buildTree($categories);
			//echo "<pre>"; print_r($dbData); echo "</pre>";

			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/category/template_catalog_category_index.php');

		}
		

		public function insert() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }
			
			$notification = ""; $cat_name=""; $meta_description=""; $meta_keyword=""; $content=""; $parent=""; $filter=""; $keyword=""; $image=""; $top="0"; $column="1"; $sort_order="0"; $status="1"; 
			if(isset($_POST['info'])) {
				
				$dbInfo = $_POST['info'] ;
				
				$cat_name=$dbInfo['name']; $meta_description=$dbInfo['meta_description']; $meta_keyword=$dbInfo['meta_keyword']; $content=$dbInfo['content']; $parent=$_POST['parent_id']; $filters=$_POST['filter']; $keyword=$dbInfo['keyword']; $image=$dbInfo['image']; $top=$dbInfo['top']; $column=$dbInfo['column']; $sort_order=$dbInfo['sort_order']; $status=$dbInfo['status'];
				
				$category_name_error = empty($dbInfo['name']) || strlen($dbInfo['name'])<2 || strlen($dbInfo['name'])>32 ? "Category Name must be between 2 and 32 characters!" : "" ;
				if(!empty($category_name_error))
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				else {
					$dbInfo['parent_id'] = $_POST['parent_id']=="0" ? 0 : $this->model->getIdByName($_POST['parent_id']);
					
					if(  $_SESSION['AdminUser']['user_type_id']==2  && $dbInfo['parent_id'] <=0  ) { echo "You have not permission to create new main category.. but you can create sub category under sub category"; exit; }
					
					$dbInfo['created'] = time();
					$dbInfo['modified'] = time();
					if($this->model->insert($dbInfo)) {
						echo '<script>window.location.href="index.php?route=catalog/category"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				//echo "<pre>"; print_r($dbInfo); echo "</pre>";echo "<pre>"; print_r($_POST); echo "</pre>";
	
			}

			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/category/template_catalog_category_form.php');
			
		}


		public function update() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			if(isset($_POST[info])) {
				$dbInfo = $_POST[info] ;
				
				$category_name_error = empty($dbInfo[name]) || strlen($dbInfo[name])<2 || strlen($dbInfo[name])>32 ? "Category Name must be between 2 and 32 characters!" : "" ;

				if(!empty($category_name_error)) {
					$notification	=	"Warning: Please check the form carefully for errors!" ;
				} else {
					$dbInfo[parent_id] = $_POST[parent_id]=="0" ? 0 : $this->model->getIdByName($_POST[parent_id]);
					$dbInfo[modified] = time();
					if($this->model->edit($dbInfo, $_GET['id'])) {
						echo '<script>window.location.href="index.php?route=catalog/category"</script>';
						exit();
					} else {
						$notification	=	"Warning: Unknown Error Occurs" ;
					}
				}
				
			}else {
				$dbInfo =  $this->model->getDetailsById($_GET['id']);
			}
			
			$cat_name=$dbInfo[name]; $meta_description=$dbInfo[meta_description]; $meta_keyword=$dbInfo[meta_keyword]; $content=$dbInfo[content]; $parent=$dbInfo[parent_id]==0 ? 0 : $this->model->getNameById($dbInfo[parent_id]); $filters=$dbInfo[filter]; $keyword=$dbInfo[keyword]; $image=$dbInfo[image]; $top=$dbInfo[top]; $column=$dbInfo[column]; $sort_order=$dbInfo[sort_order]; $status=$dbInfo[status];
			
			global $header; global $menu; global $footer;
			include_once('view/templates/catalog/category/template_catalog_category_form.php');

		}

		public function delete() {
			
			if(!isset($_SESSION['AdminUser']) || empty($_SESSION['AdminUser'])) { echo "Permission Denied"; exit; }	
			
			//echo "<pre>"; print_r($_POST); echo "<pre>";
			if($this->model->toggle("deleted","id in (". implode( ",", $_POST[selected] ). ")")) {
				echo '<script>window.location.href="index.php?route=catalog/category"</script>';
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