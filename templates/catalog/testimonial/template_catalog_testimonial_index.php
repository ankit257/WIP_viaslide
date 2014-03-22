<?php echo $header; echo $banner; ?>

<!-- CSS -->
	<style>

	.container1 {
		  width: 100%;
		  height: 535px;
		 /* margin: 20px auto; background-color: #DCDCDC;*/
		  overflow-x: hidden; /* showing scrollbars */
		  overflow-y:auto;
	}
	
	
	.container1::-webkit-scrollbar {
		  width: 15px;
	} /* this targets the default scrollbar (compulsory) */
	
	.container1::-webkit-scrollbar-track {
		  background-color: #c8f0f8;
	} /* the new scrollbar will have a flat appearance with the set background color */

	.container1::-webkit-scrollbar-thumb {
		  background-color: rgba(0, 0, 0, 0.2); 
	} /* this will style the thumb, ignoring the track */

	::-webkit-scrollbar-button {
		  background-color: #3ac0da;
	} /* optionally, you can style the top and the bottom buttons (left and right for horizontal bars) */

	.container1::-webkit-scrollbar-corner {
		  background-color: black;
	} /* if both the vertical and the horizontal bars appear, then perhaps the right bottom corner also needs to be styled */	
	
	
</style>

<div class="page">
	<div class="container">

        <div class="container-right">
        	<h1><?php echo $heading; ?></h1>
            <div class="container1">
	            <div class="testimonial-outer">
				<?php if($testimonials) : foreach($testimonials as $testimonial) { ?>
                	<div class="testimonial">
                    <h6><?php echo $testimonial[posted_by]; ?></h6>
                    <?php echo $testimonial[content]; ?>
                    </div>
                <?php } endif; ?>
            	</div>
            </div>
        </div>

		<div class="container-left">
			<img src="<?php echo THEMEPATH; ?>images/testimonials.jpg" width="325" height="212">
            <div class="res-img">
				<a href="#" class="topopup"><img src="<?php echo THEMEPATH; ?>images/testi-btn.jpg" width="212" height="32" /></a>
				<div id="toPopup"> 
					<div class="close"></div>
					<span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
					<div id="popup_content"> <!--your content start-->
						<h1>Write A Testimonial</h1>
						<form action="" method="get">
				
                			<div class="testi-field">
								<label for="name">Name:</label>
								<input name="name" type="text" class="testi-input" id="posted_by"/>
							</div>
                
                            <div class="testi-field">
                                <label for="email">Email:</label>
                                <input name="email" type="text" class="testi-input" id="posted_by_email"/>
                            </div>
                
                            <div class="testi-field">
                                <label for="comment">Comment:</label>
                                <textarea id="content" name="comment" cols="" rows="" class="testi-input" style="width:150px; height:75px;"></textarea>
                            </div>
				
                            <div class="testi-field">
                                <label for="comment">&nbsp;</label>
                                <input name="submit" type="button" value="Submit" class="f-btn" id="write-testi"/>
				            </div>
			            </form>
			        </div> <!--your content end-->
    
			    </div> <!--toPopup end-->
    
				<div class="loader"></div>
				<div id="backgroundPopup"></div>
				
                <link href="<?php echo THEMEPATH; ?>css/pop-up.css" rel="stylesheet" type="text/css" media="all" />
				<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
				<script type="text/javascript" src="<?php echo THEMEPATH; ?>js/script-pop.js"></script>
		  	</div>
			<?php //echo $right; ?>
            
            <div class="res-img">
  <a href="http://www.bbb.org/central-northern-western-arizona/business-reviews/cleaning-services/desert-island-services-in-scottsdale-az-1000026494/#bbbonlineclick" title="Desert Island Services BBB Business Review"><img src="http://seal-central-northern-western-arizona.bbb.org/seals/blue-seal-160-82-desert-island-services-1000026494.png" style="border: 0;" alt="Desert Island Services BBB Business Review"></a>
  </div>
            
            
        </div>

	</div>
</div>
<script>
	  $("#write-testi").live('click', function() {
		var Posted_by = $("#posted_by").val();
		var Posted_by_email = $("#posted_by_email").val();
		var Posted_comment = $("#content").val();
		
		if(Posted_by.trim()=="" || Posted_by_email.trim()=="" || Posted_comment.trim()=="") {
			alert("All field Required");
			return false;	
		}
		
	 	$.post("index.php?route=testimonial/insert", { name: Posted_by, email: Posted_by_email, content: Posted_comment }, function(data) {
			if(data.trim()=="success") {
				$("#toPopup").fadeOut("normal");  
				$("#backgroundPopup").fadeOut("normal");  
				popupStatus = 0;
				alert("Submitted Successfully.. After Approving will display here.");
			}
			else
				alert("Could Not Submitted");
		});
	  });
</script>
	<!-- this cssfile can be found in the jScrollPane package -->
	<link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>css/jquery.jscrollpane.css" />	
		
	<!-- latest jQuery direct from google's CDN -->
	
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="<?php echo THEMEPATH; ?>js/jquery.jscrollpane.min.js"></script>
	
	<!--instantiate after some browser sniffing to rule out webkit browsers-->
	<script type="text/javascript">
	  jOBJ = jquery.noConflict();	
	  jOBJ(document).ready(function () {
	      if (!jOBJ.browser.webkit) {
	          jOBJ('.container1').jScrollPane();
	      }
	  });
	
	</script>

<?php echo $footer; ?>
