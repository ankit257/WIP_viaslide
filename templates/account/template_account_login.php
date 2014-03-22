<div class="page">
	<div class="main">

<link href="<?php echo THEMEPATH; ?>lightbox-div/source/light.css" rel="stylesheet" type="text/css">


<!--test-->
 <div class="container vsmain" style="width:800px;">
<div class="row register-form">

<div class="col-lg-5 col-md-5 col-xs-12">
  <div class="card" style="">
   <h3 class="card-heading headingxl"><?php echo $heading; ?></h3>
        <form class="bs-docs-example form-horizontal" method="post" name="form_login" action="">
          <div class="form-group">
            <label class="control-label" for="inputEmail">Email<span>*</span></label>
            <div class="controls">
              <input class="form-control solid-bdr" id="inputEmail" name="email" placeholder="Email" type="text" value="<?php echo $_POST[email]; ?>">
            </div>
            <div class="textfield">
              <div class="error"><?php echo $error[email]; ?></div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="inputPassword">Password<span>*</span></label>
            <div class="controls">
              <input class="form-control solid-bdr" id="inputPassword" name="password" placeholder="Password" type="password" value="<?php echo $_POST[password]; ?>">
            </div>
            <div class="textfield">
              <div class="error"><?php echo $error[password]; ?></div>
            </div>
          </div>
           <div class="form-group">
            <label class="control-label"></label>
            <label class="checkbox">
                <input type="checkbox"> Remember me
              </label>
              <br>
            <div class="controls">
              <input name="submit" type="submit" value="Sign In" class="button pull-left"/>&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;<a style="position:absolute; margin-top:7px;"class="" href="index.php?route=account/forgotpwd">Forgot Password</a>
            </div>
          </div>
        </form>
        </div>
        </div>

        <div class="col-lg-5 col-md-5 col-xs-12">
        <h3 class="card-heading headingxl">Or, Simply</h3>
          
             <div class="fl">
                <div class="name">&nbsp;</div>
                <div class="textfield">
                  <?php //echo '<a href="'.$fbLoginUrl.'">'. $config['button_image'] . '</a>'; ?>
                  <?php echo $module['facebook']; ?>
                </div>
              </div>
          <?php /*
            <div class="fl">
              <div class="name">&nbsp;</div>
              <div class="textfield">
                <?php echo $module['twitter']; ?>
              </div>
            </div>
          */ ?>
              <div class="fl">
                  <div class="name">&nbsp;</div>
                  <div class="textfield">
                    <?php echo $module['googleconnect']; ?>
                  </div>
              </div>
              <br>
              <br>
              <h3 class="card-heading simple">*Believe Us, No wall posts !!!</h3>
        </div>              
      </div>
      </div>
    </div>




<!--SOCIAL BITCHES-->

<!-- SOCIAL BITCHES-->



<!--test-->
<?
/*
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
                    <input class="form-control solid-bdr" name="email" type="text" class="input_box-reg" value="<?php echo $_POST[email]; ?>"/>
                  </div>
                  <div class="textfield">
	                  <div class="error"><?php echo $error[email]; ?></div>
                  </div>
                </div>
                <div class="clr" style="padding-top:5px;"></div>
                <div class="fl">
                  <div class="name">Password<span>*</span> :</div>
                  <div class="textfield">
                    <input class="form-control solid-bdr" name="password" type="password" class="input_box-reg" value="<?php echo $_POST[password]; ?>"/>
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
                    <input class="form-control solid-bdr" name="submit" type="submit" value="Login" class="button"/>
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
*/
?>

</div>
