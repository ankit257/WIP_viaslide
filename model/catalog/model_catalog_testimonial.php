<?php

	class Model_Testimonial extends Emkt_Model {
	
			public function __construct() {
				parent::__construct('testimonials');
			}
			
			public function getAll() {
				return $this->fetch_all("*","1 order by sort_order, id");
			}
			
	}

?>