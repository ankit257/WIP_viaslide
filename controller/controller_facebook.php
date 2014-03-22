<?php
	class Controller_Facebook extends Emarketz_Controller {
		public function __construct() {
			require_once("admin/extension/modules/fbconnect/config/config_fbconnect.php");
			require_once("admin/extension/modules/fbconnect/sdk/facebook.php");
			$this->callback_url = WEBROOT. "index.php?route=facebook/callback";
			$this->config =  $config;
			$this->error = false;
		}
		
		public function getData() {
			$this->fbconnect = new Facebook(array(
					'appId'  => $this->config['api_key'],
					'secret' => $this->config['api_secret'],
			));
			
			$loginUrl = $this->fbconnect->getLoginUrl(array('scope' => 'email,user_location', 'redirect_uri'=>$this->callback_url));
			return '<a href="'. $loginUrl. '" target="_blank">'.$this->config['button_image']. '</a>';
				
		$fbuser = $this->fbconnect->getUser();
	/*    		$fbuser_profile = NULL;
			if ($fbuser){
				try {
					$fbuser_profile = $this->fbconnect->api("/$fbuser");
				} catch (FacebookApiException $e) {
					error_log($e);
					$fbuser = NULL;
				}
			}
			
			
			if ($fbuser) {
				//$this->fbconnect->destroySession();
				//$fbLoginUrl = $this->fbconnect->getLogoutUrl(array('next'=> WEBROOT. 'index.php?route=account/logout'));
					
				if($fbuser_profile['id'] && $fbuser_profile['email'] && $fbuser_profile['verified']){
						require_once('model/model_account.php');
						$acctModel = new Model_Account();
						$dbResult = $acctModel->fblogin($fbuser_profile);
					
						$_SESSION['LoggedUser']= $dbResult;
						$success = true;
						//aPrint($fbuser_profile);
				}
			} else {
					$loginUrl = $this->fbconnect->getLoginUrl(array('scope' => 'email,user_location', 'redirect_uri'=>$this->callback_url));
					return '<a href="'. $loginUrl. '" target="_blank">'.$this->config['button_image']. '</a>';
			}
*/			
			
		}

		

		public function logout() {
			session_destroy();	
		}
		

		
		public function callback() {
			$this->fbconnect = new Facebook(array(
					'appId'  => $this->config['api_key'],
					'secret' => $this->config['api_secret'],
			));
			$fbuser = $this->fbconnect->getUser();
			$fbuser_profile = NULL;
			if ($fbuser){
				try {
					$fbuser_profile = $this->fbconnect->api("/$fbuser");
				} catch (FacebookApiException $e) {
					error_log($e);
					$fbuser = NULL;
				}
                 echo 'success'.$fbuser_profile['id'];
			}
           
			
			
			if ($fbuser) {
				//$this->fbconnect->destroySession();
				//$fbLoginUrl = $this->fbconnect->getLogoutUrl(array('next'=> WEBROOT. 'index.php?route=account/logout'));
					
				if($fbuser_profile['id'] && $fbuser_profile['email'] && $fbuser_profile['verified']){
					$this->login($fbuser_profile);
				}
			} else {
					$loginUrl = $this->fbconnect->getLoginUrl(array('scope' => 'email,user_location', 'redirect_uri'=>$this->callback_url));
					echo '<a href="'. $loginUrl. '" target="_blank">'.$this->config['button_image']. '</a>';
			}

		}
		
		
		
		public function login($content) {
			
			/*
			
			require_once('model/model_account.php');
			$acctModel = new Model_Account();
			$dbResult = $acctModel->fblogin($fbuser_profile);
					
			$_SESSION['LoggedUser']= $dbResult;
			$success = true;
			*/
			// echo $content['email'];
			require_once('model/model_account.php');
			$acctModel = new Model_Account();
			$username = $content['username']. "_fb";
			$fullname = $content['name'];
			$first_name = $content['first_name'];
			$last_name = $content['last_name'];
			$email = $content['email'];
			$gender = $content['gender'];
            $image =  'http://graph.facebook.com/'.$content['username'].'/picture';
            echo file_get_contents($image);
			$temp_pwd  = md5(substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 ));
			//$dbResult = $acctModel->isUserExist($email);
            $dbResult = $acctModel->isUserExist($username);
			if(!$dbResult) {
				if(   $acctModel->add( array("user_name"=>$username, "name"=>$fullname, "first_name"=>$first_name, "last_name"=>$last_name, "email"=>$email, "password"=>$temp_pwd, "gender"=>$gender) )    ) {
					$dbResult = NULL;
					$dbResult = $acctModel->login($username,$temp_pwd);
                    redirect(WEBROOT);
				}
			}

			if($dbResult) {
               // echo 'LOLMAX';
				$_SESSION['LoggedUser'] = NULL;
				session_destroy();
                session_start();
                //session_set_cookie_params (0,"/", ".facebook.com"); 
                $_SESSION['LoggedUser']= $dbResult;
                echo $_SESSION['LoggedUser']['name'];
				redirect(WEBROOT);
			}
		}		
		
	}

?>