<?php

	class Model_Category extends Emkt_Model {
	
			public function __construct() {
				parent::__construct('categories');
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

			public function getAllParent() {
				return $this->fetch_all("id,name", "deleted=0 AND parent_id=0 order by id");
			}

			public function getAll($sortby="id", $sortorder="ASC") {
				return $this->fetch_all("*", "deleted=0 order by $sortby $sortorder");
				/*
				$dbData = $this->fetch_all("id,name", "parent_id=0 order by id");
				for($i=0; $i<count($dbData); $i++) {
					$dbData[$i][childs] =  $this->fetch_all("id,name", "parent_id='". $dbData[$i][id]. "' order by id");
					
					for($j=0; $j<count($dbData[$i][childs]); $j++) {
						$dbData[$i][childs][$j][childs] =  $this->fetch_all("id,name", "parent_id='". $dbData[$i][childs][$j][id]. "' order by id");
						
						for($k=0; $j<count($dbData[$i][childs][$j][childs]); $k++) {
							$dbData[$i][childs][$j][childs][$k][childs] =  $this->fetch_all("id,name", "parent_id='". $dbData[$i][childs][$j][childs][$k][id]. "' order by id");
							
							
						}	
					}
				
				}
				
				
				
				return $dbData;
				*/
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

	}

?>