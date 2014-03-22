<?php
	class Controller_Career extends Emarketz_Controller {

		public function __construct() {
			require_once('model/catalog/model_catalog_career.php');
			$this->model =  new Model_Career();
		}
		
		public function index() {
			$heading = "Careers";
			$careers =  $this->model->getAll();

			$header = $this->addTemplate('header');
			$banner = $this->addTemplate('banner');
			$fixbuttons = $this->addTemplate('fixbutton');
			$right = $this->addTemplate('right');
			$footer = $this->addTemplate('footer');
			$testimonials = $this->getDataFromPath(WEBROOT."index.php?route=testimonial/crousal");

			include_once(THEMEPATH. 'templates/catalog/career/template_catalog_career_index.php');
		}
		
		public function apply() {
			
			$error = "" ; $success="";
			
			if(isset($_POST) && !empty($_POST) && $_POST[submit]=="Submit") {
				//print_r($_POST);
				if( trim($_POST[info][Name]) == "" or trim($_POST[info][Job_Title])=="" ) {
					$error = "Job Title / Name cant be empty" ;	
				}
				
				if(empty($error)) {

					global $mail;
					//$mail->AddAddress(WEBMASTER_EMAIL);
					$mail->AddAddress('hr@desertislandsvc.com');
					$mail->Subject = "Employment Details Successfully Submitted";
					
					$email_content = array
					(
						"User_Name" => $_POST[info][Name],
						
						"Top_Content"=>"Your Submitting Details as Follows:<br />",
						
						"Details_Content" => $_POST[info],
						
						"Bottom_Content" => "<br />We will back soon with answer of your query.<br /><br />",
						
						"Sign"	=> "Best Regards,<br /><br />Human Resources<br /><b>Desert Island Services</b><br />P: 480 447 3502<br />E: info@desertislandsvc.com | W: www.desertislandsvc.com<br /><img src='".WEBROOT."common_assets/website_data/images/Logos.jpg'>"

					);
					
					//echo $mail->createHtmlMsg($email_content); return;

					$mail->Body    = $mail->createHtmlMsg($email_content);
					$mail->AltBody = $mail->createPlainMsg($email_content);
					
					if (isset($_FILES['upload']) &&
    					$_FILES['upload']['error'] == UPLOAD_ERR_OK) {
    					$mail->AddAttachment($_FILES['upload']['tmp_name'],
                        $_FILES['upload']['name']);
					}			
	
					if($mail->Send()) {
						$success = "Your Employment Details Successfully Submitted";
					} else {
						$error = "Your Employment Details Couldnt Submitted.. Try Again";
					}
	
				}
			}
			
			$applied_for = isset($_GET['applied_for']) ? $_GET['applied_for'] : '' ;
			//$dbData = $this->model->getAll();
			$header = $this->addTemplate('header');
			$banner = $this->addTemplate('banner');
			$fixbuttons = $this->addTemplate('fixbutton');
			$right = $this->addTemplate('right');
			$footer = $this->addTemplate('footer');
			$testimonials = $this->getDataFromPath(WEBROOT."index.php?route=testimonial/crousal");

			include_once(THEMEPATH. 'templates/catalog/career/template_catalog_career_form.php');
		}
		
	}

?>