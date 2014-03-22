<?php
	class Controller_Index extends Emarketz_Controller {
	
		public function index() {
			require_once ('model/model_post.php');
			$postModel = new Model_Post();
			//$TopViewsPosts = $catModel->getMaxViewsPostHomePage();
			$page = $_GET['page'];
			$TopViewsPosts = $postModel->getHomePageLatestPosts($page, $limit);
			if(!$page){
				include_once(THEMEPATH. 'templates/common/template_common_header_home.php');
				require_once ('model/common/model_common_category.php');
				$catModel = new category_Model();
				//require_once ('model/model_advertisment.php');
				//$AdModel = new Model_Advertisment();
				//$TopAds = $AdModel->get("home", "top");
				//$BottomAds = $AdModel->get("home", "bottom");
				//aPrint($TopAds);
				//$catModel = NULL; $postModel = NULL; $AdModel=NULL;
				include_once(THEMEPATH. 'templates/index/template_index_index.php');
				include_once(THEMEPATH. 'templates/common/template_common_footer.php');
			}
			else{
				echo json_encode($TopViewsPosts);
				//echo json_encode($page); 
			}
			//echo json_encode($page);
			
			/*$catList = $catModel->get('parent_id=0');
			for($i=0; $i<count($catList); $i++) {
				$catList[$i]['HomePost'] = $postModel->getHomePageLatestPost($catList[$i]['id']);
			}
			*/
			
		}
	}
?>