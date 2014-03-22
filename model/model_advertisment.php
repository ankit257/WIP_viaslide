<?php

	class Model_Advertisment extends Emkt_Model {
	
			public function __construct() {
				parent::__construct('advertisments');
			}
			




			public function get($layout, $position) {
				return parent::fetch_all("FIND_IN_SET('$layout',layout_page) AND FIND_IN_SET('$position',banner_position) order by id", "*");
			}


		
	}

?>