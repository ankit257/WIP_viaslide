<?php
	class Controller_Twitter extends Emarketz_Controller {
		public function __construct() {
			require_once("admin/extension/modules/twitterconnect/config/config_twitterconnect.php");
			require_once("admin/extension/modules/twitterconnect/sdk/twitterconnect.php");
			$this->callback_url = WEBROOT. "index.php?route=twitter/callback";
			$this->config =  $config;
			$this->error = false;
		}
		
		public function test() {
			echo "hi";
		}
		
		
		public function getData() {
			return '<a target="_blank" href="index.php?route=twitter/login">'.$this->config['link']. '</a>';
		}
		

		private function CreateToken() {


			/* Build TwitterOAuth object with client credentials. */
			$connection = new TwitterOAuth($this->config['consumer_key'], $this->config['consumer_secret']);
			 
			/* Get temporary credentials. */
			$request_token = $connection->getRequestToken($this->callback_url);
			
			/* Save temporary credentials to session. */
			$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
			$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
			
		 
			/* If last connection failed don't display authorization link. */
			switch ($connection->http_code) {
			  case 200:
				/* Build authorize URL and redirect user to Twitter. */
				return $connection->getAuthorizeURL($token);
				break;
			  default:
				return false;
			}	

		}
		
		
		public function login() {

			if ($this->config['consumer_key'] === '' || $this->config['consumer_secret'] === '' ) {
				$this->error = 'You need a consumer key and secret to working. Get one from <a href="https://dev.twitter.com/apps">dev.twitter.com/apps</a>';
			}else {
				if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) 
					|| empty($_SESSION['access_token']['oauth_token_secret'])) {
					$url = $this->CreateToken();
					if($url) {
						redirect($url);
						//echo '<a target="_parent" href="'.$url.'">'.$this->config['link']. '</a>';
					}else {
						$this->error = 'Could not connect to Twitter. Refresh the page or try again later.';
					}
					
				}else {
					$this->SetUserDetails();
				}
			}
			
		}
		
		
		public function logout() {
			session_destroy();	
		}
		

		
		public function callback() {
			/* If the oauth_token is old redirect to the connect page. */
			if (isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
				  $_SESSION['oauth_status'] = 'oldtoken';
			  	  session_destroy();
				  echo '<a href="index.php?route=twitter/login">'.$this->config['link']. '</a>';
				  echo "hi";
				  exit;
			}
			
			/* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
			$connection = new TwitterOAuth($this->config['consumer_key'], $this->config['consumer_secret'], $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
			
			/* Request access tokens from twitter */
			$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
			
			/* Save the access tokens. Normally these would be saved in a database for future use. */
			$_SESSION['access_token'] = $access_token;
			
			/* Remove no longer needed request tokens */
			unset($_SESSION['oauth_token']);
			unset($_SESSION['oauth_token_secret']);
			
			/* If HTTP response is 200 continue otherwise send to connect page to retry */
			if (200 == $connection->http_code) {
			  /* The user has been verified and the access tokens can be saved for future use */
			  $_SESSION['status'] = 'verified';
			  aPrint($this->SetUserDetails());
			} else {
			  /* Save HTTP status for error dialog on connnect page.*/
			  logout();
			  echo '<a href="index.php?route=twitter/login">'.$this->config['link']. '</a>';
			}
	
		}
		
		
		
		public function SetUserDetails() {
			/* Get user access tokens out of the session. */
			$access_token = $_SESSION['access_token'];
			
			/* Create a TwitterOauth object with consumer/user tokens. */
			$connection = new TwitterOAuth($this->config['consumer_key'], $this->config['consumer_secret'], $access_token['oauth_token'], $access_token['oauth_token_secret']);
			
			/* If method is set change API call made. Test is called by default. */
			$content = $connection->get('account/verify_credentials');
			

			require_once('model/model_account.php');
			$acctModel = new Model_Account();
			$username = $content->screen_name. "_twitter";
			$fullname = $content->name;
			$namepart = explode(" ", $fullname);
			$first_name = $namepart[0];
			$last_name = $namepart[1];
			$temp_mail = $content->screen_name. "@twitter.com";
			$temp_pwd  = md5(substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 ));
			$dbResult = $acctModel->isUserExist($username);
			//$dbResult = $acctModel->login($content->screen_name,"");
			if(!$dbResult) {
				if(   $acctModel->add( array("user_name"=>$username, "name"=>$fullname, "first_name"=>$first_name, "last_name"=>$last_name, "email"=>$temp_mail, "password"=>$temp_pwd) )    ) {
					$dbResult = NULL;
					$dbResult = $acctModel->login($username,$temp_pwd);
				}
			}

			if($dbResult) {
				$_SESSION['LoggedUser'] = NULL;
				session_destroy();	
				$_SESSION['LoggedUser']= $dbResult;
				redirect(WEBROOT);
			}
			
			//return $content;
		}
		
		
		
		
		
		
		
	}

?>