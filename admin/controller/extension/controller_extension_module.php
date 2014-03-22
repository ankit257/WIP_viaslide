<?php
	class Controller_Module {
		
		public function index() {
			global $header, $menu, $footer;


			echo $header. $menu;
			
			$modulesDir = DirListing("extension/modules");
			
			foreach($modulesDir as $moduleDir) {
				echo "extension/modules/". $moduleDir . "/language/". strtolower(WEBSITE_LANGUAGE). "/". $moduleDir. ".php";
				if( file_exists("extension/modules/". $moduleDir . "/language/". strtolower(WEBSITE_LANGUAGE). "/". $moduleDir. ".php") ) {
					include_once("extension/modules/". $moduleDir . "/language/". strtolower(WEBSITE_LANGUAGE). "/". $moduleDir. ".php");
				}
				
				if($_module) {
					$_module['id'] = $moduleDir ;
					$modules[] = $_module;
				}
				
			}
			
			
			include_once('view/templates/extension/template_extension_module.php');
			
			echo $footer;
			

		}
		
		
		public function update() {

			if( isset($_POST['config']) ) {
				$file = fopen("extension/modules/". $_GET['id'] . "/config/config_". $_GET['id']. ".php","w");
				$writeString = "<?php";
				ob_start();
				foreach($_POST['config'] as $key=>$value) {
					echo "\n";
					echo "\$config['$key']='$value';";
				}
				$writeString .= ob_get_contents();
				ob_get_clean();
				$writeString .= "\n?>";
				echo fwrite($file,$writeString);
				fclose($file);
			}


			global $header, $menu, $footer;
			
			echo $header. $menu;
			
			//Loading Configuration File
			if( file_exists("extension/modules/". $_GET['id'] . "/config/config_". $_GET['id']. ".php") ) {
				include_once("extension/modules/". $_GET['id'] . "/config/config_". $_GET['id']. ".php");
			}
			
			
			//Loading Template File
			if( file_exists("extension/modules/". $_GET['id'] . "/view/template/template_". $_GET['id']. ".php") ) {
				include_once("extension/modules/". $_GET['id'] . "/view/template/template_". $_GET['id']. ".php");
			}
			
			echo $footer;
			
						
		}
		
		
		public function save() {
			$file = fopen("extension/modules/". $_GET['id'] . "/config/config_". $_GET['id']. "1.php","w");
			echo fwrite($file,"Hello World. Testing!");
			fclose($file);
		}
		
	}
	
	
	function DirListing($path) {
			$folders = false;
			//Open images directory
			$dir = @ dir($path);
			//List files in images directory
			while (($file = $dir->read()) !== false)
			  {
				  if($file !="." && $file !="..") {
					  $folders[] = $file;
				  }
			  }

			$dir->close();
			
			return $folders;
	}
	
?>