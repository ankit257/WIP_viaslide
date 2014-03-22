<?php require_once('config.php'); ?>
<?php require_once('system/base_controller.class.php'); ?>
<?php require_once('system/base_model.class.php'); ?>
<?php require_once('system/base_email.class.php'); ?>
<?php require_once('system/FieldValidation.class.php'); ?>
<?php require_once('system/functions_common.class.php'); ?>




<?php
/*	ob_start();	include_once(THEMEPATH. 'templates/common/template_common_header.php'); $header = ob_get_clean();
	ob_start();	include_once(THEMEPATH. 'templates/common/template_common_banner.php'); $banner = ob_get_clean();
	ob_start();	include_once(THEMEPATH. 'templates/common/template_common_footer.php'); $footer = ob_get_clean();
*/	



	//setting email
	session_start();
	$mail = new PHPMailer();
	$mail->IsMail();
	$mail->From = WEBMASTER_EMAIL;
	$mail->FromName = "Support";
	$mail->Subject = "Unknown";
	$mail->IsHTML(true);

	//echo $_SERVER['REQUEST_URI'].'asdfg----------';

	//$url = explode('viaslide4/beta/', $_SERVER['REQUEST_URI']);
	//$url_parts = explode('/', $url[1]);

	/*if($url_parts[0] == 'slide'){
		echo 'random';
		$parts[0] = 'post';
		$parts[1] = 'single';
	}
	
	echo $parts[0].'-again wtf-'.$parts[1];
*/
	//$parts[0] = 'post';
	//	$parts[1] = 'single';

		
	/*
	$url = $_SERVER['REQUEST_URI'];
	$url_parts = explode('/', $url);

	echo $url_parts[2];
	if($url_parts[5]=='slide'){
	
		//$sql = 'select post_id from tbl_posts where ';
	}
	*/
	//$route = $_SERVER['PHP_SELF'];
	//$route = substr($route, strlen('/index.php'))
	
	if(isset($_GET['route'])) {
		$parts = explode("/",$_GET['route']);
		$parts[0] = isset($parts[0]) ? $parts[0] : 'index' ;
		$parts[1] = isset($parts[1]) ? $parts[1] : 'index' ;
	
		//include_once('view/templates/'. $parts[0].'/'. $parts[1]. '/'. $parts[1]. '_'. $parts[2]. '_tpl.php'); 
	}else {
		$parts[0] = 'index' ;
		$parts[1] = 'index' ;
	}

	
	//echo $parts[0].'and'.$parts[1];
	//echo 'controller/'. $parts[0].'/controller_'. $parts[0]. '_'. $parts[1]. '.php';
	
	include_once('controller/controller_'. $parts[0]. '.php');
	$controllerName = 'Controller_'. ucwords($parts[0]);
	$controllerAction = $parts[1];
	$objController = new $controllerName();
	$objController->$controllerAction();
	
?>
<?php //include_once('view/templates/catalog/category/category_index_tpl.php'); ?>

<?php //include_once('view/templates/catalog/post/post_index_tpl.php'); ?>

<?php //include_once('view/templates/catalog/information/information_index_tpl.php'); ?>

<?php //include_once('view/templates/catalog/information/information_form_tpl.php'); ?>

<?php //include_once('view/templates/account/account_login_tpl.php'); ?>



