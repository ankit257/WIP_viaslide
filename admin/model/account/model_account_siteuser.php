<?php

	class Model_SiteUser extends Emkt_Model {
	
			public function __construct() {
				parent::__construct('users');
			}
			
			
			// Insert New Record
			public function insert($data) {
				return $this->add($data);
			}
			
			
			// Edit Record
			public function edit($data,$id) {
				return $this->update($data,"id='$id'");
			}
			
			
			// Delete Record
			public function delete($id) {
				return $this->delete("id='$id'");
			}
			

			// Toggle By Field
			public function toggle($field, $query) {
				return $this->changeFieldValue($field, $query,$interchange=true);
			}
			
			
			// Queries
			
	
			public function getAll($sortby, $sortorder, $page=1) {
				$pageLimit = ADMIN_PAGE_LIMIT;
				$recordFrom = ($page-1) * $pageLimit ;
				return $this->fetch_all("*", "deleted=0 order by $sortby $sortorder LIMIT $recordFrom, $pageLimit");
			}
			
			public function getNameById($id) {
				return $this->fetch_singleField("name", "id='$id'");	
			}
			
			public function getIdByName($name) {
				return $this->fetch_singleField("id", "name='$name'");	
			}

			public function getDetailsById($val) {
				return $this->fetch_single("*","id='$val'");
			}

			public function getDetailsByName($name) {
				return $this->fetch_single("*","username='$val'");
			}

			public function getDetailsByFilter($filter) {
				return $this->fetch_all("id,username", "username like '$filter%'");
			}
			
			public function getDetailsByQuery($field="*", $query=1, $page=1) {
				$pageLimit = ADMIN_PAGE_LIMIT;
				$recordFrom = ($page-1) * $pageLimit ;
				return $this->fetch_all($field, $query .  " LIMIT $recordFrom, $pageLimit");
			}
			
			public function Login($username, $password) {
				return $this->fetch_single("*", "username='$username' AND password='$password'");
			}
			
			public function getAllUserGroup($field) {
				$sql = "SELECT $field from ". TABLE_PREFIX. "admin_user_type order by id";
				return $this->query($sql);
			}

	}

?>