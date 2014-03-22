<?php
	class ValidateField {
		/* Validating methods */
		static public function isEmail($email)
		{
			return preg_match('/^[a-z0-9!#$%&\'*+\/=?^`{}|~_-]+[.a-z0-9!#$%&\'*+\/=?^`{}|~_-]*@[a-z0-9]+[._a-z0-9-]*\.[a-z0-9]+$/ui', $email);
		}

		static public function isUserName($username)
		{
			return preg_match("/^[a-z]+[\w.-_]*$/i", $username);
			//return preg_match('/^[a-zA-Z]+[.-_]+[a-zA-Z0-9]+$/D', $username);
		}
		
		static public function isPassword($passwd, $minSize = 5, $maxSize = 32)
		{
			return preg_match('/^[.a-z_0-9-!@#$%\^&*()]{'.$minSize.','. $maxSize. '}$/ui', $passwd);
		}

		static public function isMatchConfirmPassword($passwd, $conpwd)
		{
			return $passwd===$conpwd;
		}
		
		static public function isValidDate($d, $m, $y)
		{
			return checkdate($m, $d, $y);
		}


		static public function isTitle($name)
		{
			return preg_match('/^[^!<>;?=+@#"°{}_$%:]*$/ui', stripslashes($name));
		}
		
		static public function isTitle_HTML($name)
		{
			return preg_match('/^[^;+@#°{}_:]*$/ui', stripslashes($name));
		}
		
		
		static public function isName($name, $minSize = 5, $maxSize = 32)
		{
			return preg_match('/^[a-z][a-z0-9\.,\-_ ]{'.$minSize. ','.$maxSize.'}$/i', stripslashes($name));
			//return preg_match('/^[^0-9!<>,;?=+()@#"°{}_$%:]*$/', stripslashes($name));
		}
		
		
		static public function isDbColName($db_column)
		{
			return preg_match('/^[^0-9!<>,;?=+()@#"°{}_$%:]*$/', stripslashes($db_column));
		}
		
		static public function isRandKey($key)
		{
			return preg_match('/^[^<>;{}!%&$£().-\/]*$/ui', $key);
		}
		
		static public function isMessage($message)
		{
			return preg_match('/^([^<>{}]|<br \/>)*$/ui', $message);
		}
		
		static public function isMessage_HTML($message)
		{
			return preg_match('/^([^{}]|<br \/>)*$/ui', $message);
		}
		
		
		static public function isUnsignedID($id)
		{
			return self::isUnsignedInt($id); 
		}
		
		
		static public function isUnsignedInt($value)
		{
			return (self::isInt($value) AND $value < 4294967296 AND $value >= 0);
		}
		
			
		static public function isInt($value)
		{
			return ((string)(int)$value === (string)$value OR $value === false);
		}
		
		
		static public function isFloat($float)
		{
			return strval(floatval($float)) == strval($float);
		}
		
		static public function isUnsignedFloat($float)
		{
				return strval(floatval($float)) == strval($float) AND $float >= 0;
		}
		
		
		static public function isPhoneNumber($phoneNumber)
		{
			return preg_match('/^[+0-9. ()-]*$/ui', $phoneNumber);
		}
	
		
		static public function isDate($date)
		{
			if (!preg_match('/^([0-9]{4})-((0?[1-9])|(1[0-2]))-((0?[1-9])|([1-2][0-9])|(3[01]))( [0-9]{2}:[0-9]{2}:[0-9]{2})?$/ui', $date, $matches))
				return false;
			return checkdate(intval($matches[2]), intval($matches[5]), intval($matches[0]));
		}
		
		
		static public function isAbsoluteUrl($url)
		{
			if (!empty($url))
				return preg_match('/^https?:\/\/([[:alnum:]]|[:#%&_=\(\)\.\? \+\-@\/\$])+$/ui', $url);
			return true;
		}
		
		
		static public function isUrl($url)
		{
			return preg_match('/^([[:alnum:]]|[:#%&_=\(\)\.\? \+\-@\/])+$/ui', $url);
		}
	
	
		static public function isMd5($md5)
		{
			return preg_match('/^[a-z0-9]{32}$/ui', $md5);
		}
	
		
		static public function isCleanHtml($html)
		{
			$jsEvent = 'onmousedown|onmousemove|onmmouseup|onmouseover|onmouseout|onload|onunload|onfocus|onblur|onchange|onsubmit|ondblclick|onclick|onkeydown|onkeyup|onkeypress|onmouseenter|onmouseleave';
			return (!preg_match('/<[ \t\n]*script/ui', $html) && !preg_match('/<.*('.$jsEvent.')[ \t\n]*=/ui', $html)  && !preg_match('/.*script\:/ui', $html));
		}
		
	
		static public function isPostCode($postcode)
		{
			return preg_match('/^[a-z 0-9-]+$/ui', $postcode);
		}
		
		
		static public function isImage($image)
		{
			$imageData = @getimagesize($image);
    		if($imageData === FALSE || !($imageData[2] == IMAGETYPE_GIF || $imageData[2] == IMAGETYPE_JPEG || $imageData[2] == IMAGETYPE_PNG)) {
				return false;
		    }
			
			return true;
		}
		
		
		static public function isYoutubeVideoLink($url) {
		   	$pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
    		preg_match($pattern, $url, $matches);
    		return (isset($matches[1])) ? $matches[1] : false;
		}
		
		
	}
?>