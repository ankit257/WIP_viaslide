<?php

	class Emarketz_Controller {
		public	$model;
		public $widgets = array();
		
		public function __set($name, $value) { 
    	    $this->widgets[$name]=$value; 
	    } 
		
		public function __get($name) { 
        	return $this->widgets[$name]; 
     	}
		
		public function addTemplate($name) {
			ob_start();	include_once(THEMEPATH. 'templates/common/template_common_'. $name. '.php'); $TemplateVar = ob_get_clean();
			return $TemplateVar;
		}
		
		public function getDataFromPath($path) {
			return file_get_contents($path);
		}
			
	}

?>