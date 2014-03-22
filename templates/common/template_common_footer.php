    <!--start footer-->
<?php 
//$end = microtime();
//$creationtime = ($end - $start) / 1000;
//printf("Page created in %.5f seconds.", $creationtime);
?>   
<style type="text/css">
    .footerLinks>li>a{
        padding: 12px;
        border: 2px solid #3a3a3b;
    }
    .footerLinks>li{
        display:inline-block;
        float: left;
        margin: 20px;
        
    }
    .footerLinks>li>a:hover{
        border: 2px solid #fff;
    }
    .footerLinks>li>a:active{
        background: #272727;
    }
/*
.footer-main:before{
    content: "";
    width:8em;
    height:8em;
    border: #7fc04c 12px solid;
    border-radius:8em;
    margin:0 auto;
    position:relative;
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
    transition: all 1s ease;
}
*/
/*
.footer-main:before{
    content: "";
    width: 8em;
    height: 8em;
    border: #7fc04c 12px solid;
    border-radius: 50%;
    position: absolute;
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
    transition: all 1s ease;
    left: 47%;
    margin: 0 auto;
    top: -2em;
    z-index: -9;
}
.footer-main:before:hover{
    content: "";
    width:8em;
    height:8em;
    border: #7fc04c 12px solid;
    border-radius:8em;
    margin-top:-4em;
    position:relative;
    top: 4em;
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
    transition: all 1s ease;
}
*/
/*
.footer #button:hover{
    width:35px;
    height:35px;
    border: #3A3A3A 12px solid;
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
    transition: all 1s ease;
    position:relative;
}*/
.footer {
    bottom:0;
    left:0;
    position:fixed;
    width: 100%;
    height: 4em;
    overflow:hidden;
    margin:0 auto;
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
    transition: all 1s ease;
    z-index: 99;
}
/*
.footer:hover {
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
    transition: all 1s ease;
    height: 10em;
}
*/
.footer #container{
    margin-top:5px;
    width:100%;
