<?php echo $header; echo $banner; echo $fixbuttons; ?>
<div class="page">

	<div class="container">
    
        <div class="container-right">
		       <div><?php echo $error; ?></div>
               <div><?php echo $success; ?></div>
        
               <h1>Employment</h1>
               <h2>Employment Application Form</h2>
               <form id="emp_form" action="" method="post" enctype="multipart/form-data">

                   <div class="emp-f"><label for="fname" class="emp-lable">Applied For</label></div>
                   <div class="emp-f">
                   	<input id="applied_for" name="info[Job_Title]" type="text" value="<?php echo $applied_for; ?>" class="emp-txt">
                    <a href="<?php echo DOCROOT; ?>index.php?route=career"> <img src="<?php echo THEMEPATH; ?>images//career-btn.jpg" width="212" height="32" style="float:right"></a>
				   </div>

                   <div class="emp-f"><label for="fname" class="emp-lable">Full Name</label></div>
                   <div class="emp-f"><input id="fname" name="info[Name]" type="text" class="emp-txt"></div>
                   
                   <div class="emp-f"><label for="add" class="emp-lable">Address</label></div>
                   <div class="emp-f"><input name="info[Address]" type="text" class="emp-txt"></div>
                   
                   <div class="emp-f"><label for="city" class="emp-lable">City</label></div>
                   <div class="emp-f"><input name="info[City]" type="text" class="emp-txt"></div>
                   
                   <div class="emp-f"><label for="pcode" class="emp-lable">Postal Code</label></div>
                   <div class="emp-f"><input name="info[Postal_Code]" type="text" class="emp-txt"></div>
                   
                   <div class="emp-f"><label for="pno" class="emp-lable">Phone Number</label></div>
                   <div class="emp-f"><input name="info[Contact_No]" type="text" class="emp-txt"></div>
                   
                   <div class="emp-f"><label for="fax" class="emp-lable">Fax Number</label></div>
                   <div class="emp-f"><input name="info[Fax]" type="text" class="emp-txt"></div>
                   
                   <div class="emp-f"><label for="cell" class="emp-lable">Cellular</label></div>
                   <div class="emp-f"><input name="info[Mobile_No]" type="text" class="emp-txt"></div>
                   
                   <div class="emp-f"><label for="dob" class="emp-lable">Date of Birth</label></div>
                   <div class="emp-f"><input name="info[Date_of_Birth]" type="text" class="emp-txt"></div>
                   
                   <div class="emp-f"><label for="legal" class="emp-lable">Are you US Citizen?</label></div>
                   <div class="emp-f">
                   	<select name="info[US_Citizen]" class="emp-txt">
                     <option>Choose...</option>
                     <option>Yes</option>
                     <option>No</option>
                   	</select>
                   </div>
                   
                   <div class="emp-f"><label for="ify" class="emp-lable">If  not, are you authorized to work in the US?</label></div>
                   <div class="emp-f">
                    <select name="info[US_Authorization]" class="emp-txt">
                     <option>Choose...</option>
                     <option>Yes</option>
                     <option>No</option>
                    </select>
                   </div>
                   
                   <div class="emp-f"><label for="legal" class="emp-lable">Do you have a criminal Record?</label></div>
                   <div class="emp-f">
                    <select name="info[Criminal_Record]" class="emp-txt">
                     <option>Choose...</option>
                     <option>Yes</option>
                     <option>No</option>
                    </select>
                   </div>
                   
                   <div class="emp-f"><label for="legal" class="emp-lable">Are you willing to work?</label></div>
                   <div class="emp-f">
                    <select name="info[Job_Type]" class="emp-txt">
                     <option>Choose...</option>
                     <option>Full Time</option>
                     <option>Part Time</option>
                    </select>
                   </div>
                   
                   <div class="emp-f"><label for="legal" class="emp-lable">Do you have your own transportation?</label></div>
                   <div class="emp-f">
                    <select name="info[Own_Transportation]" class="emp-txt">
                     <option>Choose...</option>
                     <option>Yes</option>
                     <option>No</option>
                    </select>
                   </div>
                   
                   <div class="emp-f"><label for="upload" class="emp-lable">Upload your resume</label></div>
                   <div class="emp-f"><input id="resume" name="upload" type="file"><br /> only (jpg, pdf,doc,docx) file allowed.</div>
                   
                   <div class="emp-f"><input id="btn_emp_submit" name="submit" type="submit" value="Submit" class="f-btn"></div>
               </form>
			</div>

		<div class="container-left">
			<img src="<?php echo THEMEPATH; ?>images/employment.png" width="325" height="212">
		<?php echo $testimonials; echo $right; ?>
        </div>

	</div>

</div>

<script>
	$( "#btn_emp_submit" ).live( 'click', function() {
		
		var AppliedFor = $("#applied_for").val();
		var Fname = $("#fname").val();
		var Resume = $("#resume").val();
		
		if(AppliedFor.trim()=="" || Fname.trim()=="" || Resume.trim() == "") {
			alert("Applied For, Full Name and Resume are Required Fields");
			return false;
		}
		
		return true;
		
	});
</script>

<?php echo $footer; ?>