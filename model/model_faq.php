<?php

	class Model_Faq extends Emkt_Model {
	
			public function __construct() {
				parent::__construct('faqs');
			}
			




			public function getAll() {
				return parent::fetch_all("deleted=0 AND status=1 order by sort_order, id", "*");
			}


		
	}

?>