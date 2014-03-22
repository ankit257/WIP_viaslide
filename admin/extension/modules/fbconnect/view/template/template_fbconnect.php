<div class="box">
  <div class="heading">
    <h1><img alt="" src="view/image/module.png"> Facebook Connect</h1>
    <div class="buttons"><a class="button" onclick="$('#form').submit();"><span>Save</span></a><a class="button" onclick="location = 'index.php?route=extension/module';"><span>Cancel</span></a></div>
  </div>
  <div class="content">
      <table class="list" id="module">
          <tbody><tr>
            <td class="left">Created By Leon Li</td>
            <td class="left">Version:<br><span class="help">1.0.1</span></td>
            <td class="left">Demo:<br><a target="_blank" href="http://www.leonli.net/demo/opencart/index.php?route=account/login">Click Here</a></td>
            <td class="left">Licence:<br><span class="help">Free to use under the opencart license.</span></td>
          </tr>
      </tbody></table>
    <form id="form" enctype="multipart/form-data" method="post" action="">
      <table class="form">
	      	<tbody><tr>
          <td><span class="required">*</span> Facebook API Key:</td>
          <td><input type="text" value="<?php echo $config['api_key']; ?>" size="50" id="api_key" name="config[api_key]" style="margin-right: 0px; padding-right: 0px; width: 256px;"></td>
	</tr>
      	<tr>
          <td><span class="required">*</span> Facebook API Secret:</td>
          <td><input type="text" value="<?php echo $config['api_secret']; ?>" size="50" id="api_secret" name="config[api_secret]" style="margin-right: 0px; padding-right: 0px; width: 256px;"></td>
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