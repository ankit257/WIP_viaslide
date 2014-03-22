<?php
session_start();

function getCurrentDirectory() {
	$path = DIRNAME($_SERVER['PHP_SELF']);
	$position = STRRPOS($path,'/') + 1;
	$rd = SUBSTR($path,$position);
        return $rd ? $rd. '/' : '';
//	echo $path.'----'.$position.'asd----';
	//echo $rd.'--';
}

$rootDir = getCurrentDirectory();
//echo $rootDir.'===';
//$rootDir = 'beta/';

//Error Settings
ini_set('display_errors', '1');

//Zone Settings
date_default_timezone_set('Asia/Kolkata');

//Website Settings
define('DOMAIN_NAME', $_SERVER['SERVER_NAME']);

define('WEBROOT','http://'. DOMAIN_NAME. '/viaslide6/'. $rootDir);


#define('DOCROOT','/beta/');
define('DOCROOT','/viaslide6/');

define('THEME_NAME', 'default');

//define('THEMEPATH', 'view/themes/'. THEME_NAME. '/');
define('THEMEPATH', '');

define('WEBSITE_TITLE', 'VIA SLIDE');
define('WEBSITE_DATA', 'VIA SLIDE');

define('WEBSITE_LOGO', DOCROOT. 'common_assets/website_data/images/logo.jpg');
define('WEBSITE_FAVICON', DOCROOT. 'common_assets/website_data/images/fav-icon.png');

define('WEBSITE_LANGUAGE', 'english');
//define('WEBSITE_BODYBG', WEBROOT.TEMPLATEPATH. '');


// Mail Settings
define('WEBMASTER_EMAIL','contact@viaslide.com');
define('WEBSITE_NAME','ViaSlide');
define('EMAIL_SIGN','Thanks &amp; Regards,<br />VIA SLIDE TEAM');
define('PAGE_LIMIT',24);
define('ADMIN_PAGE_LIMIT',25);


//Misc Settings
define('CAPTCHA',true);
define('TERMS',false);

//Product Settings
define('SERVICE_TAX','12.50');
define('CURRENCY','INR');

// Database Settings
/*define('TABLE_PREFIX','tbl_');
define('DB_HOST','viaslide.db.11677022.hostedresource.com');
define('DB_USER','viaslide');
define('DB_PWD','Smile@12');
define('DB_NAME','viaslide');
*/
define('TABLE_PREFIX','tbl_');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PWD','asdf');
define('DB_NAME','viaslide');

?>