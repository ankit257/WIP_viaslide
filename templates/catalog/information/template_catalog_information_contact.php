<?php echo $header; echo $banner; echo $fixbuttons; ?>

<script>
	$("#btn_contact_submit").live( 'click', function() {
		var Fname = $("#contact_fname").val().trim();
		var Email = $("#contact_email").val().trim();
		
		if( Fname == "" || Email == "" ) {
			alert("Name, Email are Required Fields");
			return false;
		}
		
		if($('.servicetype:checkbox:checked').length == 0) {
			alert( "At Least 1 Type of Service Selection Required" );
			return false;
		}

		if($('.propertysize:checkbox:checked').length == 0) {
			alert( "At Least 1 Size of Property Selection Required" );
			return false;
		}

//		return false;
		return true;
	});
</script>

<div class="page">
	<div class="container">
        <div class="container-right">
				<div><?php echo $error; ?></div>
                <div><?php echo $success; ?></div>
                <h1>Contact Us</h1>
        
               <form id="contact_form" action="" method="post">
               
               <div class="emp-f">
               <label for="fname" class="emp-lable">Name</label>
               </div>
               <div class="emp-f">
               <input id="contact_fname" name="info[Name]" type="text" class="emp-txt">
               </div>
               
                <div class="emp-f">
               <label for="add" class="emp-lable">Company Name</label>
               </div>
               <div class="emp-f">
               <input name="info[Company_Name]" type="text" class="emp-txt">
               </div>
               
               <div class="emp-f">
               <label for="city" class="emp-lable">Address 1</label>
               </div>
               <div class="emp-f">
               <input name="info[Add_1]" type="text" class="emp-txt">
               </div>
               
                <div class="emp-f">
               <label for="pcode" class="emp-lable">Address 2</label>
               </div>
               <div class="emp-f">
               <input name="info[Add_2]" type="text" class="emp-txt">
               </div>
               
                <div class="emp-f">
               <label for="pno" class="emp-lable">City</label>
               </div>
               <div class="emp-f">
               <input name="info[City]" type="text" class="emp-txt">
               </div>
               
                <div class="emp-f">
               <label for="fax" class="emp-lable">Zip Code</label>
               </div>
               <div class="emp-f">
               <input name="info[Zip]" type="text" class="emp-txt">
               </div>
               
                <div class="emp-f">
               <label for="cell" class="emp-lable">State</label>
               </div>
               <div class="emp-f">
               <select name="info[State]" class="emp-txt">
                            <option value="AL" selected="selected"> AL </option>
                            <option value="AK"> AK </option>
                            <option value="AZ"> AZ </option>
                            <option value="AR"> AR </option>
                            <option value="CA"> CA </option>
                            <option value="CO"> CO </option>
                            <option value="CT"> CT </option>
                            <option value="DE"> DE </option>
                            <option value="DC"> DC </option>
                            <option value="FL"> FL </option>
                            <option value="GA"> GA </option>
                            <option value="HI"> HI </option>
                            <option value="ID"> ID </option>
                            <option value="IL"> IL </option>
                            <option value="IN"> IN </option>
                            <option value="IA"> IA </option>
                            <option value="KS"> KS </option>
                            <option value="KY"> KY </option>
                            <option value="LA"> LA </option>
                            <option value="ME"> ME </option>
                            <option value="MD"> MD </option>
                            <option value="MA"> MA </option>
                            <option value="MI"> MI </option>
                            <option value="MN"> MN </option>
                            <option value="MS"> MS </option>
                            <option value="MO"> MO </option>
                            <option value="MT"> MT </option>
                            <option value="NE"> NE </option>
                            <option value="NV"> NV </option>
                            <option value="NH"> NH </option>
                            <option value="NJ"> NJ </option>
                            <option value="NM"> NM </option>
                            <option value="NY"> NY </option>
                            <option value="NC"> NC </option>
                            <option value="ND"> ND </option>
                            <option value="OH"> OH </option>
                            <option value="OK"> OK </option>
                            <option value="OR"> OR </option>
                            <option value="PA"> PA </option>
                            <option value="RI"> RI </option>
                            <option value="SC"> SC </option>
                            <option value="SD"> SD </option>
                            <option value="TN"> TN </option>
                            <option value="TX"> TX </option>
                            <option value="UT"> UT </option>
                            <option value="VT"> VT </option>
                            <option value="VA"> VA </option>
                            <option value="WA"> WA </option>
                            <option value="WV"> WV </option>
                            <option value="WI"> WI </option>
                            <option value="WY"> WY </option>
                 </select>
               </div>
               
                <div class="emp-f">
               <label for="dob" class="emp-lable">Daytime Phone</label>
               </div>
               <div class="emp-f">
               <input name="info[Day_Time_Phone]" type="text" class="emp-txt">
               </div>
               
                <div class="emp-f">
               <label for="city" class="emp-lable">Evening Phone</label>
               </div>
               <div class="emp-f">
               <input name="info[Evening_Phone]" type="text" class="emp-txt">
               </div>
               
                <div class="emp-f">
               <label for="legal" class="emp-lable">Email</label>
               </div>
               <div class="emp-f">
               <input id="contact_email" name="info[Email]" type="text" class="emp-txt">
               </div>
               
                <div class="emp-f">
               <label for="ify" class="emp-lable">Type of Service</label>
               </div>
               <div class="emp-f">
                 <p>
                   <label>
                     <input type="checkbox" class="servicetype" name="Type_of_Service[]" value="Cleaning Service" id="CheckboxGroup1_0">
                     Cleaning Service &nbsp; &nbsp;</label>
          
                   <label>
                     <input type="checkbox" class="servicetype" name="Type_of_Service[]" value="Staffing Service" id="CheckboxGroup1_1">
                     Staffing Service &nbsp; &nbsp;</label>
                     <label>
                     
                     <input type="checkbox" class="servicetype" name="Type_of_Service[]" value="Cleaning Products" id="CheckboxGroup1_2">
                     Cleaning Products</label>
                 </p>
               </div>
               
               <div class="emp-f">
               <label for="legal" class="emp-lable">Size of Property</label>
               </div>
               <div class="emp-f">
               <p>
                 <label>
                   <input type="checkbox" class="propertysize"  name="Size_of_Property[]" value="Less than to 1,499 sq ft" id="CheckboxGroup2_0">
                   Less than to 1,499 sq ft</label><br>

                 <label>
                   <input type="checkbox" class="propertysize" name="Size_of_Property[]" value="1,500 to 1,999 sq ft" id="CheckboxGroup2_1">
                   1,500 to 1,999 sq ft</label><br>
                   
                    <label>
                   <input type="checkbox" class="propertysize" name="Size_of_Property[]" value="2,000 to 2,499 sq ft" id="CheckboxGroup2_1">
                   2,000 to 2,499 sq ft</label><br>
                   
                   <label>
                   <input type="checkbox" class="propertysize" name="Size_of_Property[]" value="2,500 to 2,999 sq ft" id="CheckboxGroup2_1">
                   2,500 to 2,999 sq ft</label><br>
                   
                    <label>
                   <input type="checkbox" class="propertysize" name="Size_of_Property[]" value="3,000 to 3,499 sq ft" id="CheckboxGroup2_1">
                   3,000 to 3,499 sq ft</label><br>
                   
                    <label>
                   <input type="checkbox" class="propertysize" name="Size_of_Property[]" value="3,499 to 4,000 sq ft" id="CheckboxGroup2_1">
                   3,499 to 4,000 sq ft</label><br>

               </p>
