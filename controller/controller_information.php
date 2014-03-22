<?php
	class Controller_Information extends Emarketz_Controller {
		
		public function __construct() {
			require_once('model/catalog/model_catalog_information.php');
			$this->model =  new Model_Information();
		}
		




		public function index() {
			if(isset($_GET[id]))
				$dbData =  $this->model->getDetailsById($_GET[id]);
			
			if(isset($_GET[title]))
				$dbData =  $this->model->getDetailsByTitle($_GET[title]);

			
			$heading = $dbData[title];
			$content = $dbData[content];
			$image = $dbData[image];
			
			$header = $this->addTemplate('header');
			//$banner = $this->addTemplate('banner');
			//$fixbuttons = $this->addTemplate('fixbutton');

			//$right = $this->addTemplate('right');

			$footer = $this->addTemplate('footer');
			//$testimonials = $this->getDataFromPath(WEBROOT."index.php?route=testimonial/crousal");

			include_once(THEMEPATH. 'templates/catalog/information/template_catalog_information_index.php');
		}
		
		public function information() {
			$this->index();
		}
		





		public function contact() {
			$error = "" ; $success="";
			
			if(isset($_POST) && !empty($_POST)) {
				//print_r($_POST);
				$info =  $_POST['info'];
				$info[Type_Of_Service] = implode(" AND ",isset($_POST['Type_of_Service']) ? $_POST['Type_of_Service'] : array(''));
				$info[Size_Of_Property] = implode(" AND ",isset($_POST['Size_of_Property']) ? $_POST['Size_of_Property'] : array(''));
				//echo "<pre>"; print_r($info); echo "</pre>";
				if( trim($info[Name]) == "" or trim($info[Email]) == "" or count($info[Type_Of_Service]) < 1 or count($info[Size_Of_Property]) < 1  ) {
					$error = "Name / Email / Type of Service / Size of Property can not be empty" ;	
				}
				
				if(empty($error)) {

					global $mail;
					$mail->AddAddress($info[Email]);
					//$mail->AddBCC(WEBMASTER_EMAIL);
					$mail->AddBCC('info@desertislandsvc.com');
					$mail->Subject = "Query Submitted Successfully";
					
					$email_content = array
					(
						"User_Name" => $info[Name],
						
						"Top_Content"=>"Your Submitting Details as Follows:<br />",
						
						"Details_Content" => $info,
						
						"Bottom_Content" => "<br />We will back soon with answer of your query.<br /><br />",
						
						"Sign"	=> "Best Regards,<br /><br />Customer Support<br /><b>Desert Island Services</b><br />P: 480 447 3502<br />E: info@desertislandsvc.com | W: www.desertislandsvc.com<br /><img src='".WEBROOT."common_assets/website_data/images/Logos.jpg'>"

					);
					
					//echo $mail->createHtmlMsg($email_content); return;

					$mail->Body    = $mail->createHtmlMsg($email_content);
					$mail->AltBody = $mail->createPlainMsg($email_content);
					
				
	
					if($mail->Send()) {
						$success = "Query Submitted Successfully";
					} else {
						$error = "Query Could not Submitted.. Try Again";
					}
	
				}
			}
			
			$header = $this->addTemplate('header');
			$banner = $this->addTemplate('banner');
			$fixbuttons = $this->addTemplate('fixbutton');
			$right = $this->addTemplate('right');
			$footer = $this->addTemplate('footer');
			$testimonials = $this->getDataFromPath(WEBROOT."index.php?route=testimonial/crousal");

			include_once(THEMEPATH. 'templates/catalog/information/template_catalog_information_contact.php');
		}

	

		
		
		public function sitemap() {
		
			$heading = 'Site Map';
			
			$InformationHeading = "Information";
			$Informations = $this->model->getAll();
			
			require_once('model/common/model_common_category.php');
			$catModel = new category_Model();
			$allcategories = $catModel->getTopNavigation();
			$Categories = buildTreeArray($allcategories);
			
			
			//aPrint($result);
			
			$content = $dbData[content];
						
			$header = $this->addTemplate('header');
				
			$footer = $this->addTemplate('footer');

			include_once(THEMEPATH. 'templates/catalog/information/template_catalog_information_sitemap.php');
		}
		
		

	}

?>