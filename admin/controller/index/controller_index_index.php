<?php
	class Controller_Index {
		
		public	$model;
		

		public function __construct() {

		}
		
		public function index() {
		
			$warning = ""; $User_Details=false;
		
			if( !empty($_POST) ){
				if ( empty($_POST[info][username]) || empty($_POST[info][password]) )
					$warning = "Username and Password Both Fields required";

				require_once("model/account/model_account_user.php");
				$this->model = new Model_User();
				$User_Details = $this->model->Login($_POST[info][username],md5($_POST[info][password]));
				if(!$User_Details) {
					$warning = "No match for Username and/or Password.";
				}else {
					session_start();
					$_SESSION['AdminUser'] = $User_Details ;
				}
				//print_r($_POST[info]);

			}
			
			global $header; global $menu; global $footer;
			if(!isset($_SESSION['AdminUser']))
				include_once('view/templates/common/template_common_login.php');
			else {
				require_once('model/catalog/model_catalog_post.php');
				$objModel =  new Model_Post();
				$totalNewPosts=$objModel->getTotalDisablePost();
				//echo $totalNewPosts;
				//$totalNewTestimonials = $objModel->getNewCount();
				
				include_once('view/templates/index/template_index_index.php');
			}

		}
		
		public function logout() {
			session_start();
			session_destroy();
			
			echo '<script>window.location.href="index.php"</script>' ;
		}
		
		
	}

?>