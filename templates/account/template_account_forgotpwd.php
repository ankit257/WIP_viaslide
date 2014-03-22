<link href="<?php echo THEMEPATH; ?>lightbox-div/source/light.css" rel="stylesheet" type="text/css">
<div class="bdr">
	<div class="success"><?php echo $success; ?></div>
	<div class="warning"><?php echo $warning; ?></div>
		<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1066" align="left" valign="top">
    <form name="form_login" method="post" action="">
      <div class="section_2">
      	<div class="portion" style="margin-top:10px;">
                <h2><?php echo $heading; ?></h2>
                <div class="clear">&nbsp;</div>
                <div class="fl-left">
                  <div class="name">Please Enter Registered Email with us.<span>*</span> :</div>
                  <div class="textfield">
                    <input name="email" type="text" class="input_box-reg" value="<?php echo $_POST['email']; ?>"/>
                  </div>
                  <div class="textfield">
	                  <div class="error"><?php echo $error['email']; ?></div>
                  </div>
                </div>
                <div class="clr" style="padding-top:5px;"></div>
                <div class="fl">
                  <div class="name">&nbsp;</div>
                  <div class="textfield">
                    <input name="submit" type="submit" value="Forgot" class="button"/>
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
