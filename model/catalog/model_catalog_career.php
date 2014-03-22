<?php

	class Model_Career extends Emkt_Model {
	
			public function __construct() {
				parent::__construct('careers');
			}
			
			public function getAll() {
				return $this->fetch_all("*","1 order by sort_order, id");
			}
			
	}

?>