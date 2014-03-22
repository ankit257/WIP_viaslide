<?php if(isset($success)) { ?>
<script>parent.location.reload(1); parent.$.fancybox.close();</script>
<?php } ?>
<link href="<?php echo THEMEPATH; ?>lightbox-div/source/light.css" rel="stylesheet" type="text/css">
<div class="bdr">
		<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1066" align="left" valign="top">
    <form name="form_login" method="post" action="">
      <div class="section_2">
      	<div class="portion" style="margin-top:10px;">
                <h2><?php echo $heading; ?></h2>
                <div class="clear">&nbsp;</div>
                <div class="fl-left">
                  <div class="name">Email<span>*</span> :</div>
                  <div class="textfield">
                    <input name="email" type="text" class="input_box-reg" value="<?php echo $_POST[email]; ?>"/>
                  </div>
                  <div class="textfield">
	                  <div class="error"><?php echo $error[email]; ?></div>
                  </div>
                </div>
                <div class="clr" style="padding-top:5px;"></div>
                <div class="fl">
                  <div class="name">Password<span>*</span> :</div>
                  <div class="textfield">
                    <input name="password" type="password" class="input_box-reg" value="<?php echo $_POST[password]; ?>"/>
                  </div>
                  <div class="textfield">
	                  <div class="error"><?php echo $error[password]; ?></div>
                  </div>
                  <div class="textfield">
                  	<a href="index.php?route=account/forgotpwd">Forgot Password </a>
                  </div>
                </div>
                <div class="clr" style="padding-top:5px;"></div>
                <div class="fl">
                  <div class="name">&nbsp;</div>
                  <div class="textfield">
                    <input name="submit" type="submit" value="Login" class="button"/>
                  </div>
                </div>
                <div class="clr" style="padding-top:20px;"></div>
                
                <div class="fl">
                  <div class="name">&nbsp;</div>
                  <div class="textfield">
				      <?php //echo '<a href="'.$fbLoginUrl.'">'. $config['button_image'] . '</a>'; ?>
                      <?php echo $module['facebook']; ?>
                  </div>
              </div>

              <div class="clr" style="padding-top:5px;"></div>
              <div class="fl">
                  <div class="name">&nbsp;</div>
                  <div class="textfield">
				      <?php echo $module['twitter']; ?>
                  </div>
              </div>
                
              <div class="clr" style="padding-top:5px;"></div>
              <div class="fl">
                  <div class="name">&nbsp;</div>
                  <div class="textfield">
				      <?php echo $module['googleconnect']; ?>
                  </div>
              </div>

                <div class="clr" style="padding-top:20px;"></div>
                
              </div>
      </div>
      </form>
      </td>
  </tr>
  <!--<tr>
    <td height="23" colspan="2" align="center" class="agree">Or Continue as <span class="use">guest</span></td>
  </tr>-->
</table></div>
