<?php echo $header; ?>
<div id="content">
  <div style="width: 400px; min-height: 300px; margin-top: 40px; margin-left: auto; margin-right: auto;" class="box">
    <div class="heading">
      <h1><img alt="" src="view/image/lockscreen.png"> Please enter your login details.</h1>
    </div>
    <div style="min-height: 150px; overflow: hidden;" class="content">
	    <?php if(!empty($warning)): ?><div class="warning"><?php echo $warning; ?></div><?php endif; ?>
     		<form id="form" enctype="multipart/form-data" method="post" action="">
        <table style="width: 100%;">
          <tbody><tr>
            <td rowspan="4" style="text-align: center;"><img alt="Please enter your login details." src="view/image/login.png"></td>
          </tr>
          <tr>
            <td>Username:<br>
              <input id="UserID" type="text" style="margin-top: 4px; margin-right: 0px; padding-right: 0px; width: 106px;" value="" name="info[username]">
              <br>
              <br>
              Password:<br>
              <input type="password" style="margin-top: 4px; margin-right: 0px; padding-right: 0px; width: 106px;" value="" name="info[password]">
              <br>
              <!--<a href="#" id="forgot">Forgotten Password</a></td>-->
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td style="text-align: right;"><a class="button" onclick="$('#form').submit();">Login</a></td>
          </tr>
        </tbody></table>
              </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
/*$('#form input').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#form').submit();
	}
});*/
--></script>

<script type="text/javascript"><!--
$('#forgot').click(function() {
	var UserID = $("#UserID").val();
	if(UserID.trim() == "") {
		alert("User Name required");
		return false;
	}
	
	
	
});
--></script>


<?php echo $footer; ?>