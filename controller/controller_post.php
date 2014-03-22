<?php
	class Controller_Post extends Emarketz_Controller {
		
		public function __construct() {
			//require_once('model/catalog/model_catalog_testimonial.php');
			//$this->model =  new Model_Testimonial();
		}

		public function singlemodal() {
			$postid= isset($_GET['post_id']) ? $_GET['post_id'] : '0';
			
			require_once ('model/model_advertisment.php');
			$AdModel = new Model_Advertisment();
			$RightTopAds = $AdModel->get("post_single", "right_top");
			$RightBottomAds = $AdModel->get("post_single", "right_bottom");
			$BottomAds = $AdModel->get("post_single", "bottom");

			
			$heading = "Data not found of this post" ;
			
			if( $postid >0 ) {
				require_once('model/model_post.php');
				$postModel = new Model_Post();
				$postdata['main'] = $postModel->getRecord($postid);
				if(isset($postdata['main'][0])) {
					$postdata['main'] = $postdata['main'][0];
					$postModel->setViews($postid, $postdata['main']['total_views']+1);
					$postdata['tags'] = $postModel->getTags($postid);
					$postdata['videos'] = $postModel->getVideos($postid);
					//aPrint($postdata['videos']);
					$postdata['images'] = $postModel->getImages($postid);
					$postdata['comments'] = $postModel->getComments($postid);
					//aPrint($postdata['comments']);
					$postdata['related'] = $postModel->getRelatedPosts($postid);
					require_once('model/model_account.php');
					$acctModel = new Model_Account();
					if($postdata['related']) {
						for($i=0; $i<count($postdata['related']); $i++) {
							$postdata['related'][$i]['submit_by_user'] = $acctModel->getUserName($postdata['related'][$i]['submit_by']);
						}
						
						$acctModel = NULL;
					}
					
				}
				//aPrint($postdata['related']);
				//aPrint($postdata['images']);
			}
			
			
			
			include_once(THEMEPATH. 'templates/post/template_post_single_modal.php');
			
		}
		
		
		

		
		public function listing() {
			$listingby = "category";
			$catid= isset($_GET['cat_id']) ? $_GET['cat_id'] : '0';
			$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'created';
			
			$page = isset($_GET['page']) ? $_GET['page'] : '1';
			
			
			require_once ('model/model_advertisment.php');
			$AdModel = new Model_Advertisment();
			$RightAds = $AdModel->get("post_listing", "right");
			$BottomAds = $AdModel->get("post_listing", "bottom");
			
			
			require_once('model/model_post.php');
			$postModel = new Model_Post();
			

			//$heading .= "List: ";
			
			if($catid!=0) {
				$postList = $postModel->getCategoryList($catid, $page, $sort_by);
				$totalRecords = $postModel->getCategoryListTotalRecords($catid);
				if($postList)
					$heading .= ucwords($postList[0]['category_name']);
			} else {
				$heading .= "All";
				$postList = $postModel->getListAll($page);
				$totalRecords = $postModel->getListAllTotalRecords();
			}
			
			$pageLimit = PAGE_LIMIT;
			$recordFrom = (($page-1) * $pageLimit) + 1 ;
			$recordTo = $recordFrom + count($postList) - 1;
			$totalPages = ceil($totalRecords/$pageLimit);
			
			//$pagination = pagination('index.php?route=post/listing&cat_id='.$catid, $totalRecords, $page, $pageLimit, $adjacents=3, $recordFrom, $recordTo);
			$pagination = pagination('category/'.$catid, $totalRecords, $page, $pageLimit, $adjacents=3, $recordFrom, $recordTo);
			
			//aPrint($postList);
			//echo $postList[0]['title'];
			include_once(THEMEPATH. 'templates/common/template_common_header.php');
			include_once(THEMEPATH. 'templates/post/template_post_listing2.php');
			include_once(THEMEPATH. 'templates/common/template_common_footer.php');
		}
		
		
		


		public function taglisting() {
			$listingby = "tags";
			$tagid= isset($_GET['tag_id']) ? $_GET['tag_id'] : '0';
			$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'created';
			
			$page = isset($_GET['page']) ? $_GET['page'] : '1';
			
			
			require_once ('model/model_advertisment.php');
			$AdModel = new Model_Advertisment();
			$RightAds = $AdModel->get("post_listing", "right");
			$BottomAds = $AdModel->get("post_listing", "bottom");
			
			
			require_once('model/model_post.php');
			$postModel = new Model_Post();
			

			//$heading .= "List: ";
			
			if($tagid!=0) {
				$postList = $postModel->getTagList($tagid, $page, $sort_by);
				$totalRecords = $postModel->getTagListTotalRecords($tagid);
				
				if($postList)
					$heading .= ucwords($postList[0]['tag_name']);
			}
			$headinginfo =  $postModel->getTagListHeading($tagid);
			$heading = 'tag';
			$count = $headinginfo[0]['count'];
			$query = $headinginfo[0]['tag_name'];
			
			$dataurl = DOCROOT.'index.php?route=post/taglisting&tag_id='.$tagid.'&page=';
			
			include_once(THEMEPATH. 'templates/common/template_common_header.php');
			include_once(THEMEPATH. 'templates/post/template_post_listing2.php');
			include_once(THEMEPATH. 'templates/common/template_common_footer.php');
		}
		
		public function userlisting() {
			$listingby = "user";
			$userid= isset($_GET['user_id']) ? $_GET['user_id'] : '0';
			$page = isset($_GET['page']) ? $_GET['page'] : '1';
			
			require_once('model/model_post.php');
			$postModel = new Model_Post();
			if($userid!=0) {
				$postList = $postModel->getUserList($userid, $page);
				$userInfo = $postModel->getUserInfo($userid);
				if($postList){		
					//$heading .= ucwords($postList[0]['submit_by_user']);
				}
			} 
			/*
			$pageLimit = PAGE_LIMIT;
			$recordFrom = (($page-1) * $pageLimit) + 1 ;
			$recordTo = $recordFrom + count($postList) - 1;
			$totalPages = ceil($totalRecords/$pageLimit);
			
			$pagination = pagination('user/'.$userid, $totalRecords, $page, $pageLimit, $adjacents=3, $recordFrom, $recordTo);
			*/
			//aPrint($postList);
			if($page>1){
				echo json_encode($postList);
			}
			else{	
				include_once(THEMEPATH. 'templates/common/template_common_header.php');
				include_once(THEMEPATH. 'templates/post/template_post_user.php');
				include_once(THEMEPATH. 'templates/common/template_common_footer.php');	
			}
		}



		public function search() {
			
			$searchText= isset($_GET['text']) ? $_GET['text'] : NULL;
			$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'created';
			
			
			$page = isset($_GET['page']) ? $_GET['page'] : '1';
			
			
			require_once ('model/model_advertisment.php');
			$AdModel = new Model_Advertisment();
			$RightAds = $AdModel->get("post_listing", "right");
			$BottomAds = $AdModel->get("post_listing", "bottom");
			
			
			require_once('model/model_post.php');
			$postModel = new Model_Post();
			

			$heading = "query";
			
			if($searchText) {
				//$heading .= ucwords($searchText);
				$postList = $postModel->getSearchList($searchText, $page, $sort_by);
				$totalRecords = $postModel->getSearchListTotalRecords($searchText);
				//$headinginfo =  $postModel->getSearchListHeading($searchText);
			}
			$count = $totalRecords;
			$query = $searchText;
			$dataurl = DOCROOT.'index.php?route=post/search&text='.$searchText.'&page=';
			

			//echo $totalRecords;
			/*$pageLimit = PAGE_LIMIT;
			$recordFrom = (($page-1) * $pageLimit) + 1 ;
			$recordTo = $recordFrom + count($postList) - 1;
			$totalPages = ceil($totalRecords/$pageLimit);
			
			$pagination = pagination('search/'.$searchText, $totalRecords, $page, $pageLimit, $adjacents=3, $recordFrom, $recordTo);
			*/
			include_once(THEMEPATH. 'templates/common/template_common_header.php');
			include_once(THEMEPATH. 'templates/post/template_post_listing2.php');
			include_once(THEMEPATH. 'templates/common/template_common_footer.php');
		}
		
		public function searchresults(){
			$searchText = $_POST['search'];
			$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'created';
			$page = isset($_GET['page']) ? $_GET['page'] : '1';
			require_once('model/model_post.php');
			$postModel = new Model_Post();
			

			$heading .= "Search Result :";
			
			if($searchText) {
				$heading .= ucwords($searchText);
				$postList = $postModel->getSearchList($searchText, $page, $sort_by);
				$totalRecords = $postModel->getSearchListTotalRecords($searchText);
			}
					$json = json_encode($postList);
					//echo '{"data": '.$json.'}';
					echo $json;

		}
		public function searchtagresults(){
			$searchText = $_POST['search'];
			require_once('model/model_post.php');
			$postModel = new Model_Post();
			if($searchText) {
				$postList = $postModel->getSearchTagList($searchText);
				}
				$json = json_encode($postList);
				echo $json;
			}
		
		
		public function single() {
			$postid= isset($_GET['post_id']) ? $_GET['post_id'] : '0';
			//echo 'direct - '.getCurrentDirectory();
			
			//require_once ('model/model_advertisment.php');
			//$AdModel = new Model_Advertisment();
			//$RightTopAds = $AdModel->get("post_single", "right_top");
			//$RightBottomAds = $AdModel->get("post_single", "right_bottom");
			//$BottomAds = $AdModel->get("post_single", "bottom");
			require_once('model/model_post.php');
			$postModel = new Model_Post();
			$heading = "Data not found of this post" ;
			if( $postid >0 ) {
				$postdata['main'] = $postModel->getRecord($postid);
				if(isset($postdata['main'][0])) {
					$postdata['main'] = $postdata['main'][0];
					$postModel->setViews($postid, $postdata['main']['total_views']+1);
					$postdata['tags'] = $postModel->getTags($postid);
					$postdata['videos'] = $postModel->getVideos($postid);
					//aPrint($postdata['videos']);
					$postdata['images'] = $postModel->getImages($postid);
					$postdata['comments'] = $postModel->getComments($postid);
					//aPrint($postdata['comments']);
					$postdata['related'] = $postModel->getRelatedPosts($postid);
					require_once('model/model_account.php');
					$acctModel = new Model_Account();
					if($postdata['related']) {
						for($i=0; $i<count($postdata['related']); $i++) {
							$postdata['related'][$i]['submit_by_user'] = $acctModel->getUserName($postdata['related'][$i]['submit_by']);
						}
						
						$acctModel = NULL;
					}
					
				}
			}
		include_once(THEMEPATH. 'templates/common/template_common_header.php');
		include_once(THEMEPATH. 'templates/post/template_post_single2.php');
		include_once(THEMEPATH. 'templates/common/template_common_footer.php');
		}

		public function viewsingle() {
			$postid= isset($_GET['post_id']) ? $_GET['post_id'] : '0';
			//echo 'direct - '.getCurrentDirectory();
			
			$heading = "Data not found of this post" ;
			if( $postid >0 ) {
				require_once('model/model_post.php');
				$postModel = new Model_Post();
				$postdata['main'] = $postModel->getRecord($postid);
				if(isset($postdata['main'][0])) {
					$postdata['main'] = $postdata['main'][0];
					$postModel->setViews($postid, $postdata['main']['total_views']+1);
					$postdata['tags'] = $postModel->getTags($postid);
					//$postdata['videos'] = $postModel->getVideos($postid);
					//aPrint($postdata['videos']);
					//$postdata['images'] = $postModel->getImages($postid);
					//$postdata['comments'] = $postModel->getComments($postid);
					//aPrint($postdata['comments']);
					//$postdata['related'] = $postModel->getRelatedPosts($postid);
					require_once('model/model_account.php');
					$acctModel = new Model_Account();
					if($postdata['related']) {
						for($i=0; $i<count($postdata['related']); $i++) {
							$postdata['related'][$i]['submit_by_user'] = $acctModel->getUserName($postdata['related'][$i]['submit_by']);
						}
						
						$acctModel = NULL;
					}
					
				}
				//echo $postid;
				//aPrint($postdata['related']);
				//aPrint($postdata['images']);
			}
		//$a =  $postdata['main']['content'];
		//echo $postdata['tags'][0]['tag_name'];	
			//echo $postdata['main']['content'];
		//include_once(THEMEPATH. 'templates/common/template_common_header.php');
		include_once(THEMEPATH. 'templates/post/template_post_single_view.php');
		//include_once(THEMEPATH. 'templates/common/template_common_footer.php');
		}
		public function getrelatedposts(){
			require_once('model/model_post.php');
			$postModel = new Model_Post();
			$postid = $_GET['post'];
			$page = $_GET['page'];
			if(!$page){
				$page = 1;
			}
			$related = $postModel->getRelatedPosts($postid, $page);
			//echo json_encode($page);
			echo json_encode($related);

				
		}
		
		
		


		public function addNewComment() {
			
			if(!isLoggedIn()) {
				$returnResult = 'Sorry! You are not the Lodded User.';
			}else {
				if( isset($_POST) && !empty($_POST['comment']) ) {
					$data['posted_by'] = $_SESSION['LoggedUser']['id'];
					$data['post_id'] = $_POST['post_id'];
					$data['comment'] = $_POST['comment'];
					$data['created'] = time();
					$data['modified'] = time();
					
					require_once('model/model_post.php');
					$postModel = new Model_Post();
					if($postModel->addNewComment($data))
						$returnResult = 'success';
				}else {
					$returnResult = 'fail';
				}
			}
			echo $returnResult;
		}


		

	}
?>