height:100%;
  position:relative;
  top:0;
  left:0;
    background: #3A3A3A;
}
.footer #cont{
  position:relative;
  top:-45px;
  right:190px;
    width:150px;
    height:auto;
    margin:0 auto;
}
.footer_center{
    width:500px;
    float:left;
  text-align:center;
}
.footer h3{
    font-family: 'Helvetica';
    font-size: 30px;
    font-weight: 100;
    margin-top:70px;
    margin-left:40px;
}
.footer-main{
    background: rgba(0,0,0,0.9);
    height: 4em;
    position: relative;
}
/*
#sp-links   { padding-top:10px; text-align:center; margin-right: 1em;}

*/
#sp-links a { color:#FFF; display:inline-block; font-size:20px; height:34px; margin:0 10px; padding-top:10px; width:34px;
}

  .sp-facebook { background:#43609C; }
  .sp-twitter  { background:#1CC1F7; }
  .sp-google   { background:#DD4C3B; }

.footer-links-ul {
padding-left: 1.5em;
float: left;
padding-top: 10px;
}
.footer-links-ul li{
    list-style: none;
    vertical-align: middle;
    /*padding: 6px;*/
}

  .icon-stack-perspective{
    width: 34px;
    height: 34px;
    position: relative;
    -webkit-perspective: 800;
    -moz-perspective: 800px;
    -ms-perspective: 800;
    perspective: 800;
    -webkit-perspective-origin: 50% 50%;
    -moz-perspective-origin: 50% 50%;
    -ms-perspective-origin: 50% 50%;
    perspective-origin: 50% 50%;
  }
    #sp-links span{
    position: absolute;
    width: 34px;height: 34px;
    padding: 9px;
    -webkit-transform-origin: 50% 50% 0;
  -moz-transform-origin: 50% 50% 0;
  -ms-transform-origin: 50% 50% 0;
  transform-origin: 50% 50% 0;
  -webkit-transition: all 0.25s ease-in-out;
  -moz-transition: all 0.25s ease-in-out;
  -ms-transition: all 0.25s ease-in-out;
  transition: all 0.25s ease-in-out;
}

.icon-stack{
  width: 34px;
  position: absolute;
  margin: 0 auto;
  -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  -ms-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-transition: all 0.25s ease-in-out;
  -moz-transition: all 0.25s ease-in-out;
  -ms-transition: all 0.25s ease-in-out;
  transition: all 0.25s ease-in-out;
}
.pre{
  -webkit-transform: translateZ(17px);
  -moz-transform: translateZ(17px);
  -ms-transform: translateZ(17px);
  transform: translateZ(17px);
}
.pa{
  -webkit-transform: rotateY(-90deg) translateZ(17px);
  -moz-transform: rotateY(-90deg) translateZ(17px);
  -ms-transform: rotateY(-90deg) translateZ(17px);
  transform: rotateY(-90deg) translateZ(17px);
}
.fut{
  -webkit-transform: rotateY(90deg) translateZ(17px);
  -moz-transform: rotateY(90deg) translateZ(17px);
  -ms-transform: rotateY(90deg) translateZ(17px);
  transform: rotateY(90deg) translateZ(17px);
}
</style>
</div>
<!--END CONTAINER-->
<?/*
<div id="footer">
        	<div class="pull-left">
            	<ul class="footerLinks">
                	<li><a href="<?php//  echo DOCROOT;?>aboutus">About Us</a></li>
                    <!--<li><a href="index.php?route=information/information&id=60">FAQs</a></li>-->
                    <!--li><a href="index.php?route=faq/index">FAQs</a></li-->
                    <li><a href="<?php// echo DOCROOT;?>terms">Terms of Use</a></li>
                    <li><a href="<?php // echo DOCROOT;?>privacy">Privacy Statement</a></li>
                    <!--<li><a href="index.php?route=information/information&id=63">XML</a></li>-->
                    <li><a href="<?php // echo DOCROOT;?>sitemap">Sitemap</a></li>
                </ul>
    		</div>
            <div class="pull-right">
            	<ul class="footerLinks">
                	<li><a href="http://www.facebook.com/viaslide"><img src="<?php echo DOCROOT.THEMEPATH; ?>images/fb.png" width="34" height="34" /></a></li>
                    <!--li><a href="#"><img src="<?php // echo DOCROOT.THEMEPATH; ?>images/twit.png" width="34" height="34" /></a></li>
                    <li><a href="#"><img src="<?php // echo DOCROOT.THEMEPATH; ?>images/linked.png" width="34" height="34" /></a></li-->
                    <li><a href="#"><img src="<?php //echo DOCROOT.THEMEPATH; ?>images/google.png" width="34" height="35" /></a></li>
                    <li>Via Slide &copy; 2013  </li>
                </ul>
            	<!--<div class="emarketz">
                <a href="http://www.emarketz.net/" target="_blank">Emarketz India Pvt. Ltd. </a>
                </div>-->
      </div>
    <!--end footer-->
</div>
*/?> 
<div class="footer">
  <div id="button"></div>
    <div class="footer-main">
    <div class="pull-left">
        <ul class="footer-links-ul">
            <li><a href="<?php echo DOCROOT;?>aboutus">About</a></li>
            <!--<li><a href="index.php?route=information/information&id=60">FAQs</a></li>-->
            <!--li><a href="index.php?route=faq/index">FAQs</a></li-->
            <li><a href="<?php echo DOCROOT;?>terms">Terms</a></li>
            <!--li><a href="<?php echo DOCROOT;?>privacy">Privacy Statement</a></li>
            <li><a href="<?php echo DOCROOT;?>career">Careers</a></li>
            <li><a href="index.php?route=information/information&id=63">XML</a></li>-->
            <!--li><a href="<?php// echo DOCROOT;?>sitemap">Sitemap</a></li-->
        </ul>
        <ul class="footer-links-ul">
            <li><a href="#" data-toggle="overlay" data-id="submitFeedback">Submit Feedback</a></li>
            <li><a href="#"  data-toggle="overlay" data-id="submitFeedback">Report Issue</a></li>
        </ul>
    </div>
    <div class="pull-right">
    <div id="sp-links">
    <a id="" href="https://www.facebook.com/viaslide">
    <div class="icon-stack-perspective">
        <div class="icon-stack">
        <span class="social-icon sp-facebook icon-active pre fa fa-facebook"></span>
        <span class="social-icon sp-facebook icon-pre fut fa fa-facebook"></span>
      </div>
    </div>
      <!--span class="fa fa-facebook"></span-->
    </a>

    <a id="" href="https://www.twitter.com/viaslide">
    <div class="icon-stack-perspective">
        
        <div class="icon-stack">
        <span class="social-icon sp-twitter icon-active pre fa fa-twitter"></span>
        <span class="social-icon sp-twitter icon-pre fut fa fa-twitter"></span>
      </div> 
    <!--span class="fa fa-twitter"></span-->
    </div>
    </a>
    <a id="sp-google" href="https://plus.google.com/+Viaslide">
    <div class="icon-stack-perspective">
        <!--span class="fa fa-google-plus"></span-->
        <div class="icon-stack">
        <span class="social-icon sp-google icon-active pre fa fa-google-plus"></span>
        <span class="social-icon sp-google icon-pre fut fa fa-google-plus"></span>
      </div> 
    </div>
    </a>
</div>
 <script type="text/javascript">
 function cssTransform(){    
        var prop = ['WebkitTransform','MozTransform','msTransform','OTransform','transform'];
        for (var i = prop.length - 1; i >= 0; i--) {
            if(prop[i] in document.body.style){
                return prop[i];
            }
        };   
    }
  $('.icon-stack-perspective').hover(function(){
    var t = cssTransform();
    $(this).find('.icon-stack').css(t, 'rotateY(-90deg)');
    },function(){
    var t = cssTransform();
    $(this).find('.icon-stack').css(t, '');
  });
  </script>
<?/*
        <ul class="footerLinks">
            <li><a href="http://www.facebook.com/viaslide"><img src="<?php echo DOCROOT.THEMEPATH; ?>images/fb.png" width="34" height="34" /></a></li>
            <!--li><a href="#"><img src="<?php // echo DOCROOT.THEMEPATH; ?>images/twit.png" width="34" height="34" /></a></li>
            <li><a href="#"><img src="<?php // echo DOCROOT.THEMEPATH; ?>images/linked.png" width="34" height="34" /></a></li-->
            <li><a href="#"><img src="<?php //echo DOCROOT.THEMEPATH; ?>images/google.png" width="34" height="35" /></a></li>
            <li>Via Slide &copy; 2013  </li>
        </ul>
        */?>
    </div>
</div>
                <!--<div class="emarketz">
                <a href="http://www.emarketz.net/" target="_blank">Emarketz India Pvt. Ltd. </a>
                </div>-->
      
<!--/div>
</div-->
</div>
</div>
<!--end wrapper-->
</body>
</html>