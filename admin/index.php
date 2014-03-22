<?php require_once('../config.php'); ?>
<?php require_once('system/base_model.class.php'); ?>




<?php
	ob_start();	include_once('view/templates/common/template_common_header.php'); $header = ob_get_clean();
	ob_start();	include_once('view/templates/common/template_common_menu.php'); $menu = ob_get_clean();
	ob_start();	include_once('view/templates/common/template_common_footer.php'); $footer = ob_get_clean();
	

	if(isset($_GET['route'])) {
		$parts = explode("/",$_GET['route']);
		$parts[0] = isset($parts[0]) ? $parts[0] : 'index' ;
		$parts[1] = isset($parts[1]) ? $parts[1] : 'index' ;
		$parts[2] = isset($parts[2]) ? $parts[2] : 'index' ;
	
		//include_once('view/templates/'. $parts[0].'/'. $parts[1]. '/'. $parts[1]. '_'. $parts[2]. '_tpl.php'); 
	}else {
		$parts[0] = 'index' ;
		$parts[1] = 'index' ;
		$parts[2] = 'index' ;
	}
	
	//echo 'controller/'. $parts[0].'/controller_'. $parts[0]. '_'. $parts[1]. '.php';
	
	include_once('controller/'. $parts[0].'/controller_'. $parts[0]. '_'. $parts[1]. '.php');
	$controllerName = 'Controller_'. ucwords($parts[1]);
	$controllerAction = $parts[2];
	$objController = new $controllerName();
	$objController->$controllerAction();
	
?>
<?php //include_once('view/templates/catalog/category/category_index_tpl.php'); ?>

<?php //include_once('view/templates/catalog/post/post_index_tpl.php'); ?>

<?php //include_once('view/templates/catalog/information/information_index_tpl.php'); ?>

<?php //include_once('view/templates/catalog/information/information_form_tpl.php'); ?>

<?php //include_once('view/templates/account/account_login_tpl.php'); ?>



