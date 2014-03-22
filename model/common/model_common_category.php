<?php
	class category_Model extends Emkt_Model
	{
		
		function __construct()
		{
				parent::__construct("categories");
		}
		
		
		public function getMainCatList()
		{
			$dbData=parent::fetch_all("deleted=0 AND status=1 AND parent_id=0 order by sort_order, id", "id,name,parent_id");

			if($dbData)
				return $dbData;

			return false;
		}
		
	
		public function getTopNavigation()
		{
			$dbData=parent::fetch_all("deleted=0 AND status=1 AND top=1 order by sort_order, id", "id,name,parent_id");

			if($dbData)
				return $dbData;

			return false;
		}
		
		public function getTopNavigationByCatID($catid)
		{
			return false;
			$dbData=parent::fetch_all("deleted=0 AND status=1 AND top=1 AND parent_id=".$catid. " order by sort_order, id", "id,name,parent_id");

			if($dbData)
				return $dbData;

			return false;
		}


		public function getMaxViewsPostHomePage()
		{
			$dbData=parent::query("SELECT t1.id as post_id, t1.title as post_title, t1.slug as post_slug, t1.image as post_image, t1.type as post_type, t1.submit_by, t2.user_name as posted_by, CONCAT(t2.first_name". " ". ",  t2.last_name) as posted_by_name, t1.total_views as total_views, t1.created as posted_date FROM ". TABLE_PREFIX . "posts as t1, ". TABLE_PREFIX. "users as t2 WHERE t1.deleted=0 AND t1.status=1 AND t1.hot=1 AND t2.id=t1.submit_by order by t1.total_views desc LIMIT 0,5");

			if($dbData)
				return $dbData;
				
			return false;
		}



		public function getMaxViewsPost()
		{
			$dbData=parent::query("SELECT t1.id as post_id, t1.title as post_title, t1.image as post_image, t1.type as post_type, t2.user_name as posted_by, CONCAT(t2.first_name". " ". ",  t2.last_name) as posted_by_name, t1.total_views as total_views, t1.created as posted_date FROM ". TABLE_PREFIX . "posts as t1, ". TABLE_PREFIX. "users as t2 WHERE t1.deleted=0 AND t1.status=1 AND t2.id=t1.submit_by order by t1.total_views desc LIMIT 0,8");

			if($dbData)
				return $dbData;
				
			return false;
		}

		public function getCategoryVisePost()
		{
			$dbData=parent::query("SELECT t1.name as category_name, t2.id as post_id, t2.title as post_title, t2.image as post_image, t2.type as post_type,   t4.user_name as posted_by, CONCAT(t4.first_name". " ". ",  t4.last_name) as posted_by_name, t2.total_views as total_views, t2.created as posted_date   FROM ". TABLE_PREFIX . "categories as t1, ". TABLE_PREFIX . "posts as t2, ". TABLE_PREFIX . "post_category as t3, ". TABLE_PREFIX. "users as t4 WHERE t1.id=t3.category_id AND t2.id=t3.post_id AND t1.deleted=0 AND t1.status=1 AND t2.deleted=0 AND t2.status=1 AND t4.id=t2.submit_by order by t1.sort_order ASC, t2.id DESC LIMIT 0,44");

			if($dbData)
				return $dbData;
				
			return false;
		}


		public function get($data="all")
		{
			if($data=="all")
				$dbData=parent::fetch_all("deleted=0 AND status=1 order by sort_order, id", "id,name,parent_id");
			else
				$dbData=parent::fetch_all("deleted=0 AND status=1 AND ". $data. " order by sort_order, id", "id,name,parent_id");

			if($dbData)
				return $dbData;
			else
				return false;
		}
		
		public function getName($id)
		{
			$dbData=parent::fetch_singleField("name", "id=". $id);

			if($dbData)
				return $dbData;
			else
				return false;
		}

		public function query($query)
		{
				$dbData=parent::query($query);
	
				if($dbData)
					return $dbData;
				else
					return false;
		}
		
		public function getTableName()
		{
			return $this->table_name;
		}
		
		
		private function isExist($userid, $userpwd)
		{
			
		}

	}
	
?>