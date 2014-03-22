<?php

	class Controller_Category extends Emarketz_Controller {
		
		public function getSubCategories() {
			
			$catid = isset($_GET['catid']) ? $_GET['catid'] : '0' ;
			
			if($catid > 0) {
				require_once('model/common/model_common_category.php');
				$catModel = new category_Model();
				$dbResult = $catModel->get("parent_id='" . mysql_real_escape_string(stripslashes($catid)). "'");
				
				if($dbResult) {
					$array = array();
					foreach($dbResult as $row) {
						$array[] = array("value" => $row['id'], "property" => $row['name']);
					}
					
					echo json_encode($array);
					return;
				}
				
			}
			
			echo "fail";
			
			
		}





	}

?>