<!--<select name="legal" class="emp-txt">
                            <option value="u1500" selected="selected">Less than to 1,499 sq ft</option>
                            <option value="15-35">1500 to 1,999 sq ft</option>
                            <option value="35-70">2,000 to 2,499 sq ft</option>
                            <option value="o70">2,500 to 2,999 sq ft</option>
                            <option value="o70">2,500 to 2,999 sq ft</option>
                            <option value="o70">3,000 to 3,499 sq ft</option>
                            <option value="o70">3,500 to 3,999 sq ft</option>
                 </select>-->
             
               </div>
               
                 <div class="emp-f">
               <label for="legal" class="emp-lable">Frequency</label>
               </div>
               <div class="emp-f">
                 <p>
                   <label>
                     <input type="radio" name="info[Frequency]" value="Daily" id="RadioGroup1_0" checked="checked">
                     Daily &nbsp; &nbsp;</label>
                   
                   <label>
                     <input type="radio" name="info[Frequency]" value="Weekly" id="RadioGroup1_1">
                     Weekly &nbsp; &nbsp;</label>
                   
                   <label>
                     <input type="radio" name="info[Frequency]" value="Bi Weekly" id="RadioGroup1_2">
                     Bi Weekly &nbsp; &nbsp;</label>
                  
                   <label>
                     <input type="radio" name="info[Frequency]" value="Monthly" id="RadioGroup1_3">
                     Monthly &nbsp; &nbsp;</label>
                   
                   <label>
                     <input type="radio" name="info[Frequency]" value="Other" id="RadioGroup1_4">
                   Other</label>
                 </p>
               </div>
               
               <div class="emp-f">
               <label for="legal" class="emp-lable">Type of Property</label>
               </div>
               <div class="emp-f">
               <select name="info[Type_of_Property]" class="emp-txt">
                            <option value="Home" selected="selected">Home</option>
                            <option value="Office">Commercial Office</option>
                            <option value="Hotel">Hotel/Resort</option>
                            <option value="Healthcare Facility">Healthcare Facility</option>
                 </select>
               
               </div>
               
               <div class="emp-f">
               <label for="upload" class="emp-lable">Comments</label>
               </div>
               <div class="emp-f">
               <textarea id="contact_comments" name="info[Comments]" cols="" rows="" class="emp-txt" style="height:75px;"></textarea>
               </div>
               
                <div class="emp-f">
               <input id="btn_contact_submit" name="submit" type="submit" value="Submit" class="f-btn">
               </div>
               </form>



        </div>
		<div class="container-left">
			<img src="<?php echo THEMEPATH; ?>images/contact.png" width="325" height="275">
		<?php echo $testimonials; echo $right; ?>
        </div>
	</div>
</div>



<?php echo $footer; ?>