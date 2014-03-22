<?php

	class Model_Current_Opening extends Emkt_Model {
	
			public function __construct() {
				parent::__construct('careers');
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
				return $this->fetch_all("*", "1 order by $sortby $sortorder LIMIT $recordFrom, $pageLimit");
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
				return $this->fetch_single("*","name='$val'");
			}

			public function getDetailsByFilter($filter) {
				return $this->fetch_all("id,name", "name like '$filter%'");
			}
			
			public function getDetailsByQuery($field="*", $query=1, $page=1) {
				$pageLimit = ADMIN_PAGE_LIMIT;
				$recordFrom = ($page-1) * $pageLimit ;
				return $this->fetch_all($field, $query .  " LIMIT $recordFrom, $pageLimit");
			}

	}

?>