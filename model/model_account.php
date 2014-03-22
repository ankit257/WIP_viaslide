<?php

	class Model_Account extends Emkt_Model {
	
			public function __construct() {
				parent::__construct('users');
			}
			
			public function add($data) {
				return parent::add($data);
			}
			
			public function getAll() {
				return $this->fetch_all("*","1 order by sort_order, id");
			}
			
			public function isExist($fieldname, $value) {
				return parent::fetch_singleField($fieldname,$fieldname. " = '". $value. "'");
			}
			
			public function getUserName($id) {
				return parent::fetch_singleField("user_name", "id = '". $id. "'");
			}
			
			public function isUserExist($value) {
				$value = mysql_real_escape_string(stripslashes($value));
				$dbResult = parent::query("SELECT * FROM ". TABLE_PREFIX. "users WHERE user_name='$value' OR email='$value'");
				if($dbResult)
					return $dbResult[0];

				return false;
					
			}

			
			public function login($f1, $f2) {
				return parent::fetch_single("*", "(user_name='$f1' OR email='$f1') AND password='$f2'");
			}


			public function getRecord($id) {
				return parent::fetch_single("*", "id='$id'");
			}

			
			public function change_pwd($newpwd, $userid) {
				return parent::update(array("password"=>$newpwd), "id=". $userid);
			}
			
			public function change_pwd_token($newpwd, $token) {
				
				if(parent::update(array("password"=>$newpwd), "reset_pwd_token='$token'")) {
					return parent::update(array("reset_pwd_token"=>"DEFAULT_RESET_PWD_TOKEN"), "reset_pwd_token='$token'");
				}
				
				return false;
			}
			
			public function forgot_pwd($email) {
				return parent::fetch_singleField("email", "email='$email'");
			}
			
			
			public function fblogin($data) {
				$dbData = parent::fetch_single("*", "email='". $data['email']. "'");
				
				if(!$dbData) {
					$InsertData['email'] = $data['email'];
					$InsertData['name'] = $data['name'];
					$InsertData['first_name'] = $data['first_name'];
					$InsertData['last_name'] = $data['last_name'];
					$InsertData['user_name'] = $data['email'];
					$InsertData['gender'] = $data['gender'];
					$InsertData['password'] = md5(substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 ));
					
					if(parent::add($InsertData)) {
						$dbData = parent::fetch_single("*", "email='". $data['email']. "'");
					}
				}
				
				return $dbData;
				
			}
			
		
	}

?>