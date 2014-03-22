<style>
.panel-wrapper h1 {
	font-size:24px;
	font-family:'VodafoneRg';
	text-align:left;
	color:#d91b5c;
	width:auto;
	float:left;
	margin-right:10px;
}
.panel-wrapper h3 {
	font-size:20px;
	font-family:'VodafoneRg';
	text-align:left;
	color:#fff;
}
.panel-wrapper p {
	font-size:14px;
	font-family:Arial, Helvetica, sans-serif;
	text-align:left;
	color:#696969;
	font-weight:bold;
	width:100%;
	float:left;
}
</style>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo THEMEPATH;?>css/liquid-slider.css">
<link href="<?php echo THEMEPATH;?>css/style.css" rel="stylesheet" type="text/css" />

    <!-- This is just styling for the demo to make it a little less crowded at the top -->



    <!-- Liquid Slider relies on jQuery and easing effects-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?php echo THEMEPATH;?>js/jquery.easing.1.3.js"></script>

    <!-- Optional code for enabling touch -->
    <script src="<?php echo THEMEPATH;?>js/jquery.touchSwipe.min.js"></script>

    <!-- This is Liquid Slider code. The full version (not .min) is also included in the js directory -->
    <script src="<?php echo THEMEPATH;?>js/jquery.liquid-slider-custom.min.js"></script>

    <title>Liquid Slider</title>

    <script>
    $(function(){

      /* Here is the slider using default settings */
      $('#slider-id').liquidSlider({
            autoSlide:true,
            autoHeight:true
          });
	  
	  


      /* If you want to adjust the settings, you set an option
         as follows:

          $('#slider-id').liquidSlider({
            autoSlide:false,
            autoHeight:false
          });

         Find more options at http://liquidslider.kevinbatdorf.com/
      */

      /* If you need to access the internal property or methods, use this:

      var sliderObject = $.data( $('#slider-id')[0], 'liquidSlider');
      console.log(sliderObject);

      */


    });
    </script> 
    
    
<div class="liquid-slider"  id="slider-id">
	<?php echo $content; ?>
</div>