<?php if ($success) {echo '<script>alert("'. $success. '");</script>' ; } elseif ($error) {echo '<script>alert("Could not update check the errors.");</script>' ; } ?>
<div class="container">
	<div id="main">

<?php if($success) { ?><div class="success"><?php echo $success; ?></div><? } ?>

<div class="error"><?php echo $error['DB']; ?></div>

		<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1066" align="left" valign="top">
    <form name="form_login" method="post" action="">
      <div class="section_2">
      	<div class="portion" style="margin-top:10px;">
                <h2><?php echo $heading; ?></h2>
                <div class="clear">&nbsp;</div>
                <div class="fl-left">
                  <div class="name">New Password<span>*</span> :</div>
                  <div class="textfield">
                    <input name="new_password" type="password" class="input_box-reg" value="<?php echo $_POST['new_password']; ?>"/>
                  </div>
                  <div class="textfield">
	                  <div class="error"><?php echo $error['new_password']; ?></div>
                  </div>
                </div>
                <div class="clr" style="padding-top:5px;"></div>
                <div class="fl">
                  <div class="name">Confirm Password<span>*</span> :</div>
                  <div class="textfield">
                    <input name="con_password" type="password" class="input_box-reg" value="<?php echo $_POST['con_password']; ?>"/>
                  </div>
                  <div class="textfield">
	                  <div class="error"><?php echo $error['confirm_pwd']; ?></div>
                  </div>
                </div>
                <div class="clr" style="padding-top:5px;"></div>
                <div class="fl">
                  <div class="name">&nbsp;</div>
                  <div class="textfield">
                    <input name="submit" type="submit" value="Update" class="button"/>
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
</table>
</div>
</div>
