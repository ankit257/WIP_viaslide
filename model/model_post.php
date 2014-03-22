<?php

	class Model_Post extends Emkt_Model {
	
			public function __construct() {
				parent::__construct('posts');
			}
			
			
			
			public function getHomePageLatestPost($catid) {
				return $this->query("SELECT t1.id, t1.type, t1.image, t1.title, t1.submit_by, t4.user_name as submit_by_user, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3,". TABLE_PREFIX. "users as t4 WHERE t4.id=t1.submit_by AND t3.id=t2.category_id AND t2.post_id=t1.id AND t2.category_id = $catid AND t1.deleted=0 AND t1.status=1 AND t1.home_page_display=1 group by t1.id order by t1.id desc LIMIT 0, 4");
			}

			public function getHomePageLatestPosts($page =1) {
				if(!$page){
					$page = 1;
				}
				$pageLimit = PAGE_LIMIT;
				$recordFrom = ($page-1) * $pageLimit ;
				//$recordFrom = ($page-1)*$limit;
				return $this->query("SELECT t1.id, t1.type, t1.image, t1.title,t1.slug, t1.submit_by, t4.user_name as submit_by_user, t1.total_views, t1.created FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "users as t4 WHERE t4.id=t1.submit_by AND t1.deleted=0 AND t1.status=1 AND t1.home_page_display=0 group by t1.id order by t1.id desc LIMIT $recordFrom, $pageLimit");
			}
			
			
			
			public function getAllPosts($userid) {
				
				if($userid >0 ) {
					$dbdata['main'] = parent::query("SELECT * FROM ". TABLE_PREFIX. "posts WHERE deleted=0 AND status=1 AND submit_by = $userid order by id");
				}
				
				if($dbdata['main'])
					return $dbdata;
				
				return false;
				//aPrint($dbdata['main']);
				
			}
			
			
			
			
			
			public function startupload($data) {
				$last_insert_id = 0;
				if( isset($data['main']) ) {
					$data['main']['status'] = 0;
					$data['main']['created'] = time();
					$data['main']['modified'] = time();
					$data['main']['slug'] = str_replace(" ", "-", strtolower($data['main']['title']));
					$last_insert_id = parent::add($data['main']);
					//$last_insert_id = parent::add($data['main']);
					//Adding in sub Tables
					if($last_insert_id !=0 ) {
						if( isset($data['tags']) ) {

							parent::ChangeTable('tags');
							foreach($data['tags'] as $tag) {
								$insertData = null;
								$tag = strtolower($tag);
								$result = parent::query("SELECT `id` FROM `". TABLE_PREFIX. "tags` WHERE `tag_name` =TRIM('$tag')" );
								if(!$result) {
									$insertData['tag_name']  =  strtolower(trim($tag));
									parent::add($insertData);
								}
							}
							
							$tag_ids = parent::query("SELECT `id` FROM `". TABLE_PREFIX. "tags` WHERE `tag_name` IN ('".implode("','", $data['tags'])."')" );
							//aPrint($tag_ids);
							//echo $tag_ids;
							if($tag_ids) {
								parent::ChangeTable('post_tags');
								foreach($tag_ids as $tagid) {
									$insertData = null;
									$insertData['tag_id'] = $tagid['id'];
									$insertData['post_id']  =  $last_insert_id;
									parent::add($insertData);
								}
							}
							
						}
						if( isset($data['categories']) ) {
							parent::ChangeTable('post_category');
							foreach($data['categories'] as $category) {
								$insertData = null;
								$insertData['category_id']  =  $category;
								$insertData['post_id']  =  $last_insert_id;
								parent::add($insertData);
							}
						}

					}
				}
				return $last_insert_id;
			} 
			public function addSlide($image){
				parent::ChangeTable('post_images');
				//$validate = new ValidateField();
				$imageid = 0;
				$image['post_id'] = $image['post_id'];
				$image['content'] = $image['content'];
				
				//				if( $validate->isImage($image['image']) ) {
				//					$image['post_id']  =  $last_insert_id;
									$image['sort_order']  =  0;
									$image['created']  =  time();
									$image['modified']  =  time();
									
								$imageid = 	parent::add($image);
								return $image['post_id'];
							//	}
							//	$validate=null;

			}
			public function updateSlide($hp){
				$postid = $hp['post_id'];
				parent::ChangeTable('posts');
				$asd;
				//$asd['id'] = $postid;
				//$asd['status'] = 1;
				$last_insert_id = parent::update(array("content"=>$hp['content']), "id=". $postid);
				$last_insert_id = parent::update(array("image"=>$hp['image']), "id=". $postid);
				$last_insert_id = parent::update(array("status"=>$hp['status']), "id=". $postid);
				return $last_insert_id;
			}


			public function lastSlide($postid){
				parent::ChangeTable('posts');
				$asd;
				//$asd['id'] = $postid;
				$asd['status'] = 1;
				$last_insert_id = parent::update(array("status"=>1), "id=". $postid);
				return $last_insert_id;
			}

			public function selectCover($asd){
				parent::ChangeTable('posts');
				//$asd;
				$postid = $asd['id'];
				$imgaddr = $asd['image'];
				//$asd['status'] = 1;
				$last_insert_id = parent::update(array("image"=>$imgaddr), "id=". $postid);
				return $last_insert_id;
			}






			public function add($data) {
				$last_insert_id = 0;
				if( isset($data['main']) ) {
					$data['main']['status'] = 1;
					$data['main']['created'] = time();
					$data['main']['modified'] = time();
					
					//aPrint($data);
					if( isset($data['images']) ) {
						$countImage = count($data['images']);
					//	$data['main']['image']  =  $data['images'][$countImage - 1]['image'];
						$data['main']['image']  =  $data['images'][0]['image'];
						$data['main']['type'] = 'image';
					}
					
					if( isset($data['videos']) ) {
						$countVideo = count($data['videos']);
					//	$youtubevideoid = getYoutubeVideoId($data['videos'][$countVideo - 1]['video']);
						$youtubevideoid = getYoutubeVideoId($data['videos'][0]['video']);
						$data['main']['image']  =  'http://i1.ytimg.com/vi/' . $youtubevideoid. '/0.jpg';
						$data['main']['type'] = 'video';
					}
					
					$last_insert_id = parent::add($data['main']);
					
					
					//Adding in sub Tables
					if($last_insert_id !=0 ) {
						//aPrint($data['categories']);
						if( isset($data['tags']) ) {
							parent::ChangeTable('tags');
							foreach($data['tags'] as $tag) {
								$insertData = null;
								
								$result = parent::query("SELECT `id` FROM `". TABLE_PREFIX. "tags` WHERE `tag_name` =TRIM('$tag')" );
								if(!$result) {
									$insertData['tag_name']  =  strtolower(trim($tag));
									parent::add($insertData);
								}
							}
							
							$tag_ids = parent::query("SELECT `id` FROM `". TABLE_PREFIX. "tags` WHERE `tag_name` IN ('".implode("','", $data['tags'])."')" );
							//aPrint($tag_ids);
							if($tag_ids) {
								parent::ChangeTable('post_tags');
								foreach($tag_ids as $tagid) {
									$insertData = null;
									$insertData['tag_id'] = $tagid['id'] ;
									$insertData['post_id']  =  $last_insert_id;
									parent::add($insertData);
								}
							}
							
						}

						
						
						if( isset($data['categories']) ) {
							parent::ChangeTable('post_category');
							foreach($data['categories'] as $category) {
								$insertData = null;
								$insertData['category_id']  =  $category;
								$insertData['post_id']  =  $last_insert_id;
								parent::add($insertData);
							}
						}
					



						//aPrint($data['categories']);
						if( isset($data['videos']) ) {
							//echo "Categories Exist";
							parent::ChangeTable('post_videos');
								$i = 0;
							foreach($data['videos'] as $video) {$i++;
								$youtubevideoid = getYoutubeVideoId($video['video']);
								$video['post_id']  =  $last_insert_id;
	
								if($youtubevideoid)
									$video['video_image']  =  'http://i1.ytimg.com/vi/' . $youtubevideoid. '/0.jpg';
	
								$video['sort_order']  =  $i;
								$video['created']  =  time();
								$video['modified']  =  time();

								parent::add($video);
							}
						}




						//aPrint($data['categories']);
						if( isset($data['images']) ) {
							//echo "Categories Exist";
							parent::ChangeTable('post_images');
							$i = 0;
							foreach($data['images'] as $image) {$i++;
								$validate = new ValidateField();
								if( $validate->isImage($image['image']) ) {
									$image['post_id']  =  $last_insert_id;
									$image['sort_order']  =  $i;
									$image['created']  =  time();
									$image['modified']  =  time();
									
									parent::add($image);
								}
								$validate=null;
							}
						}



					}
					
				}
				
				
				return $last_insert_id;
				
			}
			




			public function update($data, $postid) {
				if( isset($data['main']) ) {
					$data['main']['status'] = 1;
					$data['main']['modified'] = time();
					
					
					if( isset($data['images']) ) {
						$countImage = count($data['images']);
						$data['main']['image']  =  $data['images'][$countImage - 1]['image'];
						$data['main']['type'] = 'image';
					}
					
					if( isset($data['videos']) ) {
						$countVideo = count($data['videos']);
						$youtubevideoid = getYoutubeVideoId($data['videos'][$countVideo - 1]['video']);
						$data['main']['image']  =  'http://i1.ytimg.com/vi/' . $youtubevideoid. '/0.jpg';
						$data['main']['type'] = 'video';
					}
					
					$returnResult = parent::update($data['main'], "id=".$postid);
					
					
					//Adding in sub Tables
					if($postid !=0 ) {
						//aPrint($data['categories']);
						if( isset($data['tags']) ) {
							parent::ChangeTable('tags');
							foreach($data['tags'] as $tag) {
								$insertData = null;
								
								$result = parent::query("SELECT `id` FROM `". TABLE_PREFIX. "tags` WHERE `tag_name` =TRIM('$tag')" );
								if(!$result) {
									$insertData['tag_name']  =  strtolower(trim($tag));
									parent::add($insertData);
								}
							}
							
							$tag_ids = parent::query("SELECT `id` FROM `". TABLE_PREFIX. "tags` WHERE `tag_name` IN ('".implode("','", $data['tags'])."')" );
							//aPrint($tag_ids);
							if($tag_ids) {
								parent::ChangeTable('post_tags');
								parent::delete("post_id=". $postid);
								foreach($tag_ids as $tagid) {
									$insertData = null;
									$insertData['tag_id'] = $tagid['id'] ;
									$insertData['post_id']  =  $postid;
									parent::add($insertData);
								}
							}
							
						}

						
						
						if( isset($data['categories']) ) {
							parent::ChangeTable('post_category');
							parent::delete("post_id=". $postid);
							foreach($data['categories'] as $category) {
								$insertData = null;
								$insertData['category_id']  =  $category;
								$insertData['post_id']  =  $postid;
								parent::add($insertData);
							}
						}
					



						//aPrint($data['categories']);
						if( isset($data['videos']) ) {
							//echo "Categories Exist";
							parent::ChangeTable('post_videos');
							foreach($data['videos'] as $video) {
								$youtubevideoid = getYoutubeVideoId($video['video']);
								$video['post_id']  =  $postid;
	
								if($youtubevideoid)
									$video['video_image']  =  'http://i1.ytimg.com/vi/' . $youtubevideoid. '/0.jpg';
	
								$video['created']  =  time();
								$video['modified']  =  time();
								parent::add($video);
							}
						}




						//aPrint($data['categories']);
						if( isset($data['images']) ) {
							//echo "Categories Exist";
							parent::ChangeTable('post_images');
							foreach($data['images'] as $image) {
								$validate = new ValidateField();
								if( $validate->isImage($image['image']) ) {
									$image['post_id']  =  $postid;
									$image['created']  =  time();
									$image['modified']  =  time();
									parent::add($image);
								}
								$validate=null;
							}
						}



					}
					
				}
				
				
				return $returnResult;
				
			}





			public function getCategoryList($catid, $page = 1, $sort_order = "created") {
				
				$pageLimit = PAGE_LIMIT;
				$recordFrom = ($page-1) * $pageLimit ;
				
				return $this->query("SELECT t1.id, t1.type, t1.image, t1.title,t1.slug, t1.submit_by, t4.user_name as submit_by_user, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3,". TABLE_PREFIX. "users as t4 WHERE t4.id=t1.submit_by AND t3.id=t2.category_id AND t2.post_id=t1.id AND t2.category_id = $catid AND t1.deleted=0 AND t1.status=1 group by t1.id order by t1.$sort_order desc LIMIT $recordFrom, $pageLimit");
			}
			



			public function getCategoryListTotalRecords($catid) {
				
				$dbResult = $this->query("SELECT t1.id, t1.image, t1.title, t1.submit_by, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3 WHERE t3.id=t2.category_id AND t2.post_id=t1.id AND t2.category_id = $catid AND t1.deleted=0 AND t1.status=1 group by t1.id");
				return count($dbResult);
			}




			public function getTagList($tagid, $page = 1, $sort_order = "created") {
				
				$pageLimit = PAGE_LIMIT;
				$recordFrom = ($page-1) * $pageLimit ;

				return $this->query("SELECT t1.id, t1.type, t1.image, t1.title, t1.slug, t1.submit_by, t4.user_name as submit_by_user, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id, t6.tag_name FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3,". TABLE_PREFIX. "users as t4, ". TABLE_PREFIX. "post_tags as t5,". TABLE_PREFIX. "tags as t6 WHERE t4.id=t1.submit_by AND t3.id=t2.category_id AND t2.post_id=t1.id AND t5.post_id=t1.id AND t6.id=t5.tag_id AND t5.tag_id=$tagid AND t1.deleted=0 AND t1.status=1 group by t1.id order by t1.$sort_order desc LIMIT $recordFrom, $pageLimit");
			}



			public function getTagListTotalRecords($tagid) {
				
				$dbResult = $this->query("SELECT t1.id, t1.image, t1.title, t1.submit_by, t4.user_name as submit_by_user, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3,". TABLE_PREFIX. "users as t4, ". TABLE_PREFIX. "post_tags as t5,". TABLE_PREFIX. "tags as t6 WHERE t4.id=t1.submit_by AND t3.id=t2.category_id AND t2.post_id=t1.id AND t5.post_id=t1.id AND t6.id=t5.tag_id AND t5.tag_id=$tagid AND t1.deleted=0 AND t1.status=1 group by t1.id");
				return count($dbResult);
			}
			public function getTagListHeading($tagid)
			{
				return $this->query("SELECT count(t1.id) as count, t2.tag_name as tag_name from ".TABLE_PREFIX."post_tags as t1, ".TABLE_PREFIX."tags as t2 where t1.tag_id = $tagid and t2.id = $tagid");
			}



			public function getUserList($userid, $page = 1, $sort_order = 'created') {
				
				if(!$page){
					$page = 1;
				}
				$pageLimit = PAGE_LIMIT;
				$recordFrom = ($page-1) * $pageLimit ;
				//return $this->query("SELECT t1.id, t1.type, t1.image, t1.title, t1.slug, t1.submit_by, t4.user_name as submit_by_user, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id, t6.tag_name FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3,". TABLE_PREFIX. "users as t4, ". TABLE_PREFIX. "post_tags as t5,". TABLE_PREFIX. "tags as t6 WHERE t4.id=t1.submit_by AND t3.id=t2.category_id AND t2.post_id=t1.id AND t1.submit_by=$userid AND t1.deleted=0 AND t1.status=1 group by t1.id order by t1.$sort_order desc LIMIT $recordFrom, $pageLimit");
				//$cv = $this->query("SELECT t1.id, t1.type, t1.image, t1.title, t1.slug, t1.submit_by, t4.user_name as submit_by_user, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id, t6.tag_name FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3,". TABLE_PREFIX. "users as t4, ". TABLE_PREFIX. "post_tags as t5,". TABLE_PREFIX. "tags as t6 WHERE t4.id=t1.submit_by AND t3.id=t2.category_id AND t2.post_id=t1.id AND t1.submit_by=$userid AND t1.deleted=0 AND t1.status=1 group by t1.id order by t1.$sort_order desc LIMIT $recordFrom, $pageLimit");
				//echo $pageLimit;
				//$a = time();
				//return $this->query("SELECT t1.id, t1.image, t1.title, t1.slug, t1.submit_by, t4.user_name as submit_by_user, t1.total_views, t1.created, t6.tag_name FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "users as t4, ". TABLE_PREFIX. "post_tags as t5,". TABLE_PREFIX. "tags as t6 WHERE t4.id=t1.submit_by AND t1.submit_by=$userid AND t1.deleted=0 AND t1.status=1 group by t1.id desc LIMIT 10");
				//return $this->query("SELECT t1.id, t1.image, t1.title, t1.slug, t1.submit_by, t1.total_views, t1.created FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "users as t4 WHERE t4.id = $userid AND t1.submit_by=$userid AND t1.deleted=0 AND t1.status=1 group by t1.id order by t1.$sort_order desc LIMIT $recordFrom, $pageLimit");
				return $this->query("SELECT t1.id, t1.image, t1.title, t1.slug, t1.submit_by, t1.total_views, t1.created FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "users as t4 WHERE t4.id = $userid AND t1.submit_by=$userid AND t1.deleted=0 AND t1.status in (0,1) group by t1.id order by t1.$sort_order desc LIMIT $recordFrom, $pageLimit");
				//$end = microtime();
				//$creationtime = ($end - $start) / 1000;
				//printf("Page created in %.5f seconds.", $creationtime);
			}

			public function getUserInfo($userid)
			{
				return $this->query("SELECT t1.first_name, t1.last_name, t1.email, t1.image from ". TABLE_PREFIX. "users as t1 where t1.id = $userid LIMIT 1");
			}



			public function getUserListTotalRecords($userid) {
				
				$dbResult = $this->query("SELECT t1.id, t1.type, t1.image, t1.title, t1.submit_by, t4.user_name as submit_by_user, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id, t6.tag_name FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3,". TABLE_PREFIX. "users as t4, ". TABLE_PREFIX. "post_tags as t5,". TABLE_PREFIX. "tags as t6 WHERE t4.id=t1.submit_by AND t3.id=t2.category_id AND t2.post_id=t1.id AND t1.submit_by=$userid AND t1.deleted=0 AND t1.status=1 group by t1.id");
				return count($dbResult);
			}
			
			public function getSearchList($SearchText, $page = 1, $sort_order = "created") {
				
				$pageLimit = PAGE_LIMIT;
				$recordFrom = ($page-1) * $pageLimit ;
				$sql = "SELECT * FROM (SELECT t1.id, t1.type, t1.image, t1.title,t1.slug, t1.submit_by, t4.user_name as submit_by_user, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3,". TABLE_PREFIX. "users as t4 WHERE t4.id=t1.submit_by AND t3.id=t2.category_id AND t2.post_id=t1.id AND t1.title like '%$SearchText%' AND t1.deleted=0 AND t1.status=1 group by t1.id order by t1.$sort_order) as a UNION SELECT * FROM(SELECT t1.id, t1.type, t1.image, t1.title, t1.slug,t1.submit_by, t4.user_name as submit_by_user, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3,". TABLE_PREFIX. "users as t4, ". TABLE_PREFIX. "post_tags as t5,". TABLE_PREFIX. "tags as t6 WHERE t4.id=t1.submit_by AND t3.id=t2.category_id AND t2.post_id=t1.id AND t5.post_id=t1.id AND t6.id=t5.tag_id AND t6.tag_name like '%$SearchText%' AND t1.deleted=0 AND t1.status=1 order by t1.$sort_order) as b group by b.id LIMIT $recordFrom, $pageLimit";
				
				//echo $sql;
				
				$dbResult = $this->query($sql);
				//aPrint ($dbResult);
				return $dbResult;
				
			}
			public function getSearchTagList($SearchText){
				$sql = "SELECT * FROM ".TABLE_PREFIX."tags as t1 where t1.tag_name like '%$SearchText%' limit 10";
				$dbResult = $this->query($sql);
				return $dbResult;
			}



			public function getSearchListTotalRecords($SearchText) {
				
				$dbResult = $this->query("SELECT * FROM (SELECT t1.id, t1.type, t1.image, t1.title, t1.slug, t4.user_name as submit_by_user, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3,". TABLE_PREFIX. "users as t4 WHERE t4.id=t1.submit_by AND t3.id=t2.category_id AND t2.post_id=t1.id AND t3.name like '%$SearchText%' AND t1.deleted=0 AND t1.status=1) as a UNION SELECT * FROM(SELECT t1.id, t1.type, t1.image, t1.title, t1.slug, t4.user_name as submit_by_user, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3,". TABLE_PREFIX. "users as t4, ". TABLE_PREFIX. "post_tags as t5,". TABLE_PREFIX. "tags as t6 WHERE t4.id=t1.submit_by AND t3.id=t2.category_id AND t2.post_id=t1.id AND t5.post_id=t1.id AND t6.id=t5.tag_id AND t6.tag_name like '%$SearchText%' AND t1.deleted=0 AND t1.status=1) as b");
				return count($dbResult);
			}
		



			public function getListAll($page = 1, $sort_order = "created") {

				$pageLimit = PAGE_LIMIT;
				$recordFrom = ($page-1) * $pageLimit ;

				return $this->query("SELECT t1.id, t1.image, t1.title, t1.submit_by_name, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3 WHERE t3.id=t2.category_id AND t2.post_id=t1.id AND t1.deleted=0 AND t1.status=1 group by t1.id order by t1.$sort_order desc LIMIT $recordFrom, $pageLimit");
			}
			

			public function getListAllTotalRecords() {

				$dbResult = $this->query("SELECT t1.id, t1.image, t1.title, t1.total_views, t1.created, t3.name as category_name, t3.id as category_id FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "post_category as t2,". TABLE_PREFIX. "categories as t3 WHERE t3.id=t2.category_id AND t2.post_id=t1.id AND t1.deleted=0 AND t1.status=1");
				
				return count($dbResult);
				
			}
			
			
			
			
			public function getRecord($postid) {

				$dbResult = $this->query("SELECT t1.id, t1.tags, t1.type, t1.image, t1.title,t1.slug, t1.meta_description, t1.meta_keyword, t1.content,t1.submit_by, t2.user_name as submit_by_user, t2.image as user_image, t1.total_views, t1.created FROM ". TABLE_PREFIX. "posts as t1, ". TABLE_PREFIX. "users as t2 WHERE t2.id=t1.submit_by AND t1.id=$postid AND t1.deleted=0 LIMIT 1");
				return $dbResult;
			}
			
			
			

			public function getTags($postid) {
				return $this->query("SELECT t1.tag_id, t2.tag_name FROM ". TABLE_PREFIX. "post_tags t1,". TABLE_PREFIX. "tags t2 WHERE t1.post_id=$postid AND t2.id=t1.tag_id");
		
			}
			
			
			public function getCategories($postid) {
				return $this->query("SELECT t1.category_id, t2.name as category_name FROM ". TABLE_PREFIX. "post_category t1,". TABLE_PREFIX. "categories t2 WHERE t1.post_id=$postid AND t2.id=t1.category_id");
		
			}
			
			
			
			public function getVideos($postid) {
				parent::ChangeTable('post_videos');
				return $this->fetch_all("post_id=$postid order by id desc");
			}





			public function getImages($postid) {
				parent::ChangeTable('post_images');
				return $this->fetch_all("post_id=$postid order by id asc");
			}




			public function getComments($postid) {
				return $this->query("SELECT t1.*, t2.user_name as submit_by_user, t2.image as image from ". TABLE_PREFIX. "post_comments t1, ". TABLE_PREFIX. "users t2 WHERE t1.deleted=0 AND t1.status=1 AND t1.post_id=$postid AND t1.posted_by=t2.id order by t1.id desc");
			}
			
			
			
			
			
	
			public function addNewComment($data) {
				parent::ChangeTable('post_comments');
				return parent::add($data);
			}	
			
			public function getRelatedPosts($postid, $page =1) {
				if(!$page){
					$page = 1;
				}
				$pageLimit = PAGE_LIMIT;
				$recordFrom = ($page-1) * $pageLimit ;
				$sql = "SELECT t1.* FROM ". TABLE_PREFIX. "posts t1 WHERE t1.deleted=0 AND t1.status=1 AND t1.id IN (SELECT DISTINCT post_id FROM ". TABLE_PREFIX. "post_category WHERE category_id = (SELECT category_id FROM ". TABLE_PREFIX. "post_category WHERE post_id=$postid) UNION SELECT DISTINCT post_id FROM ". TABLE_PREFIX. "post_tags WHERE tag_id IN (SELECT tag_id FROM ". TABLE_PREFIX. "post_tags WHERE post_id=$postid)) AND t1.id!=$postid group by t1.id order by t1.id desc LIMIT $recordFrom, $pageLimit";
				return $this->query($sql);
			

			}
			/*
			public function getRelatedPosts($postid) {
							
				//$sql = "SELECT t1.* FROM ". TABLE_PREFIX. "posts t1, ". TABLE_PREFIX. "users t2 WHERE t1.deleted=0 AND t1.status=1 AND t2.id=t1.submit_by AND t1.id IN (SELECT post_id FROM ". TABLE_PREFIX. "post_category WHERE post_id!=$postid AND category_id IN (SELECT category_id FROM ". TABLE_PREFIX. "post_category WHERE post_id=$postid)) OR t1.id IN (SELECT post_id FROM ". TABLE_PREFIX. "post_tags WHERE post_id!=$postid AND tag_id IN (SELECT tag_id FROM ". TABLE_PREFIX. "post_tags WHERE post_id=$postid)) group by t1.id order by t1.id desc Limit 10";
				//echo $sql;
                $sql = "SELECT t1.* FROM ". TABLE_PREFIX. "posts t1 WHERE t1.deleted=0 AND t1.status=1 AND t1.id IN (SELECT DISTINCT post_id FROM ". TABLE_PREFIX. "post_category WHERE category_id = (SELECT category_id FROM ". TABLE_PREFIX. "post_category WHERE post_id=$postid) UNION SELECT DISTINCT post_id FROM ". TABLE_PREFIX. "post_tags WHERE tag_id IN (SELECT tag_id FROM ". TABLE_PREFIX. "post_tags WHERE post_id=$postid)) AND t1.id!=$postid group by t1.id order by t1.id desc Limit 10";
				return $this->query($sql);
				
			}
			*/

			public function getMostTagged(){
				$sql = "select a.tag_id, count(a.tag_id) as c, b.tag_name from tbl_post_tags a, tbl_tags b where b.id=a.tag_id group by tag_id order by c desc limit 11;";
				return $this->query($sql);
			}
			


			public function getPostOwnerID($postid) {
				return parent::fetch_singleField("submit_by", "id=$postid");
			}			
			

			public function setViews($postid, $noofviews) {
				parent::ChangeTable('posts');
				return parent::update(array("total_views"=> $noofviews),"id=$postid");
			}
	}

?>