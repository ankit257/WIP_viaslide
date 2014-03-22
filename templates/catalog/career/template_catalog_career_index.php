<?php echo $header; echo $banner; echo $fixbuttons; ?>
<link href="<?php echo THEMEPATH; ?>SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<div class="page">
	<div class="container">

        <div class="container-right">
                <h1><?php echo $heading; ?></h1>
                <?php if($careers) : ?>
                <div id="Accordion1" class="Accordion" tabindex="0">
				  <?php foreach($careers as $career) { ?>
                  <div class="AccordionPanel">
                    <div class="AccordionPanelTab"><?php echo $career[title]; ?></div>
                    <div class="AccordionPanelContent">
	                    <h4>Required Skills</h4>
                        <?php echo $career[content]; ?>
						<p><a href="index.php?route=career/apply&applied_for=<?php echo $career[title]; ?>">Apply Now</a></p>
						<br />
                    </div>
                  </div>
				  <?php }//End Foreach ?>
                </div>
                <?php endif; ?>
        </div>
        
        <div class="container-left">
			<img src="<?php echo THEMEPATH; ?>images/career.jpg" width="325" height="212">
		<?php echo $testimonials; echo $right; ?>
        </div>

	</div>
</div>

<script src="<?php echo THEMEPATH; ?>SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<script type="text/javascript">
  var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>
  

<?php echo $footer; ?>