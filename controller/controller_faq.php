<?php
	class Controller_Faq extends Emarketz_Controller {

		private $FaqModel;

		public function __construct() {
			require_once('model/model_faq.php');
			$this->FaqModel =  new Model_Faq();
		}
		
		public function index() {
			$heading = "Frequently Asked Questions";
			$faqs =  $this->FaqModel->getAll();
			//aPrint($faqs);
			include_once(THEMEPATH. 'templates/common/template_common_header.php');
			include_once(THEMEPATH. 'templates/catalog/faq/template_catalog_faq.php');
			include_once(THEMEPATH. 'templates/common/template_common_footer.php');
		}
		
	}

?>