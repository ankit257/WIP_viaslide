<?php if ($success) {echo '<script>alert("'. $success. '");</script>' ; } elseif ($error) {echo '<script>alert("Could not update check the errors.");</script>' ; } ?>
<div class="container vsmain">
	<div id="main">
<?php if($success) { ?><div class="success"><?php echo $success; ?></div><? } ?>
		<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1066" align="left" valign="top">
	  <form name="form_registration" method="post" action="" enctype="multipart/form-data">
	    <div class="section_1">

    		<div class="portion" style="margin-top:10px;">
                <h2><?php echo $heading; ?></h2>
                <?php if( !empty($dbInfo['image']) ) : ?>
                <img src="<?php echo $dbInfo['image']; ?>" width="100" height="100" />
                <?php endif; ?>
      
                <div class="form-group">
                  <label class="control-label" for="inputEmail">Profile Picture<span>*</span></label>
                  <div class="controls">
                  <input name="file" type="file" class="" value="<?php echo $_POST['file']; ?>"/>
                </div>
                <div class="textfield">
                  <div class="error"><?php echo $error['file']; ?></div>
                </div>
                </div>
          
                <div class="form-group">
                  <label class="control-label" for="inputName">Name<span>*</span></label>
                  <div class="controls">
                  <input name="info[first_name]" type="text" class="form-control solid-bdr" value="<?php echo $dbInfo['first_name']; ?>"/>
                </div>
                <div class="textfield">
                  <div class="error"><?php echo $error['name']; ?></div>
                </div>
                </div>
          
                <div class="form-group">
                  <label class="control-label" for="inputName">Name<span>*</span></label>
                  <div class="controls">
                  <input name="info[first_name]" type="text" class="form-control solid-bdr" value="<?php echo $dbInfo['first_name']; ?>"/>
                </div>
                <div class="textfield">
                  <div class="error"><?php echo $error['name']; ?></div>
                </div>
                </div>
                   
                <div class="form-group">
                  <label class="control-label" for="inputUserName">User Name<span>*</span></label>
                  <div class="controls">
                  <input name="inputUserName" type="text" class="form-control solid-bdr disabled" value="<?php echo $dbInfo['user_name']; ?>"/>
                </div>
                <div class="textfield">
                  <div class="error"><?php echo $error['name']; ?></div>
                </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label" for="inputEmail">Email<span>*</span></label>
                  <div class="controls">
                  <input name="inputEmail" type="text" class="form-control solid-bdr disabled" value="<?php echo $dbInfo['email']; ?>"/>
                </div>
                <div class="textfield">
                  <div class="error"><?php echo $error['name']; ?></div>
                </div>
                </div>
                

                <div class="form-group">
                  <label class="control-label" for="inputDOB">Date of Birth<span>*</span></label>
                  <div class="controls">
                  
                  <input name="dob[]" type="text" class="input_box-reg solid-bdr" style="width:30px;" placeholder="dd" value="<?php echo $_POST['dob'][0]; ?>"/>
                    <input name="dob[]" type="text" class="input_box-reg solid-bdr" style="width:30px; margin-left:10px;" placeholder="mm" value="<?php echo $_POST['dob'][1]; ?>"/>
                    <input name="dob[]" type="text" class="input_box-reg solid-bdr" style="width:80px; margin-left:10px;" placeholder="yyyy" value="<?php echo $_POST['dob'][2]; ?>"/>
                  
                </div>
                <div class="textfield">
                  <div class="error"><?php echo $error[date]; ?></div>
                </div>
                </div>               
                <br>
 

                <div class="form-group">
                  <label class="control-label" for="inputGender">Gender<span>*</span></label>
                  <div class="controls">
                  <select name="info[gender]" >
                        <option value="m" <?php echo strtolower($dbInfo['gender'])=="m" ? 'selected="selected"' : '' ?>>Male</option>
                        <option value="f" <?php echo strtolower($dbInfo['gender'])=="f" ? 'selected="selected"' : '' ?>>Female</option>
                    </select>
                  
                  </div>
                </div>
                

               
                
                <div class="clr" style="padding-top:20px;"></div>
                <div class="fl">
                  <div class="name">&nbsp;</div>
                  <div class="textfield">
                    <input name="submit" type="submit" value="Update" class="button"/>&nbsp;&nbsp;
                    <input type="reset" value="Reset" class="button"/>
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
</div>