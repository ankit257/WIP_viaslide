<div class="our-clients">
	<h1><?php echo $heading; ?></h1>
    
    <?php if($testimonials) : ?>
    <div id="news-container">
    	<ul style="width:100%;">
			<?php foreach($testimonials as $testi) { ?>
            <li><?php echo $testi[content]; ?><br /><?php echo "- ". $testi[posted_by]; ?></li>
            <?php } ?>
		</ul>
	</div>

	<div class="view-more"><a href="index.php?route=testimonial">View More...</a></div>
    <?php endif; ?>
</div>

<script src="<?php echo THEMEPATH; ?>js/jquery.featureCarousel.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo THEMEPATH; ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo THEMEPATH; ?>js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        start: 3
    });
});
</script>

<script>jQuery.noConflict();</script>
<script type="text/javascript">
	$(function(){
		$('#news-container').vTicker({ 
			speed:1000,
			pause: 3000,
			animation: 'fade',
			mousePause: true,
			showItems: 3,
			
		});
			
	});
</script>