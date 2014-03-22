<link href="<?php echo THEMEPATH; ?>SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<div class="page">
	<div id="main">
                <h1 class="main-title"><?php echo $heading; ?></h1>
                <p></p>
                <?php if($faqs) : ?>
                <div id="Accordion1" class="Accordion" tabindex="0">
				  <?php foreach($faqs as $faq) { ?>
                  <div class="AccordionPanel">
                    <div class="AccordionPanelTab"><?php echo $faq['question']; ?></div>
                    <div class="AccordionPanelContent">
                        <?php echo $faq['answer']; ?>
                    </div>
                  </div>
				  <?php }//End Foreach ?>
                </div>
                <?php endif; ?>
	</div>
</div>

<script src="<?php echo THEMEPATH; ?>SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<script type="text/javascript">
  var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>
  