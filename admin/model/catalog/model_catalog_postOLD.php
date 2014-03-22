<?php

	class Model_Post extends Emkt_Model {
	
			public function __construct() {
				parent::__construct('posts');
			}
			
			
			// Insert New Record
			public function insert($data) {
				//echo "<pre>"; print_r($data); echo "</pre>";
				mysql_query("BEGIN");
				$sql = "
					INSERT INTO ". TABLE_PREFIX. "posts (" ;
				
				$col=""; $values="";	
				foreach($data[main] as $key=>$val) {
					$col .= " `$key`, ";
					$values .= " '".mysql_real_escape_string(stripslashes($val))."', ";
					
				}
				$col = substr($col,0,-2);
				$values = substr($values,0,-2);
				$sql .= "$col) VALUES ($values) ;";
				
				mysql_query($sql);
				$last_insert_id = mysql_insert_id();
				$sql = "INSERT INTO ". TABLE_PREFIX. "post_fields ( `post_id`, `field`, `value`) VALUES ";
				
				
				$values="";
				foreach($data[field] as $key=>$val) {
					$values .= "( '$last_insert_id', '$key', '$val' ), ";
					
				}
				
				$values = substr($values,0,-2);
				$sql .= " ". $values. ";";

				mysql_query($sql);
				
				$sql = "INSERT INTO ". TABLE_PREFIX. "post_category ( `post_id`, `category_id`) VALUES ";
				$values="";
				foreach($data[cat] as $val) {
					$values .= "( '$last_insert_id', '$val' ), ";
					
				}
				
				$values = substr($values,0,-2);
				$sql .= " ". $values. ";";

				mysql_query($sql);
				
				
				//echo $sql;
				return mysql_query("COMMIT");
//				echo $sql;
					
				//return mysql_query($sql) or die(mysql_error());
//				return $this->query($sql);
			
				//return $this->add($data);
			}
			
			
			// Edit Record
			public function edit($data,$id) {
				mysql_query("BEGIN");
				
				$sql = "DELETE from ". TABLE_PREFIX. "post_fields WHERE post_id=$id";
				mysql_query($sql);
				
				$sql = "INSERT INTO ". TABLE_PREFIX. "post_fields ( `post_id`, `field`, `value`) VALUES ";
				
				$values="";
				foreach($data[field] as $key=>$val) {
					$values .= "( '$id', '$key', '$val' ), ";
					
				}
				
				$values = substr($values,0,-2);
				$sql .= " ". $values. ";";

				mysql_query($sql);
				
				$sql = "DELETE from ". TABLE_PREFIX. "post_category WHERE post_id=$id";
				mysql_query($sql);
				
				$sql = "INSERT INTO ". TABLE_PREFIX. "post_category ( `post_id`, `category_id`) VALUES ";
				$values="";
				foreach($data[cat] as $val) {
					$values .= "( '$id', '$val' ), ";
					
				}
				
				$values = substr($values,0,-2);
				$sql .= " ". $values. ";";

				mysql_query($sql);
				
				$this->update($data[main],"id='$id'");
				
				mysql_query("COMMIT");
				return true;
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

			public function getDetailsByQuery($field="*", $query=1, $page=1) {
				$pageLimit = ADMIN_PAGE_LIMIT;
				$recordFrom = ($page-1) * $pageLimit ;
				return $this->fetch_all($field, $query .  " LIMIT $recordFrom, $pageLimit");
			}
			
			public function getAllFields($post_id) {
				return $this->query("Select field,value,type from ". TABLE_PREFIX. "post_fields where post_id=$post_id group by field order by sort_order, id");
			}
			
			public function getAllCategories($post_id) {
				return $this->query("Select tbl1.category_id, tbl2.name from ". TABLE_PREFIX. "post_category as tbl1,". TABLE_PREFIX. "categories as tbl2 where tbl1.category_id=tbl2.id AND tbl1.post_id=$post_id order by tbl1.category_id");
			}

	}

?>