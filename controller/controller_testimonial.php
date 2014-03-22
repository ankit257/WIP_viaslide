<?php
	class Controller_Testimonial extends Emarketz_Controller {
		
		public function __construct() {
			require_once('model/catalog/model_catalog_testimonial.php');
			$this->model =  new Model_Testimonial();
		}
		
		public function index() {
			$heading = "Testimonials";
			$testimonials =  $this->model->getAll();

			$header = $this->addTemplate('header');
			$banner = $this->addTemplate('banner');
			$footer = $this->addTemplate('footer');

			include_once(THEMEPATH. 'templates/catalog/testimonial/template_catalog_testimonial_index.php');
		}
		
		public function crousal() {
			$heading = "Testimonials";
			$testimonials =  $this->model->getAll();
			include_once(THEMEPATH. 'templates/catalog/testimonial/template_catalog_testimonial_crousal.php');
		}
		
		public function insert() {
			
			if( trim($_POST['name']) == ""    ||    trim($_POST['email']) == ""    ||    trim($_POST['content'])   ==   "" ) {
				echo "fail"; return;	
			}
			
			$data[title] = "USER TESTI";
			$data[posted_by] = $_POST['name'];
			$data[posted_by_email] = $_POST['email'];
			$data[content] = $_POST['content'];
			$data[status] = 0;
			$data[created] = time();
			$data[modified] = time();
			
			$info[Testimonial] = $data[content];
			
			
			
			if($this->model->add($data)) {
					global $mail;
					$mail->AddAddress($data[posted_by_email]);
					//$mail->AddBCC(WEBMASTER_EMAIL);
					$mail->AddBCC('calvert@desertislandsvc.com');
					$mail->Subject = "Testimonial Successfully Submitted";
					
					$email_content = array
					(
						"User_Name" => $_POST['name'],
						
						"Top_Content"=>"Your Testimonial Details submitted to us.. After approving your testimonial will display live.<br />",
						
						"Details_Content" => $info,
						
						"Bottom_Content" => "<br />Thanks to contacting us.<br /><br />",
						
						"Sign"	=> "Best Regards,<br /><br />Customer Support<br /><b>Desert Island Services</b><br />P: 480 447 3502<br />E: info@desertislandsvc.com | W: www.desertislandsvc.com<br /><img src='".WEBROOT."common_assets/website_data/images/Logos.jpg'>"
					);
					
					//echo $mail->createHtmlMsg($email_content); return;

					$mail->Body    = $mail->createHtmlMsg($email_content);
					$mail->AltBody = $mail->createPlainMsg($email_content);
					
					$mail->Send();
				
					echo "success";
				
			}
			else
				echo "fail";
		}
		
		public function getDetails() {
			$dbData = $this->model->getAll();
			echo "<pre>"; print_r($dbData); echo "</pre>" ;
		}
		
	}

?>