


<?php if($success) { ?>
<script>parent.location.reload(1); parent.$.fancybox.close();</script>
<?php } ?>


<form  id = "form_feedback" name="form_feedback" method="post" action="" enctype="multipart/form-data">
    <div class="modal-dialog feedback-dialog">
      <div class="modal-content">
        

          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="heading-1"><?php echo $heading; ?></h2>
            
          </div>
        <div class="modal-body">

                

                <div class="form-group">
            <label class="control-label" for="inputName">Name<span>*</span></label>
            <div class="controls">
              <input id="inputName" class="form-control solid-bdr" name="info[first_name]" type="text" value="<?php echo $dbInfo['first_name']; ?>">
            </div>
            <div class="textfield">
              <div class="error"><?php echo $error['name']; ?></div>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label" for="inputEmail">E-Mail<span>*</span></label>
            <div class="controls">
              <input id="inputEmail" class="form-control solid-bdr" name="info[email]" type="text" value="<?php echo $dbInfo['email']; ?>">
            </div>
            <div class="textfield">
              <div class="error"><?php echo $error['email']; ?></div>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label" for="inputFeedback">Feedback<span>*</span></label>
            <div class="controls">
              <textarea id="inputFeedback" class="form-control solid-bdr" name="info[feedback]" type="text" value="<?php echo $dbInfo['feedback']; ?>"></textarea>
            </div>
            <div class="textfield">
              <div class="error"><?php echo $error['feedback']; ?></div>
            </div>
          </div>
          
      </div>
<div class="modal-footer">
  <input id="submit" type="submit" value="Submit" class="submit btn btn-primary btn-2" style="" onclick=""/>&nbsp;&nbsp;
</div>
</div>
</div>
</form>

<script>
$(document).ready(function(){
$("form").submit(function(){
var nameReg = /^[A-Za-z]+$/;
    // var numberReg =  /^[0-9]+$/;
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    var name = $('#inputName').val();
    //var company = $('#companyInput').val();
    var email = $('#inputEmail').val();
    // var telephone = $('#telInput').val();
    var message = $('#inputFeedback').val();

    var inputVal = new Array(name, email, message);

    var inputMessage = new Array("name", "email","message");

     $('.error').hide();
     if(inputVal){

        if(inputVal[0] == ""){
            $('#inputName').after('<span class="error"> Please enter your ' + inputMessage[0] + '</span>');
        } 
        else if(!nameReg.test(names)){
            $('#inputName').after('<span class="error"> Letters only</span>');
        }

        if(inputVal[1] == ""){
            $('#inputEmail').after('<span class="error"> Please enter your ' + inputMessage[1] + '</span>');
        } 
        else if(!emailReg.test(email)){
            $('#inputEmail').after('<span class="error"> Please enter a valid email address</span>');
        }


        if(inputVal[2] == ""){
            $('#inputFeedback').after('<span class="error"> Please enter your ' + inputMessage[2] + '</span>');
        }   
        
        return false; 
        }


  });
});
</script>