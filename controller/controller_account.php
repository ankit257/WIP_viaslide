<?php
	class Controller_Account extends Emarketz_Controller {
		
		public function __construct() {
			//require_once('model/catalog/model_catalog_testimonial.php');
			//$this->model =  new Model_Testimonial();
		}
		
		public function index() {
			
			$heading = "Manage Account";
			include_once(THEMEPATH. 'templates/common/template_common_header.php');
			include_once(THEMEPATH. 'templates/account/template_account_index.php');
			include_once(THEMEPATH. 'templates/common/template_common_footer.php');
			
			
			/*
			$testimonials =  $this->model->getAll();


			include_once(THEMEPATH. 'templates/catalog/testimonial/template_catalog_testimonial_index.php');
			*/
		}
		
		public function register() {
			
			$error = false;
			$success=false;
			if(isset($_POST['info'])) {
				$dbInfo = $_POST['info'];
				$validate = new ValidateField();
				//aPrint($_FILES);
				if(  !empty($_FILES['file']['tmp_name'])    &&   !$validate->isImage($_FILES['file']['tmp_name'])    ) {
					$error['file'] = "Invalid Image";
				}
				if(    !$validate->isName(trim($dbInfo['first_name']), 5, 32)    )   {
					$error['name'] = "Name Should be between 6 to 32 chars";
					$dbInfo['first_name'] = trim($dbInfo['first_name']);
				}
				if(    !$validate->isUserName(trim($dbInfo['user_name']))    )   {
					$error['username'] = "Invalid User Name";
					$dbInfo['user_name'] = trim($dbInfo['user_name']);
				}
				if(    !$validate->isEmail(trim($dbInfo['email']))    )   {
					$error['email'] = "Invalid Email";
					$dbInfo['email'] = trim($dbInfo['email']);
				}
				//if( trim($_POST['dob'][0]) != "" && trim($_POST['dob'][1]) != "" && trim($_POST['dob'][2]) != "" )  {
				//	if(    !$validate->isValidDate(trim($_POST['dob'][0]), trim($_POST['dob'][1]), trim($_POST['dob'][2]))    )   {
				//		$error['date'] = "Invalid Date of Birth";
				//	}
				//}else {
					// $error['date'] = "Date of Birth Required.";
				//}
	
				if(    !$validate->isPassword( $_POST['password'], 6, 32 )    )   {
					$error['password'] = "Password Should be between 6 to 32 chars in length";
				}
				
				if(    !$validate->isMatchConfirmPassword($_POST['password'], $_POST['confirm_password'])    )   {
					$error['confirm_pwd'] = "Password not match with above password";
				}
				

				if(!$error) {
					require_once('model/model_account.php');
					$acctModel = new Model_Account();
					
					if($acctModel->isExist('user_name', $dbInfo['user_name'])) {
						$error['username']="This User Name Already Exist";
					}
					
					if($acctModel->isExist('email', $dbInfo['email'])) {
						$error['email']="This Email Already Exist";
					}
					
					
					if(  !empty($_FILES['file']['tmp_name'])  ) {
						$res =  upload_single_file($_FILES['file'], "images/users");
						if(isset($res['file_name'])) {
							$dbInfo['image'] = DOCROOT.WEBROOT. $res['file_path']."/".$res['file_name'];
						}else {
							$error['file'] =  $res;
						}
					}


					// Add to Database if not error found
					if(!$error) {
						$dbInfo['created'] = time();
						$dbInfo['modified'] = time();
					//	$dbInfo['date_of_birth'] = $_POST['dob'][2]. '-'. $_POST['dob'][1]. '-'. $_POST['dob'][0];
						$dbInfo['password'] = md5($_POST['password']);

						if($acctModel->add($dbInfo)) {
							$createLoginLink = WEBROOT. "index.php?route=account/login";
							$mailData["User_Name"] = $dbInfo['first_name'];
							$mailData["Top_Content"] = "<p>Welcome and thank you for registering at ". WEBSITE_NAME. ".</p><p>Your account has now been created and you can log in by using your email address and password by visiting our website or at the following URL:</p><p>".$createLoginLink. "</p><p>Upon logging in, you will be able to access other services including crate and view your own post and editing your account information.</p>";
							
							$mailData["Sign"] = EMAIL_SIGN;
	;
							global $mail;
							$mail->AddAddress(trim($dbInfo['email']), '');
							$mail->From = WEBMASTER_EMAIL;
							$mail->FromName = "Support";
							$mail->Subject = 'Thank you for registering on '. WEBSITE_NAME;
							$mail->AltBody = $mail->createPlainMsg($mailData);
							$mail->msgHTML( $mail->createHtmlMsg($mailData) );
							
							$mail->Send();
							//aPrint($_POST);
							$dbResult = $acctModel->login($dbInfo['email'], $dbInfo['password']);
							//aPrint($dbResult);exit;
							if($dbResult) {
								$_SESSION['LoggedUser']=NULL;
								$_SESSION['LoggedUser']= $dbResult;
								$dbResult=NULL;
							}
							$success = "Successfully Registered.. Login Now";
							$dbInfo=NULL;
							$_POST=NULL;
						}
					}
					
					 redirect("index.php?route=account/login");
				}
				// redirect("index.php?route=account/login");
				
				
			}
			
			
			$heading = "Register";
			$heading1 = "Sign In";
			
			
			//Twitter Connect Module
			require_once("controller/controller_twitter.php");
			$loadController =  new Controller_Twitter();
			$module['twitter'] = $loadController->getData();
			
			//Facebook Connect Module
			require_once("controller/controller_facebook.php");
			$loadController =  new Controller_Facebook();
			$module['facebook'] = $loadController->getData();
			

			//Gmail Connect Module
			require_once("controller/controller_googleconnect.php");
			$loadController =  new Controller_Googleconnect();
			$module['googleconnect'] = $loadController->getData();
		

			include_once(THEMEPATH. 'templates/common/template_common_header.php');
			include_once(THEMEPATH. 'templates/account/template_account_register.php');
			include_once(THEMEPATH. 'templates/common/template_common_footer.php');
			

		}
		


		public function login_popup() {
			$error=false;

			if(isset($_POST['email'])) {
				$validate = new ValidateField();
				
				if(  trim($_POST['email']) == ""  ) {
					$error['email']="UserName/Email Required";
				}
				
				if(    !$validate->isUserName(trim($_POST['email'])) && !$validate->isEmail(trim($_POST['email']))    )   {
					$error['email'] = "Invalid User Name/Email";
					$_POST['email'] = trim($_POST['email']);
				}
	
				if(    !$validate->isPassword( $_POST['password'], 6, 32 )    )   {
					$error['password'] = "Password Should be between 6 to 32 chars in length";
				}
				

				if(!$error) {
					require_once('model/model_account.php');
					$acctModel = new Model_Account();
					$dbResult = $acctModel->login($_POST['email'], md5($_POST['password']));
					//aPrint($dbResult);
					if($dbResult) {
						if($dbResult['status']==1) {
							$_SESSION['LoggedUser']= $dbResult;
							$success = true;
						}else {
							$error['email'] = "Your Login Details disabled.. contact to administrator.";
						}
						$dbResult=NULL;
					}else {
						$error['email'] = "Inalid UserName/Email or Password";
					}
				} 

			}
			
			$heading = "Sign In";
			
			
			//Twitter Connect Module
			require_once("controller/controller_twitter.php");
			$loadController =  new Controller_Twitter();
			$module['twitter'] = $loadController->getData();
			
			//Facebook Connect Module
			require_once("controller/controller_facebook.php");
			$loadController =  new Controller_Facebook();
			$module['facebook'] = $loadController->getData();
			
			//Gmail Connect Module
			require_once("controller/controller_googleconnect.php");
			$loadController =  new Controller_Googleconnect();
			$module['googleconnect'] = $loadController->getData();
			
			include_once(THEMEPATH. 'templates/account/template_account_login_popup.php');
			
		}
		



		public function signin()
		{
			if(!isLoggedIn()) {  redirect(DOCROOT."login"); return; }	
		}

		public function signinchk()
		{
			if(isLoggedIn()){ 
				$response = 'success';
			}
			else{
				$response = 'failure';
			}	
			$json = json_encode($response);
					echo $json;
			//echo $response;
		}


		public function login() {
			$error=false;


			if(isset($_POST['email'])) {
				$validate = new ValidateField();
				
				if(  trim($_POST['email']) == ""  ) {
					$error['email']="UserName/Email Required";
				}
				
				if(    !$validate->isUserName(trim($_POST['email'])) && !$validate->isEmail(trim($_POST['email']))    )   {
					$error['email'] = "Invalid User Name/Email";
					$_POST['email'] = trim($_POST['email']);
				}
	
				if(    !$validate->isPassword( $_POST['password'], 6, 32 )    )   {
					$error['password'] = "Password Should be between 6 to 32 chars in length";
				}
				

				if(!$error) {
					require_once('model/model_account.php');
					$acctModel = new Model_Account();
					$dbResult = $acctModel->login($_POST['email'], md5($_POST['password']));
					//aPrint($dbResult);
					if($dbResult) {
						if($dbResult['status']==1) {
							$_SESSION['LoggedUser']= $dbResult;
							$rd_url = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : "index.php";
							unset($_SESSION['redirect_url']);

							//
							$data['success'] = 'true';
							//redirect($rd_url);
							return;
						}else {
							$error['email'] = "Your Login Details disabled.. contact to administrator.";
							$data['emailerror'] = $error['email'];
						}
						$dbResult=NULL;
					}else {
						$error['email'] = "Inalid UserName/Email or Password";
						$data['emailerror'] = $error['email'];
					}
				} 

			}

		//$data['read'] = 'lkl';	
		header('Content-type:Application/json');
		//print(json_encode($data));
		//echo $_POST['name'];
		$json = json_encode($data);
		//echo $json;
		print($json);
			// $heading = "Sign In";
			
			
			//Twitter Connect Module
			/*
			require_once("controller/controller_twitter.php");
			$loadController =  new Controller_Twitter();
			$module['twitter'] = $loadController->getData();
			
			//Facebook Connect Module
			require_once("controller/controller_facebook.php");
			$loadController =  new Controller_Facebook();
			$module['facebook'] = $loadController->getData();
			
			//Gmail Connect Module
			require_once("controller/controller_googleconnect.php");
			$loadController =  new Controller_Googleconnect();
			$module['googleconnect'] = $loadController->getData();
			
			include_once(THEMEPATH. 'templates/common/template_common_header.php');
			include_once(THEMEPATH. 'templates/account/template_account_login.php');
			include_once(THEMEPATH. 'templates/common/template_common_footer.php');
			
			*/
		}
		

		
		
		
		public function logout() {
			session_destroy();
			redirect("");
		}
		public function updateuserdetails(){
			if(isLoggedIn()){ 
				$validate = new ValidateField();
				require_once('model/model_account.php');
				$acctModel = new Model_Account();
				$userid = $_SESSION['LoggedUser']['id'];
				$dbInfo = $_POST['info'];
				if($_POST['image'] && $_POST['image']!='undefined'){
					$dbInfo['image'] = $_POST['image'];	
					$image = $dbInfo['image'];
				}
				$firstname = $dbInfo['first_name'];
				//if(    !$validate->isName(trim($dbInfo['first_name']), 5, 32)    )   {
				//	$error['name'] = "Name Should be between 6 to 32 chars";
				//	$dbInfo['first_name'] = trim($dbInfo['first_name']);
				//}	
				if(!$error) {
					// Add to Database if not error found
					if(!$error) {
						$dbInfo['modified'] = time();
						if($acctModel->update($dbInfo, "id=". $_SESSION['LoggedUser']['id'])) {
							$success = "Record Successfully Updated.. Re-Login to take effect.";
							$dbInfo=NULL;
							$_POST=NULL;
						}
					}	
				}

			}
			echo json_encode($success);
		}

		public function signup(){
			$validate = new ValidateField();
			require_once('model/model_account.php');
			$acctModel = new Model_Account();
			$dbInfo['user_name'] = $_POST['inputSignUpUser'];
			$dbInfo['email'] = $_POST['inputSignUpEmail'];
			//$password = $_POST['password'];
			if($acctModel->isExist('user_name', $dbInfo['user_name'])) {
						$error['username']="Username Already in use.";
						$response['error']['username'] = $error['username'];
						//return;
					}
					
			if($acctModel->isExist('email', $dbInfo['email'])) {
						$error['email']="Email already in use.";
						$response['error']['email'] = $error['email'];
					}
					
			if(!$error) {
						$dbInfo['created'] = time();
						$dbInfo['modified'] = time();
					//	$dbInfo['date_of_birth'] = $_POST['dob'][2]. '-'. $_POST['dob'][1]. '-'. $_POST['dob'][0];
						$dbInfo['password'] = md5($_POST['inputSignUpPwd']);

						if($acctModel->add($dbInfo)) {
							$createLoginLink = WEBROOT. "index.php?route=account/login";
							$mailData["User_Name"] = $dbInfo['first_name'];
							$mailData["Top_Content"] = "<p>Welcome and thank you for registering at ". WEBSITE_NAME. ".</p><p>Your account has now been created and you can log in by using your email address and password by visiting our website or at the following URL:</p><p>".$createLoginLink. "</p><p>Upon logging in, you will be able to access other services including crate and view your own post and editing your account information.</p>";
							
							$mailData["Sign"] = EMAIL_SIGN;
	;
							global $mail;
							$mail->AddAddress(trim($dbInfo['email']), '');
							$mail->From = WEBMASTER_EMAIL;
							$mail->FromName = "Support";
							$mail->Subject = 'Thank you for registering on '. WEBSITE_NAME;
							$mail->AltBody = $mail->createPlainMsg($mailData);
							$mail->msgHTML( $mail->createHtmlMsg($mailData) );
							
							//$mail->Send();
							//aPrint($_POST);
							$dbResult = $acctModel->login($dbInfo['email'], $dbInfo['password']);
							//aPrint($dbResult);exit;
							if($dbResult) {
								$_SESSION['LoggedUser']=NULL;
								$_SESSION['LoggedUser']= $dbResult;
								$dbResult=NULL;
							}
							$success = "Successfully Registered.. Login Now";
							$response['success'] = 'success';
							$dbInfo=NULL;
							$_POST=NULL;
						}
					}
					//$response = 'asd';
					$json = json_encode($response);
					echo $json;
		}

		public function loginchk(){

					$_POST['email'] = $_POST['inputSigninEmail'];
					$_POST['password'] = $_POST['inputSigninPwd'];
					
					//$asd = $_POST['e'];
					//$a = json_decode($asd);
					$validate = new ValidateField();
					require_once('model/model_account.php');
					$asd = $_POST['email'];
					if(!$validate->isUserName(trim($_POST['email'])) && !$validate->isEmail(trim($_POST['email'])))   {
					$response['error'] = 'Invalid Username/Email';
					$error['email'] = "Invalid User Name/Email";
					$_POST['email'] = trim($_POST['email']);
					
					//return;
					}
					$acctModel = new Model_Account();
					$dbResult = $acctModel->login($_POST['email'], md5($_POST['password']));
					//$response['error'] = $dbResult;
					if(!$response){
					//aPrint($dbResult);
					if($dbResult) {
						if($dbResult['status']==1) {
							$_SESSION['LoggedUser']= $dbResult;
							//$rd_url = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : "index.php";
							//unset($_SESSION['redirect_url']);
							$data['success'] = 'true';
							$response['success'] = 'success';

						}else {
							$error['email'] = "Your Login Details disabled.. contact to administrator.";
							$data['emailerror'] = $error['email'];
							$response['error'] = 'error1';
						}
						$dbResult=NULL;
					}else {
						$error['email'] = "Inalid UserName/Email or Password";
						//$data['emailerror'] = $error['email'];
						$response['error'] = $error['email'];
					}
				}
				//$response['email'] = $_POST['e'];
					echo json_encode($response);
		}
		


		public function forgotpwd() {
			$error = false; $success=false;
			
			if(isset($_POST['email'])) {
				$validate = new ValidateField();
			
				if(  empty($_POST['email']) ||  !$validate->isEmail( $_POST['email'] )    )   {
					$error['email'] = "Invalid Email";
				}
				
				
				if(!$error) {
					require_once('model/model_account.php');
					$acctModel = new Model_Account();
					$dbResult = $acctModel->forgot_pwd($_POST['email']);
					//aPrint($dbResult);
					if($dbResult) {
						$token = md5(substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 ));
						$createForgotLink = WEBROOT. "index.php?route=account/changepwd&token=". $token;
						if($acctModel->update(array("reset_pwd_token"=>$token), "email='".clean($_POST['email'])."'")) {
						
							$mailData["User_Name"] = "Member";
							$mailData["Top_Content"] = "<p>A request to reset password was received from your ". WEBSITE_NAME. " Account from the IP - ". $_SERVER['REMOTE_ADDR']. ".</p><p>Use the link below to reset your password and login.</p><p><b>Note:</b> This link is valid for changing your password only once.</p><p>".$createForgotLink. "</p><p>If you have not initiated this request, please ignore this email and continue using your current password to log in.</p>";
							
							$mailData["Sign"] = EMAIL_SIGN;
	;
							global $mail;
							$mail->AddAddress($_POST['email'], '');
							$mail->Subject = 'Reset Password on '. WEBSITE_NAME;
							$mail->AltBody = $mail->createPlainMsg($mailData);
							$mail->msgHTML( $mail->createHtmlMsg($mailData) );
							
							if($mail->Send()) {
								$success = "Please Check Your Email for reseting pwd.";
							}else {
								$warning = "Error occur in Sending Email";
							}

						}else {
							$warning = "Token could not create. Try Again Later.";
						}
						
						
					}else {
						$warning = "Please Correct Your Email";
					}
				}

			}
			$response['success'] = $success;
			$response['warning'] = $warning;
			
			echo json_encode($response);
			//$heading = "Forgot Password";
			//include_once(THEMEPATH. 'templates/account/template_account_forgotpwd.php');
		}
		
		
		public function changepwd() {
			if(!isLoggedIn()) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; redirect("index.php?route=account/login"); return; }
			
			$resetToken = isset($_GET['token']) ? clean($_GET['token']) : NULL;
			
			if( !isLoggedIn() && !$resetToken ) {
				echo "Need Login to Use this Functionality";
				return;
			}
			
			$error = false; $success=false;
			
			if(isset($_POST['new_password'])) {
				$validate = new ValidateField();
			
				if(    !$validate->isPassword( $_POST['new_password'], 6, 32 )    )   {
					$error['new_password'] = "Password Should be between 6 to 32 chars in length";
				}
				
				if(    !$validate->isMatchConfirmPassword($_POST['new_password'], $_POST['con_password'])    )   {
					$error['confirm_pwd'] = "Password not match with above password";
				}
				
				if(!$error) {
					require_once('model/model_account.php');
					$acctModel = new Model_Account();
					$dbResult=false;
					
					if($resetToken) {
						$dbResult = $acctModel->change_pwd_token(md5($_POST['new_password']), $resetToken);
					}elseif(isLoggedIn()) {
						$dbResult = $acctModel->change_pwd(md5($_POST['new_password']), $_SESSION['LoggedUser']['id']);
					}
					
					if($dbResult) {
						$success = "Password Changed Successfully... Login with your New Password..";
					}else {
						$error['DB'] = "Password can not be changed";
					}
				}

			}
			
			$heading = "Change Password";
			include_once(THEMEPATH. 'templates/common/template_common_header.php');
			include_once(THEMEPATH. 'templates/account/template_account_changepwd.php');
			include_once(THEMEPATH. 'templates/common/template_common_footer.php');
		}
		
		
		
		public function editprofile() {
			if(!isLoggedIn()) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; redirect("index.php?route=account/login"); return; }

			$error = false; $success=false;
			
			if(isset($_POST['info'])) {

				$dbInfo = $_POST['info'];
				$validate = new ValidateField();
				
				//aPrint($_FILES);
				
				if(  !empty($_FILES['file']['tmp_name'])    &&   !$validate->isImage($_FILES['file']['tmp_name'])    ) {
					$error['file'] = "Invalid Image";
				}
				
				if(    !$validate->isName(trim($dbInfo['first_name']), 5, 32)    )   {
					$error['name'] = "Name Should be between 6 to 32 chars";
					$dbInfo['first_name'] = trim($dbInfo['first_name']);
				}
	
				if( trim($_POST['dob'][0]) != "" && trim($_POST['dob'][1]) != "" && trim($_POST['dob'][2]) != "" )  {
					if(    !$validate->isValidDate(trim($_POST['dob'][0]), trim($_POST['dob'][1]), trim($_POST['dob'][2]))    )   {
				//		$error['date'] = "Invalid Date of Birth";
					}
				}else {
				//	$error['date'] = "Date of Birth Required.";
				}
	

				if(!$error) {
					require_once('model/model_account.php');
					$acctModel = new Model_Account();
					
					if(  !empty($_FILES['file']['tmp_name'])  ) {
						$res =  upload_single_file($_FILES['file'], "images/users");
						if(isset($res['file_name'])) {
							$dbInfo['image'] = WEBROOT. $res['file_path']."/".$res['file_name'];
						}else {
							$error['file'] =  $res;
						}
					}


					// Add to Database if not error found
					if(!$error) {
						$dbInfo['modified'] = time();
						$dbInfo['date_of_birth'] = $_POST['dob'][2]. '-'. $_POST['dob'][1]. '-'. $_POST['dob'][0];

						if($acctModel->update($dbInfo, "id=". $_SESSION['LoggedUser']['id'])) {
							$success = "Record Successfully Updated.. Re-Login to take effect.";
							$dbInfo=NULL;
							$_POST=NULL;
						}
					}
					
					
				}


			//

			
			}
			
			require_once('model/model_account.php');
			$acctModel = new Model_Account();
			$dbInfo = $acctModel->getRecord($_SESSION['LoggedUser']['id']);
			if($dbInfo) {
				$dob = explode("-",$dbInfo['date_of_birth']);
				$_POST['dob'][0] = $dob[2];
				$_POST['dob'][1] = $dob[1];
				$_POST['dob'][2] = $dob[0];
			}
			//aPrint($dbInfo);
			
			$heading = "Edit Profile";
			include_once(THEMEPATH. 'templates/common/template_common_header.php');
			include_once(THEMEPATH. 'templates/account/template_account_editprofile.php');
			include_once(THEMEPATH. 'templates/common/template_common_footer.php');
			
		}
		
		
		
		
		
		
		public function myposts() {
			
			if(!isLoggedIn()) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; redirect("index.php?route=account/login"); return; }
			
			
			require_once('model/model_post.php');
			$postModel = new Model_Post();
			$postdata = $postModel->getAllPosts($_SESSION['LoggedUser']['id']);
			
			$postdata = $postdata ? $postdata : NULL ;
			
			//if($postdata)
				//aPrint($postdata);
			
			include_once(THEMEPATH. 'templates/common/template_common_header.php');
			include_once(THEMEPATH. 'templates/account/template_account_viewposts.php');
			include_once(THEMEPATH. 'templates/common/template_common_footer.php');
			
			//redirect("index.php");
		}




		public function addslideshow(){
			require_once('model/model_post.php');
			$postModel = new Model_Post();
			echo "string";
			if($_POST['myDoc']){
				$asd = json_decode($_POST['myDoc']);
				//echo $asd[0];
				//$as = json_decode($asd);
				$image['post_id'] = $_SESSION['postid'];
				$count = count($asd);
				//echo $asd[0];
				
				for ($i=0; $i < $count; $i++) {
					if ($i==0) {
				 		$hp['content'] = $asd[$i];
				 		$hp['post_id'] = $_SESSION['postid'];
						$hpid = $postModel->updateSlide($hp);
				 	} 
					$image['content'] = $asd[$i];
					//$image['content'] = 'asd';
					$imageid = $postModel->addSlide($image);
				}
			}
			$_SESSION['postid'] = NULL;
			echo $imageid;
		}

		public function updateslideshow(){
			require_once('model/model_post.php');
			$postModel = new Model_Post();
			if($_POST['myDoc']){
				$type = $_POST['type'];
				if($type == 'save'){
					$status = 0;
				}
				if($type == 'publish'){
					$status = 1;
				}
				//$image['post_id'] = $_SESSION['postid'];
				$hp['content'] = $_POST['myDoc'];
				$data = $_POST['img'];
				//$hp['image']= $data;
				$hp['status'] = $status;
				list($type, $data) = explode(';', $data);
				list(, $data)      = explode(',', $data);
				$data = base64_decode($data);
				$newfilename = $_SESSION['postid']."_thumb.jpg";
				$addr = 'data/slides/'.$_SESSION['postid'].'/'.$newfilename;
				file_put_contents($addr, $data);
				$addr2 = 'data/slides/'.$_SESSION['postid'].'/2'.$newfilename;
				//$im =  imagecreatetruecolor($addr);
				//imagejpeg($im,$addr2,75);
				//make_thumbnail($src, $dest, $quality);
				//destroy()
				make_thumb($addr, $addr, 400);
				$hp['image'] = $addr;
				$hp['post_id'] = $_SESSION['postid'];
				$hpid = $postModel->updateSlide($hp);	
			}
			echo $hpid;
		}
		
		public function slides(){
				$postid= isset($_GET['slide_id']) ? $_GET['slide_id'] : '0';
				//if(!isLoggedIn()) { $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; redirect("index.php"); return; }
				if(!isLoggedIn()) {// $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; 
				redirect(DOCROOT."slide/".$postid."/"); return; }
				require_once('model/common/model_common_category.php');
				$catModel = new category_Model();
				$catList = $catModel->get();
				require_once('model/model_post.php');
				$postModel = new Model_Post();
				if($_POST['info']){
							$validate = new ValidateField();
							$dbInfo['main'] = $_POST['info'];
							if(  isset($_POST['categories'])  &&   isset($_POST['subcategories'])   ) {
								$dbInfo['categories'] = array_merge($_POST['categories'], $_POST['subcategories']);
							}elseif ( isset($_POST['categories']) ) {
								$dbInfo['categories'] = $_POST['categories'];
							}
							$dbInfo['tags'] = isset($_POST['tags']) && !empty($_POST['tags']) ? $_POST['tags'] : NULL;

							$dbInfo['tags'] = isset($_POST['tags']) && !empty($_POST['tags']) ? array_map('mysql_real_escape_string', array_map('trim', explode(',', $_POST['tags']))) : NULL;
							$dbInfo['main']['submit_by'] = $_SESSION['LoggedUser']['id'];
							$dbInfo['main']['type'] = 'slideshow';

							$postid = $postModel->startupload($dbInfo);

							if( $postid > 0) {
								//$postid = $_SESSION['postid'];
								$output_dir = "data/slides/";
								$dir = $output_dir.$postid;
								if(!is_dir($dir)){
									mkdir($dir);
								}
								//else{
								//	mkdir($dir);
								//}
								//echo $postid;
								//$_SESSION['postid'] = $postid;
								redirect(DOCROOT."edit/".$postid.'/');
							}
						}
				else if($_GET['slide_id']){
						$postid = $_GET['slide_id'];
						
						$postdata = $postModel->getRecord($postid);
						//echo $postdata;
						if($postdata[0]['submit_by'] == $_SESSION['LoggedUser']['id']){
							$_SESSION['postid'] = $postid;
							include_once(THEMEPATH. 'templates/common/template_common_header.php');
							include_once(THEMEPATH. 'templates/account/template_account_addpost4.php');
							include_once(THEMEPATH. 'templates/common/template_common_footer.php');	
						}
						else{
							redirect(DOCROOT.'slide/'.$postid.'/');
						}
					}
				else{
						include_once(THEMEPATH. 'templates/common/template_common_header.php');
						include_once(THEMEPATH. 'templates/account/template_account_addpost2.php');
						include_once(THEMEPATH. 'templates/common/template_common_footer.php');
					}
		}

		public function startupload(){
			require_once('model/common/model_common_category.php');
			$catModel = new category_Model();
			$catList = $catModel->get();
			require_once('model/model_post.php');
			$postModel = new Model_Post();
			$imgaddr = NULL;
			if(isset($_FILES["myfile"])){
				$output_dir = "alt/";	
				//Filter the file types , if you want.
				if ($_FILES["myfile"]["error"] > 0){
	  				echo "Error: " . $_FILES["file"]["error"] . "<br>";
				}
				else{
				$a = explode(".", $_FILES["myfile"]["name"]);
				$ext = end($a);
				$imgext = array("jpg","jpeg","png","bmp");
				if(in_array($ext, $imgext)){
					$newfilename = time().rand().".".$ext;
					//move the uploaded file to uploads folder;
    				move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $newfilename);
   	 				//echo $newfilename;
   	 				$imgaddr =  $newfilename;
   	 				if($_SESSION['slideno'] == 1){
   	 					$asd['image'] = $imgaddr;
   	 					$asd['id'] = $_SESSION['postid'];
   	 				$we = 	$postModel->selectCover($asd);
   	 				echo $we;	
   	 					//parent::ChangeTable('posts');
						//$last_insert_id = parent::update(array("image"=>$newfilename), "id=". $_SESSION['postid']);
   	 				}
				}
				else $exterror = 'Not a valid image file';
				}
				//echo $imgaddr;
				include_once(THEMEPATH. 'templates/common/template_common_header.php');
				include_once(THEMEPATH. 'templates/account/template_account_addpost.php');
				include_once(THEMEPATH. 'templates/common/template_common_footer.php');
			}
			else{
					if(!$_POST['info'] && !$_SESSION['postid']){
						require_once('model/common/model_common_category.php');
						$catModel = new category_Model();
						$catList = $catModel->get();
						include_once(THEMEPATH. 'templates/common/template_common_header.php');
						include_once(THEMEPATH. 'templates/account/template_account_addpost2.php');
						include_once(THEMEPATH. 'templates/common/template_common_footer.php');
					}
					else{
						if(!$_SESSION['slideno']){
							$_SESSION['slideno'] = 1;
						}
						else{
								$_SESSION['slideno'] = $_SESSION['slideno']+1;	
							}
						$slideNo = $_SESSION['slideno'];
						if($_POST['info'] || $_SESSION['postid']){
							$validate = new ValidateField();
							$dbInfo['main'] = $_POST['info'];
							if(  isset($_POST['categories'])  &&   isset($_POST['subcategories'])   ) {
								$dbInfo['categories'] = array_merge($_POST['categories'], $_POST['subcategories']);
							}elseif ( isset($_POST['categories']) ) {
								$dbInfo['categories'] = $_POST['categories'];
							}
							$dbInfo['tags'] = isset($_POST['tags']) && !empty($_POST['tags']) ? $_POST['tags'] : NULL;
							$postid = $postModel->startupload($dbInfo);
							if( $postid > 0) {
								$_SESSION['postid'] = $postid;
								echo $postid;
							}
							include_once(THEMEPATH. 'templates/common/template_common_header.php');
							include_once(THEMEPATH. 'templates/account/template_account_addpost.php');
							include_once(THEMEPATH. 'templates/common/template_common_footer.php');
						}
					}
				}
			
			if($_POST['finish']){
				$imageid = $postModel->lastSlide($_SESSION['postid']);
				$image['post_id'] = $_SESSION['postid'];
				$image['content'] = $_POST['myDoc'];

				$imageid = $postModel->addSlide($image);
				

				echo $imageid;
				$_SESSION['postid'] = NULL;
				$_SESSION['slideno'] = NULL;
			}
			elseif ($_POST['next']){
				if($_POST['myDoc']){
				$image['post_id'] = $_SESSION['postid'];
				$image['content'] = $_POST['myDoc'];

				$imageid = $postModel->addSlide($image);
				echo $_POST['myDoc'];
				# code...
			}
			}
			
		}

		public function getDetails() {
			$dbData = $this->model->getAll();
			echo "<pre>"; print_r($dbData); echo "</pre>" ;
		}

		public function addimage(){
			//$output_dir = "alt/";
			if(isset($_FILES["myfile"])){
				$postid = $_SESSION['postid'];
				$output_dir = "data/slides/";
				$dir = $output_dir.$postid;
				if(is_dir($dir)){
					}
				else{
					mkdir($dir);
				}
				//Filter the file types , if you want.
				if ($_FILES["myfile"]["error"] > 0){
	  				echo "Error: " . $_FILES["file"]["error"] . "<br>";
				}
				else{
				$a = explode(".", $_FILES["myfile"]["name"]);
				$ext = end($a);
				$newfilename = time().rand().".".$ext;
				//move the uploaded file to uploads folder;
				$sx = $dir.'/'.$newfilename;
    			move_uploaded_file($_FILES["myfile"]["tmp_name"], $sx);
    			//compress_image($sx, $sx, 900);
    			make_thumb($sx, $sx);
   	 			//echo $newfilename;
   	 			//echo '<img class="img-responsive" src="/viaslide5/alt/'.$newfilename.'"></img>';
   	 			echo '-'.$sx.'-';
				//echo $dir;
				}
			}
		}
		public function deletefile(){
			if($_POST['file']){
				$file = 'data/slides/'.$_SESSION['postid'].'/'.$_POST['file'];	
			}
			
			//$filex = 
			$a = unlink($file);
			if($a){
				$response = 'true';
			}
			else{
				$response = 'false';	
			}
			echo json_encode($response);
		}

		public function adduserimage(){
			if(isset($_FILES["myfile"])){
				//$output_dir = "alt/";
				require_once('model/model_account.php');
				$acctModel = new Model_Account();
				$output_dir = "data/user/";
				$user_dir = $output_dir.$_SESSION['LoggedUser']['id'];
				if(is_dir($user_dir)){

				}
				else{
					mkdir($user_dir);
				}
				$a = explode(".", $_FILES["myfile"]["name"]);
				$ext = end($a);
				$filex = $user_dir.'/thumb100.'.$ext;
				if(file_exists($filex)){
					unlink($filex);
				}
				//Filter the file types , if you want.
				if ($_FILES["myfile"]["error"] > 0){
	  				echo "Error: " . $_FILES["file"]["error"] . "<br>";
				}
				else{
				$newfilename = time().rand().".".$ext;
				//move the uploaded file to uploads folder;
    			move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir.$newfilename);
    			make_thumb($output_dir.$newfilename, $filex, 100);
   	 			$userid = $_SESSION['LoggedUser']['id'];
				$dbInfo['image'] = $output_dir. $newfilename;
				if(!$error) {
					// Add to Database if not error found
					if(!$error) {
						$dbInfo['modified'] = time();
						if($acctModel->update($dbInfo, "id=". $_SESSION['LoggedUser']['id'])) {
							$success = "Record Successfully Updated.. Re-Login to take effect.";
							$dbInfo=NULL;
							$_POST=NULL;
						}
					}	
				}
   	 			echo '-'.$newfilename.'-';
				}
			}
		}
		public function asd(){
			require_once('model/model_post.php');
			$postModel = new Model_Post;
			require_once('model/model_account.php');
			$acctModel = new Model_Account();
			if(!isLoggedIn()){
				redirect('/');
			}
			else{
				$status = $_SESSION['LoggedUser']['status'];
				$page = $_GET['page'];
				if(!$page){
					$page = 0;
				}
				echo $page;
				$TopViewsPosts = $postModel->getHomePageLatestPosts($page, $limit);
				$totalRecords = $postModel->getListAllTotalRecords();
				$pageLimit = PAGE_LIMIT;
				$recordFrom = (($page-1) * $pageLimit) + 1 ;
				$recordTo = $recordFrom + count($postList) - 1;
				$totalPages = ceil($totalRecords/$pageLimit);
				$pagination = pagination('asd', $totalRecords, $page, $pageLimit, $adjacents=3, $recordFrom, $recordTo);
				include_once(THEMEPATH. 'templates/common/template_common_header.php');
				include_once(THEMEPATH. 'templates/admin/template_index_admin.php');
				include_once(THEMEPATH. 'templates/common/template_common_footer.php');
			}
		}
		public function editslide(){
			require_once('model/model_post.php');
			$postModel = new Model_Post;
			require_once('model/model_account.php');
			$acctModel = new Model_Account();
			if(!isLoggedIn()){
				redirect('/');
			}
			else{
				$postid = $_GET['slide_id'];
				if( $postid >0 ) {
					$_SESSION['postid'] = $postid;
					$output_dir = "data/slides/";
					$dir = $output_dir.$postid;
					if(is_dir($dir)){
					}
					else{
						mkdir($dir);
					}
				
					//echo "string";
				require_once('model/model_post.php');
				$postModel = new Model_Post();
				$postdata['main'] = $postModel->getRecord($postid);
				//echo $postdata['main'];
				if(isset($postdata['main'][0])) {
					$postdata['main'] = $postdata['main'][0];
					if($postdata['main']['type'] == 'image'){
						$postdata['images'] = $postModel->getImages($postid);
					}
					//$postdata['images'] = $postModel->getImages($postid);
					//$postModel->setViews($postid, $postdata['main']['total_views']+1);
					//$postdata['tags'] = $postModel->getTags($postid);
					//$postdata['videos'] = $postModel->getVideos($postid);
					
						
					}
				}	
              	include_once(THEMEPATH. 'templates/common/template_common_header.php');
				include_once(THEMEPATH. 'templates/admin/template_account_addpost_admin.php');
				include_once(THEMEPATH. 'templates/common/template_common_footer.php');
			}
		}
		
		public function uploadimage(){
			$ds  = DIRECTORY_SEPARATOR;  //1
			$storeFolder = 'alt';   //2
			if (!empty($_FILES)) {
    			$tempFile = $_FILES['file']['tmp_name'];          //3             
    			$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    			$targetFile =  $targetPath. $_FILES['file']['name'];  //5
    			move_uploaded_file($tempFile,$targetFile); //6
			}
			//echo $storeFolder;
		}

		public function feedback() {	
			$error = false;
			$success=false;
			if(isset($_POST['info'])) {

				$dbInfo = $_POST['info'];
				$validate = new ValidateField();
				
				/*if(    !$validate->isName(trim($dbInfo['first_name']), 5, 32)    )   {
					$error['name'] = "Name Should be between 6 to 32 chars";
					$dbInfo['first_name'] = trim($dbInfo['first_name']);
				}
                if(    !$validate->isEmail(trim($dbInfo['email']))    )   {
					$error['email'] = "Invalid Email";
					$dbInfo['email'] = trim($dbInfo['email']);
				}
                if(    !$validate->isName(trim($dbInfo['feedback']), 5, 32)    )   {
    				$error['name'] = "Feedback Should be between 6 to 32 chars";
					$dbInfo['feedback'] = trim($dbInfo['feedback']);
				}
				*/
                if(!$error) {
                    
							$mailData["User_Name"] = $dbInfo['first_name'];
                            $mailData["email"] = $dbInfo['email'];
							//$mailData["Top_Content"] = "<p>Welcome and thank you for registering at ". WEBSITE_NAME. ".</p><p>Your account has now been created and you can log in by using your email address and password by visiting our website or at the following URL:</p><p>".$createLoginLink. "</p><p>Upon logging in, you will be able to access other services including crate and view your own post and editing your account information.</p>";
							$mailData["Top_Content"] = "<p>".$dbInfo['feedback']."</p>";
							$mailData["Sign"] = EMAIL_SIGN;
            
							global $mail;
							//$mail->AddAddress(trim($dbInfo['email']), '');
                            $mail->AddAddress('contact@viaslide.com');
							$mail->From = $mailData["email"];
							$mail->FromName = $mailData["User_Name"];
							$mail->Subject = 'Feedback';
							$mail->AltBody = $mail->createPlainMsg($mailData);
							$mail->msgHTML( $mail->createHtmlMsg($mailData) );
							$mail->Send();
							$success = "Thanx for providing your feedback";
							$dbInfo=NULL;
							$_POST=NULL;
							$result['success'] = 'OK';
							$result['failure'] = 'NOT OK';
							header('Content-type:Application/json');
							print(json_encode($result));
							//redirect('/');
				}
               
			}
			
			
			$heading = "Please, Let us know your experience";
			include_once(THEMEPATH. 'templates/account/template_account_feedback.php');
			}
		
	}

?>