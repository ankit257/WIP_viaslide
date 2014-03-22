<?php echo $header; echo $banner; echo $fixbuttons; ?>
<script src="<?php echo THEMEPATH; ?>js/jqueryvalidate.js" type="text/javascript"></script>

<script>
  $(document).ready(function(){
    $("#form_loyalty").validate();
  });
</script>

<div class="page">
	<div class="container">
        <div class="container-right loyalty">
        		<div><?php echo $error; ?></div>
                <div><?php echo $success; ?></div>
                <h1><?php echo $heading; ?></h1>
                <?php echo $content; ?>
              
               <form id="form_loyalty" action="" method="post" style="width:600px; float:left;">
               
               <div class="emp-o">
               <div class="emp-n">
               <label for="fname" class="emp-lable">First  Name <span style="color:red">*</span></label>
               </div>
               <div class="emp-l">
               <input name="info[Name]" type="text" class="emp-txt required">
               </div>
               </div>
               
               <div class="emp-o">
               <div class="emp-n">
               <label for="fname" class="emp-lable">Last Name <span style="color:red">*</span></label>
               </div>
               <div class="emp-l">
               <input name="lname" type="text" class="emp-txt required">
               </div>
               </div>
               
               <div class="emp-o">
               <div class="emp-n">
               <label for="fname" class="emp-lable">Adress Street 1 <span style="color:red">*</span></label>
               </div>
               <div class="emp-l">
               <input name="info[Add_1]" type="text" class="emp-txt required">
               </div>
               </div>
               
               <div class="emp-o">
               <div class="emp-n">
               <label for="fname" class="emp-lable">Address Street 2 <span style="color:red">*</span></label>
               </div>
               <div class="emp-l">
               <input name="info[Add_2]" type="text" class="emp-txt required">
               </div>
               </div>
               
               <div class="emp-o">
               <div class="emp-n">
               <label for="city" class="emp-lable">City <span style="color:red">*</span></label>
               </div>
               <div class="emp-l">
               <input name="info[City]" type="text" class="emp-txt required">
               </div>
               </div>
               
               <div class="emp-o">
               <div class="emp-n">
               <label for="fname" class="emp-lable">Zip Code <span style="color:red">*</span></label>
               </div>
               <div class="emp-l">
               <input name="info[Zip]" type="text" class="emp-txt required number">
               </div>
               </div>
               
               <div class="emp-o">
               <div class="emp-n">
               <label for="fname" class="emp-lable">State <span style="color:red">*</span></label>
               </div>
               <div class="emp-l">
                <input name="info[State]" type="text" class="emp-txt required">
               </div>
               </div>
               
                <div class="emp-o">
               <div class="emp-n">
               <label for="fname" class="emp-lable">Daytime Phone <span style="color:red">*</span></label>
               </div>
               <div class="emp-l">
               <input name="info[Day_Time_Phone]" type="text" class="emp-txt required number">
               </div>
               </div>
               
                <div class="emp-o">
               <div class="emp-n">
               <label for="fname" class="emp-lable">Evening Phone <span style="color:red">*</span></label>
               </div>
               <div class="emp-l">
               <input name="info[Evening_Time_Phone]" type="text" class="emp-txt required number">
               </div>
               </div>
               
               <div class="emp-o">
               <div class="emp-n">
               <label for="fname" class="emp-lable">Email <span style="color:red">*</span></label>
               </div>
               <div class="emp-l">
               <input name="info[Email]" type="text" class="emp-txt required email">
               </div>
               </div>
               
               
                <div class="emp-o">
               <input name="submit" type="submit" value="Submit" class="f-btn">
               <input name="reset" type="reset" value="Reset" class="f-btn">
               </div>
                <p style="color:red">* Hotel black-out rules and restrictions apply</p>
               <p style="color:red">* Airfare not included</p>
               <p style="color:red">* Prize is not transferable</p>
               </form>
              
               <div class="bbb">
                 <img src="<?php echo THEMEPATH;?>images/bbb.jpg" width="60" height="74"></div>
                 <div class="bbb res-img">
              <img src="<?php echo THEMEPATH;?>images/add3.jpg" width="288" height="289" border="0" usemap="#Map">
              <map name="Map" id="Map">
                <area shape="rect" coords="4,4,89,96" href="http://www.woolsafe.org/usa/find-a-product-supplier/" target="_blank">
                <area shape="rect" coords="117,8,285,82" href="http://www.bbb.org/central-northern-western-arizona/business-reviews/cleaning-services/desert-island-services-in-scottsdale-az-1000026494" target="_blank">
                <area shape="rect" coords="3,108,90,193" href="http://www.greenseal.org/FindGreenSealProductsandServices.aspx?vid=ViewProductDetail&amp;cid=0&amp;sid=20" target="_blank">
                <area shape="rect" coords="125,106,286,177" href="http://www.arcsi.org/members/?id=14376632" target="_blank">
                <area shape="rect" coords="7,201,99,275" href="http://www.bscai.org/CompanySearch/tabid/64/Default.aspx" target="_blank">
                <area shape="rect" coords="153,198,264,279" href="http://web.northscottsdalechamber.org/Cleaning-Services/Desert-Island-Services-2086" target="_blank">
              </map>
            </div>
                </div>
	</div>
</div>



<?php echo $footer; ?>