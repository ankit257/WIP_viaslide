<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Administration</title>
       	<link rel="stylesheet" type="text/css" href="view/stylesheet/stylesheet.css" />
        <script type="text/javascript" src="view/javascript/jquery/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
        <link type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="view/javascript/jquery/tabs.js"></script>
        <script type="text/javascript" src="view/javascript/jquery/superfish/js/superfish.js"></script>
        <script type="text/javascript">
        //-----------------------------------------
        // Confirm Actions (delete, uninstall)
        //-----------------------------------------
        $(document).ready(function(){
            // Confirm Delete
            $('#form').submit(function(){
                if ($(this).attr('action').indexOf('delete',1) != -1) {
                    if (!confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?')) {
                        return false;
                    }
                }
            });
                
            // Confirm Uninstall
            $('a').click(function(){
                if ($(this).attr('href') != null && $(this).attr('href').indexOf('uninstall', 1) != -1) {
                    if (!confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?')) {
                        return false;
                    }
                }
            });
        });
        </script
	</head>

	<body>
        <div id="container">
            <div id="header">
              <div class="div1">
                <div class="div2"><img onclick="location = 'http://emarketzindia.com/yuvaDevelopment/admin/index.php?route=common/login'" title="Administration" src="view/image/logo.png"></div>
                  </div>
              </div>
        
