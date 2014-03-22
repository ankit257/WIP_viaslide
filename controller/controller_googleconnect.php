<?php
    class Controller_Googleconnect extends Emarketz_Controller {
		private $client;
		private $oauth2;
		private $loginurl;
		public function __construct() {
			
			// Include the top level classes, they each include their own dependencies
			require_once 'admin/extension/modules/googleconnect/sdk/service/apiModel.php';
			require_once 'admin/extension/modules/googleconnect/sdk/service/apiService.php';
			require_once 'admin/extension/modules/googleconnect/sdk/service/apiServiceRequest.php';
			require_once 'admin/extension/modules/googleconnect/sdk/auth/apiAuth.php';
			require_once('admin/extension/modules/googleconnect/sdk/contrib/apiOauth2Service.php');
			
			require_once 'admin/extension/modules/googleconnect/sdk/cache/apiCache.php';
			require_once 'admin/extension/modules/googleconnect/sdk/io/apiIO.php';
			require_once('admin/extension/modules/googleconnect/sdk/service/apiMediaFileUpload.php');

			require_once("admin/extension/modules/googleconnect/sdk/config.php");
			require_once("admin/extension/modules/googleconnect/sdk/apiClient.php");
			
			
			
			require_once("admin/extension/modules/googleconnect/config/config_googleconnect.php");
			
			
			
			$this->client = new apiClient();
			$this->client->setApplicationName("Google Account Login");
			$this->oauth2 = new apiOauth2Service($this->client);
			
			$this->callback_url = WEBROOT. "index.php?route=googleconnect/callback";
			$this->config =  $config;
			$this->error = false;
			
			$this->client->setClientId($this->config['oauth2_client_id']);
			$this->client->setClientSecret($this->config['oauth2_client_secret']);
			$this->client->setRedirectUri( $this->callback_url);


//			$apiConfig['oauth_consumer_key'] = $this->config['oauth2_consumer_key'];
//			$apiConfig['oauth_consumer_secret'] = $this->config['oauth2_consumer_secret'];
//			$apiConfig['site_name'] = $this->config['Via Slide'];
//			aPrint($apiConfig);
			$this->loginurl = $this->client->createAuthUrl();
			
			
		}
		
		public function getData() {
			
			return '<a href="'.$this->loginurl. '" target="_blank">'.$this->config['button_image']. '</a>';
				

			
		}

		
		public function logout() {
			session_destroy();	
		}
		

				


		public function callback() {
			
			if (isset($_GET['code'])) 
			{
				$this->client->authenticate();
				$_SESSION['token'] = $this->client->getAccessToken();
				//echo $_SESSION['token'];
				//$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
				//echo filter_var($redirect, FILTER_SANITIZE_URL);
				
				//redirect(filter_var($redirect, FILTER_SANITIZE_URL));
			}
			
			if(isset($_SESSION['token'])) {
				$user = $this->oauth2->userinfo->get();
				$_SESSION['google_data']=$user;
				$this->login($user);
			}
			
			//if (isset($_SESSION['token'])) {
				//$this->client->setAccessToken($_SESSION['token']);
			//}
			
			
			
		}
		
		
		
		public function login($content) {
			
			require_once('model/model_account.php');
			$acctModel = new Model_Account();
			$emailparts = explode("@",$content['email']);
			$username = $emailparts[0]. "_gmail";
			$fullname = $content['name'];
			$first_name = $content['given_name'];
			$last_name = $content['family_name'];
			$email = $content['email'];
			$gender = $content['gender'];
			$temp_pwd  = md5(substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 ));
			$dbResult = $acctModel->isUserExist($email);
			
			
			if(!$dbResult) {
				if(   $acctModel->add( array("user_name"=>$username, "name"=>$fullname, "first_name"=>$first_name, "last_name"=>$last_name, "email"=>$email, "password"=>$temp_pwd, "gender"=>$gender) )    ) {
					$dbResult = NULL;
					$dbResult = $acctModel->login($username,$temp_pwd);
				}
			}

			if($dbResult) {
				$_SESSION['LoggedUser'] = NULL;
				$_SESSION['LoggedUser']= $dbResult;
				redirect(WEBROOT);
			}
		}		
		
	}

?>