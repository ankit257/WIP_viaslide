<link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>css/style-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>css/custom.css" />
<script type="text/javascript" src="<?php echo THEMEPATH; ?>js/modernizr.custom.79639.js"></script>

<div class="banner-top"></div>
<div class="banner">
  
  <div class="container demo-2">
    <div id="slider" class="sl-slider-wrapper">
        <div class="sl-slider">
        <?php for($i=1; $i<=5; $i++) { ?>
          <div class="sl-slide" data-orientation="<?php echo $i%2==0 ? 'horizontal' : 'vertical' ; ?>" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-<?php echo $i; ?>"></div>

			<?php if ($i==1) : ?>
			  <blockquote><h2>The <span style="color:#3ac0da">peace of mind you deserve!</span>      Call us <span style="color:#3ac0da; font-size:16px;">480 - 447- 3502</span></h2></blockquote>
            <?php elseif ($i==2) : ?> 
              <blockquote><h2>Our <span style="color:#3ac0da">experienced</span> EVS staff and <span style="color:#3ac0da">our VeriClean</span> system will help you cut overtime &amp; save money</h2></blockquote>
            <?php elseif ($i==3) : ?>  
              <blockquote><h2>Boost your <span style="color:#3ac0da">productivity</span> and reduce <span style="color:#3ac0da">cost</span> with our unique <span style="color:#3ac0da">Staffing</span> and <span style="color:#3ac0da">Management</span> Solution</h2></blockquote>
            <?php elseif ($i==4) : ?>  
              <blockquote><h2><span style="color:#3ac0da">Flexible</span> cleaning programs and <span style="color:#3ac0da">prices</span> to fit any budget….more than just a <span style="color:#3ac0da">maid</span> service</h2></blockquote>
            <?php elseif ($i==5) : ?>  
              <blockquote><h2><span style="color:#3ac0da">Let us</span> take care of your <span style="color:#3ac0da">home</span> or office cleaning, giving you <span style="color:#3ac0da">more time</span> for other important things</h2></blockquote>
            <?php endif; ?>  
            </div>
          </div>
        <?php } ?>
        </div>
        
        <nav id="nav-dots" class="nav-dots">
	  	  <span class="nav-dot-current"></span>
		  <span></span>
		  <span></span>
  		  <span></span>
		  <span></span>
		</nav>
        
    </div>
  </div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo THEMEPATH; ?>js/jquery.ba-cond.min.js"></script>
		<script type="text/javascript" src="<?php echo THEMEPATH; ?>js/jquery.slitslider.js"></script>
		<script type="text/javascript">	
			$(function() {
			
				var Page = (function() {

					var $nav = $( '#nav-dots > span' ),
						slitslider = $( '#slider' ).slitslider( {
							onBeforeChange : function( slide, pos ) {

								$nav.removeClass( 'nav-dot-current' );
								$nav.eq( pos ).addClass( 'nav-dot-current' );

							}
						} ),

						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							$nav.each( function( i ) {
							
								$( this ).on( 'click', function( event ) {
									
									var $dot = $( this );
									
									if( !slitslider.isActive() ) {

										$nav.removeClass( 'nav-dot-current' );
										$dot.addClass( 'nav-dot-current' );
									
									}
									
									slitslider.jump( i + 1 );
									return false;
								
								} );
								
							} );

						};

						return { init : init };

				})();

				Page.init();

				/**
				 * Notes: 
				 * 
				 * example how to add items:
				 */

				/*
				
				var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');
				
				// call the plugin's add method
				ss.add($items);

				*/
			
			});
		</script>