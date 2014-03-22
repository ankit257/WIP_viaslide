<?php if($success) { ?>
<script>parent.location.reload(1); parent.$.fancybox.close();</script>
<?php } ?>
<link href="<?php echo THEMEPATH; ?>lightbox-div/source/light.css" rel="stylesheet" type="text/css">
<?php if($success) { ?><div class="success"><?php echo $success; ?></div><? } ?>
		
  <div class="container vsmain" style="width:800px;">
  <div class="row register-form">
  
  <div class="col-lg-5 col-md-5 col-xs-12">
    <div class="card">
      <h3 class="card-heading headingxl">
        <?php echo $heading; ?>
      </h3>
      <br>
        <form class="bs-docs-example form-horizontal" role="form" method="post" name="form_registration" action="" action="" enctype="multipart/form-data"a>
          <div class="form-group">
            <label class="control-label" for="inputName">Name<span>*</span></label>
            <div class="controls">
              <input id="inputName" class="form-control solid-bdr" name="info[first_name]" type="text" value="<?php echo $dbInfo['first_name']; ?>">
            </div>
            <div class="textfield">
              <div class="error"><?php echo $error[name]; ?></div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="inputUserName">User Name<span>*</span></label>
            <div class="controls">
              <input id="inputUserName"  class="form-control solid-bdr" name="info[user_name]" type="text" value="<?php echo $dbInfo['user_name']; ?>">
            </div>
            <div class="textfield">
              <div class="error"><?php echo $error[username]; ?></div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="inputEmail">Email<span>*</span></label>
            <div class="controls">
              <input id="inputEmail" class="form-control solid-bdr" name="info[email]" type="text" value="<?php echo $dbInfo['email']; ?>">
            </div>
            <div class="textfield">
              <div class="error"><?php echo $error[email]; ?></div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="inputPwd">Password<span>*</span></label>
            <div class="controls">
              <input id="inputPwd" class="form-control solid-bdr" name="password" type="password" value="<?php echo $_POST['password']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="inputPwd">Confirm Password<span>*</span></label>
            <div class="controls">
              <input id="inputPwd" class="form-control solid-bdr" name="confirm_password" type="password" value="<?php echo $_POST['confirm_password']; ?>">
            </div>
            <div class="textfield">
              <div class="error"><?php echo $error[confirm_pwd]; ?></div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label"></label>
            <div class="controls pull-right">
              <input name="submit" type="submit" value="Register" class="button"/>&nbsp;&nbsp;
              <input type="reset" value="Reset" class="button"/>
            </div>
          </div>
                  
        
        </form>
    </div>
  </div>

  <div class="col-lg-5 col-md-5 col-xs-12 pull-right">
    <div class="card">
      <h3 class="card-heading headingxl">
        <?php echo $heading1; ?>
      </h3>
      <br>
        <form class="bs-docs-example form-horizontal" method="post" name="form_login" action="index.php?route=account/login">
          <div class="form-group">
            <label class="control-label" for="inputEmail">Email<span>*</span></label>
            <div class="controls">
              <input id="inputEmail" class="form-control solid-bdr" name="email" type="text" value="<?php echo $_POST[email]; ?>">
            </div>
            <div class="textfield">
              <div class="error"><?php echo $error[email]; ?></div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="inputPassword">Password<span>*</span></label>
            <div class="controls">
              <input id="inputPassword" class="form-control solid-bdr" name="password" type="password" value="<?php echo $_POST[password]; ?>">
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
        <br>
        <h3 class="card-heading headingxl">Or, Simply</h3>
        <br>
        <div class="">
          <?php echo $module['facebook']; ?>
        </div>
        <br>
        <?php /*
        <div class="">
          <?php echo $module['twitter']; ?>
        </div>
        <br>
        */ ?>
        <div class="">
          <?php echo $module['googleconnect']; ?>
        </div>
        
        <h3 class="card-heading">* Believe us, no wall posts !!!</h3>
        <br>
               </div>
  </div>
  
  </div>  
  </div>
