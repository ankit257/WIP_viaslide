<div class="box">
  <div class="heading">
    <h1><img alt="" src="view/image/module.png"> Google Connect</h1>
    <div class="buttons"><a class="button" onclick="$('#form').submit();"><span>Save</span></a><a class="button" onclick="location = 'index.php?route=extension/module';"><span>Cancel</span></a></div>
  </div>
  <div class="content">
      <table class="list" id="module">
          <tbody><tr>
            <td class="left">Created By Ankit Jain</td>
            <td class="left">Version:<br><span class="help">1.0.1</span></td>
            <td class="left">Demo:<br><a target="_blank" href="http://www.webfrnd.com">Click Here</a></td>
            <td class="left">Licence:<br><span class="help">Free to use under the webfrnd license.</span></td>
          </tr>
      </tbody></table>
    <form id="form" enctype="multipart/form-data" method="post" action="">
      <table class="form">
	      	<tbody><tr>
          <td><span class="required">*</span> Google Client Id: (can be create or found https://code.google.com/apis/console)</td>
          <td><input type="text" value="<?php echo $config['oauth2_client_id']; ?>" size="50" id="oauth2_client_id" name="config[oauth2_client_id]" style="margin-right: 0px; padding-right: 0px; width: 256px;"></td>
	</tr>
    
    <tr>
          <td><span class="required">*</span> Google Client Secret: (can be create or found https://code.google.com/apis/console)</td>
          <td><input type="text" value="<?php echo $config['oauth2_client_secret']; ?>" size="50" id="oauth2_client_secret" name="config[oauth2_client_secret]" style="margin-right: 0px; padding-right: 0px; width: 256px;"></td>
	</tr>
    

    <tr>
          <td><span class="required">*</span> Google OAuth Consumer Key: (See http://code.google.com/apis/accounts/docs/RegistrationForWebAppsAuto.html for info on how to obtain this)</td>
          <td><input type="text" value="<?php echo $config['oauth2_consumer_key']; ?>" size="50" id="oauth2_consumer_key" name="config[oauth2_consumer_key]" style="margin-right: 0px; padding-right: 0px; width: 256px;"></td>
	</tr>


    <tr>
          <td><span class="required">*</span> Google OAuth Consumer Secret: (See http://code.google.com/apis/accounts/docs/RegistrationForWebAppsAuto.html for info on how to obtain this)</td>
          <td><input type="text" value="<?php echo $config['oauth2_consumer_secret']; ?>" size="50" id="oauth2_consumer_secret" name="config[oauth2_consumer_secret]" style="margin-right: 0px; padding-right: 0px; width: 256px;"></td>
	</tr>



	<tr>
	<td>Connect Button:</td>
	  <td><input type="text" value="<?php echo htmlspecialchars($config['button_image']); ?>" size="50" id="button_image" name="config[button_image]" style="margin-right: 0px; padding-right: 0px; width: 256px;">
	    	<img style="vertical-align: top;" title="English" src="view/image/flags/gb.png"><br>
		<span class="help">Can be text or html code.</span>
     	  </td>
	</tr>
	      </tbody></table>
    </form>
  </div>
</div>