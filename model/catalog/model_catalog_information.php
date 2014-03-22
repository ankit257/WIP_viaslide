<?php

	class Model_Information extends Emkt_Model {
	
			public function __construct() {
				parent::__construct('page_content');
			}
			
			public function getDetailsById($val) {
				return $this->fetch_single("*","id='$val'");
			}

			public function getDetailsByTitle($val) {
				return $this->fetch_single("*","title='$val'");
			}
			
			public function getAll() {
				return $this->fetch_all("deleted=0 AND status=1 order by `title`", "id,title");
			}


	}

?>