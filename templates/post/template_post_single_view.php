<!DOCTYPE html>
<html>
<head>
    <title>
        
    </title>

<link rel="stylesheet" type="text/css" href="<?php echo DOCROOT.THEMEPATH; ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOCROOT.THEMEPATH; ?>assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOCROOT.THEMEPATH; ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOCROOT.THEMEPATH; ?>header.css">
    <link rel="stylesheet" href="<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/normalize.css">
    <script src="<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/jquery-2.1.0.min.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />

<style type="text/css">
#backgrounds{
position: absolute;
width: 100%;
height: 100%; 
margin: 0 auto;
-webkit-transform-style: preserve-3d;
-moz-transform-style: preserve-3d;
-ms-transform-style: preserve-3d;
transform-style: preserve-3d;
 -webkit-perspective: 900px; 
-moz-perspective: 900px;
-ms-perspective: 900px;
perspective: 900px;
}
.background{
    -webkit-transition: all 1.0s ease-in-out;
    -moz-transition: all 1.0s ease-in-out;
    -ms-transition: all 1.0s ease-in-out;
    transition: all 1.0s ease-in-out;
}
.present{
    opacity: 1;
}
.past, .future{
opacity: 0;

}
#background2.past{
-webkit-transform-origin: 0% 0%;
-moz-transform-origin: 0% 0%;
-ms-transform-origin: 0% 0%;
transform-origin: 0% 0%;
-webkit-transform:  rotateX(90deg) translate3d(0,-100%,0);
-moz-transform: rotateX(90deg) translate3d(0,-100%,0);
-ms-transform: rotateX(90deg) translate3d(0,-100%,0);
transform: rotateX(90deg) translate3d(0,-100%,0);
}
#background3.future{
-webkit-transform-origin: 0% 0%;
-moz-transform-origin: 0% 0%;
-ms-transform-origin: 0% 0%;
transform-origin: 0% 0%;
-webkit-transform:translate3d(0,100%,0) rotateX(90deg);
-moz-transform:translate3d(0,100%,0) rotateX(90deg);
-ms-transform: translate3d(0,100%,0) rotateX(90deg);
transform: translate3d(0,100%,0) rotateX(90deg);
}
#background1.past{
    -webkit-transform-origin: 100% 0%;
-moz-transform-origin: 100% 0%;
-ms-transform-origin: 100% 0%;
transform-origin: 100% 0%;
-webkit-transform:  translate3d(-100%,0,0) rotateY(-90deg) translate3d(-100%,0,0);
-moz-transform:  translate3d(-100%,0,0) rotateY(-90deg) translate3d(-100%,0,0);
-ms-transform:  translate3d(-100%,0,0) rotateY(-90deg) translate3d(-100%,0,0);
transform:  translate3d(-100%,0,0) rotateY(-90deg) translate3d(-100%,0,0);
}
#background2.future{
-webkit-transform-origin: 0% 0%;
-moz-transform-origin: 0% 0%;
-ms-transform-origin: 0% 0%;
transform-origin: 0% 0%;
-webkit-transform: translate3d(100%,0,0) rotateY(90deg) translate3d(100%,0,0);
-moz-transform: translate3d(100%,0,0) rotateY(90deg) translate3d(100%,0,0);
-ms-transform:  translate3d(100%,0,0) rotateY(90deg) translate3d(100%,0,0);
transform:  translate3d(100%,0,0) rotateY(90deg) translate3d(100%,0,0);
}

.background{
    position: absolute;
    margin: 0 auto;
    -moz-
}
#commentsBox{
    width: 400px;
    display: inline-block;
    float: left;   
}
#slideshowSection{
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 1;
}
.arrowCtls{
  z-index: 99;
  top:50%;
  position: absolute;
  cursor: pointer;
  transition:0.3s ease-in-out;
  -webkit-transition:0.3s ease-in-out;
  -o-transition:0.3s ease-in-out;
  -ms-transition:0.3s ease-in-out;
  -moz-transition:0.3s ease-in-out;
}
.arrow-right{
  right: 0.5em;
}
.arrow-left{
  left: 0.5em;
}
.arrowCtls:hover{
  -webkit-transform:scale3d(1.4,0.8,0.2);
  -ms-transform:scale3d(1.4,0.8,0.2);
  -o-transform:scale3d(1.4,0.8,0.2);
  -moz-transform:scale3d(1.4,0.8,0.2);
  transform:scale3d(1.4,0.8,0.2);
  transition:0.3s ease-in-out;
  -webkit-transition:0.3s ease-in-out;
  -o-transition:0.3s ease-in-out;
  -ms-transition:0.3s ease-in-out;
  -moz-transition:0.3s ease-in-out;
}
#preSlide{
    /*left: 0px;*/
}
#nxtSlide{
    /*right: 0px;*/
}
.slideProgress{
    width:100%; 
    height:0.2em;
    position: absolute;
    bottom: 0;
}
.slideProgress>div{
    height: 100%;
}
.statusComplete{
    background: #7fc04c;
}
.slideCarousels{
    padding: .8em;
}
.slideCarousels>li{
    display: inline-block;
    list-style: none;
    height: 0.8em;
    width: 0.8em;
    background: green;
    margin: 0.8em;
    cursor: pointer;
}
.container{
    padding-top: 60px;
}
.div-center{
    width: 80%;
    margin: 0px auto;
}
.tag-button{
    background: none;
    vertical-align: baseline;
    padding: 0.25em;
    font-size: 1.25em;
    vertical-align: baseline;
    color: #272727 !important;
    background: rgba(230,230,230,0.75);
    text-decoration: none;
    transition:0.3s ease-in-out;
}
.tag-button:hover{
    background: rgba(200,200,200,0.75);
    transition:0.3s ease-in-out;
}
.tag-div{
    background: none;
    vertical-align: baseline;
    margin-top: 0.75em;
    margin-bottom: 0.75em;
    padding: 0.5em 2em 0.5em 2em;
    font-size: 1.25em;
    color: #272727 !important;
    vertical-align: baseline;
}
.slideLine{
    position: absolute;
    bottom: 0px;
    width: 100%;
    z-index: 10;
}
.boxStripInfo{
    position: absolute;
    bottom: 0px;
    transition: color 0.3s ease 0s, bottom 0.3s ease 0s;
    -webkit-transition: color 0.3s ease 0s, bottom 0.3s ease 0s;
    -moz-transition: color 0.3s ease 0s, bottom 0.3s ease 0s;
    -ms-transition: color 0.3s ease 0s, bottom 0.3s ease 0s;
}
.boxStripAddInfo{
    position: absolute;
}
.related-header{
    padding: 20px;
}
.media{
    padding: 1em;
    margin: 1em;
    background: rgba(245,245,245,0.9);
}
.media-heading{
    margin-bottom: 0;
}
.related{
    margin-top: 20px;
}
.active{
    display: block;
}
.comment-user-title{
    text-decoration: none;
    color:#272727;
}
.background{
    background-position: 50% 50%;
}
.container-slide{
    padding-top: 60px;
}
.slideshow{
    position: relative;
}
.textBox{
    width: 960px;
    height: 700px;
}
#slides{
    transform-style: preserve-3d;
}
.textBox{
    transform-style: preserve-3d;   
}
#backgrounds{
    width: 100%;
    height: 100%;
}

.slideLine{
    position: absolute;
    bottom: 0px;
    width: 100%;
}
.slideshow{
    overflow: hidden;
}
body{
    background: #000;
}
</style>
</head>
<body>
    <div class="slideshow">
            <i id="preSlide" class="fa fa-angle-left fa-5x arrowCtls arrow-left"  onclick="Slider.prevSlide();" title="Previous"></i>
            <div id="slideshowSection" class="play">
                <?php echo $postdata['main']['content'];?>
                <div class="slideLine">
                    <div class="slideProgress">
                        <div class="statusComplete"></div><div class="statusIncomplete"></div>
                    </div>
                </div>
            </div>
            <i id="nxtSlide" class="fa fa-angle-right fa-5x arrowCtls arrow-right"  onclick="Slider.nextSlide();" title="Next"></i>
        </div>
<script type="text/javascript">
var Slider = (function(){
    var activeId = 1;
    function initSlideshow(){
        var count = 1;
        $("#slides section").each(function(){
            var id = $(this).attr('id');
            $("#"+id+" .slideshowContent").each(function(){
                if(count==1){
                    $(this).addClass('animate-in');
                }
                else{
                    $(this).addClass('animate-out');
                }
            });
            count++;
        });
        var count = 1;
        $("#backgrounds section").each(function(){
            if(count == 1){
                $(this).addClass('present');
            }
            else{
                $(this).addClass('future');
            }
            count++;
        });
        var editable_elements = document.querySelectorAll("[contenteditable=true]");
        var e = editable_elements.length;
        for (var i = e - 1; i >= 0; i--) {
            editable_elements[i].setAttribute("contentEditable", false);
        };
    }
    function cssTransform(){    
            var prop = ['WebkitTransform','MozTransform','msTransform','OTransform','transform'];
            for (var i = prop.length - 1; i >= 0; i--) {
                if(prop[i] in document.body.style){
                    return prop[i];
                }
            };   
    }
    function calculateZoom(){
        var ww = $('.home-slideshow').width();
        var wh = $(window).height();
        var sx = $('.slide-header').height()+120;
        var sh = wh - sx;
        ww = ww-30;
        //$('.slideshow').css('width', );
        var sw = (sh*9.6)/7;
        $(".slideshow").css('height','inherit');
        $(".slideshow").css('width','inherit');
        var wr = ww/960;
        var hr = sh/700;
        var cd = cssTransform();
        var k;
        if(wr>=hr){
            k = hr;
            //$(".textBox").css('margin-top', 0);
        }else{
           // $(".textBox").css('margin-left', 0);
            //k = wr;
        }
        if('zoom' in document.body.style){
            $(".textBox").css('zoom', k);
        }
        else{
            $(".textBox").css(cd, 'translate(0%, -50%) scale('+k+') translate(0%, 50%)');
        }
    }
    function createCSS(){
      var styles = '';
      var css = document.createElement('style');
      css.type = 'text/css';
      $("#slides section").each(function(){
        var id = $(this).attr('id');
        $("#"+id+" .slideshowContent").each(function(){
            var z = $(this).attr('data-item');
            $(this).addClass(z);
            var n = z.split('-');
            var top = $(this).css('top');
            $(this).css('top','');
            var left = $(this).css('left');
            $(this).css('left','');
                var y = $(this).attr('data-effect');
                if(y=='top'){
                  styles += '#'+id+' .'+z+'.animate-in{left: '+left+'; top: '+top+'; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: '+n[1]*(0.5)+'s; -moz-transition-duration: '+n[1]*(0.5)+'s; -o-transition-duration: '+n[1]*(0.5)+'s; -ms-transition-duration: '+n[1]*(0.5)+'s; transition-duration: '+n[1]*(0.5)+'s; z-index: '+n[1]+';}\n';
                  styles += '#'+id+' .'+z+'.animate-out{left: '+left+'; top: 120%; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: '+n[1]*(0.5)+'s; -moz-transition-duration: '+n[1]*(0.5)+'s; -o-transition-duration: '+n[1]*(0.5)+'s; -ms-transition-duration: '+n[1]*(0.5)+'s; transition-duration: '+n[1]*(0.5)+'s; z-index: '+n[1]+';}\n';
                }
                else if(y=='bottom'){
                  styles += '#'+id+' .'+z+'.animate-in{left: '+left+'; top: '+top+'; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: '+n[1]*(0.5)+'s; -moz-transition-duration: '+n[1]*(0.5)+'s; -o-transition-duration: '+n[1]*(0.5)+'s; -ms-transition-duration: '+n[1]*(0.5)+'s; transition-duration: '+n[1]*(0.5)+'s; z-index: '+n[1]+';}\n';
                  styles += '#'+id+' .'+z+'.animate-out{left: '+left+'; top: -120%; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: '+n[1]*(0.5)+'s; -moz-transition-duration: '+n[1]*(0.5)+'s; -o-transition-duration: '+n[1]*(0.5)+'s; -ms-transition-duration: '+n[1]*(0.5)+'s; transition-duration: '+n[1]*(0.5)+'s; z-index: '+n[1]+';}\n';
                }
                else if(y=='left'){
                  styles += '#'+id+' .'+z+'.animate-in{left: '+left+'; top: '+top+'; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: '+n[1]*(0.5)+'s; -moz-transition-duration: '+n[1]*(0.5)+'s; -o-transition-duration: '+n[1]*(0.5)+'s; -ms-transition-duration: '+n[1]*(0.5)+'s; transition-duration: '+n[1]*(0.5)+'s; z-index: '+n[1]+';}\n';
                  styles += '#'+id+' .'+z+'.animate-out{left: 120%; top: '+top+'; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: '+n[1]*(0.5)+'s; -moz-transition-duration: '+n[1]*(0.5)+'s; -o-transition-duration: '+n[1]*(0.5)+'s; -ms-transition-duration: '+n[1]*(0.5)+'s; transition-duration: '+n[1]*(0.5)+'s; z-index: '+n[1]+';}\n';
                }
                else if (y=='right') {
                  styles += '#'+id+' .'+z+'.animate-in{left: '+left+'; top: '+top+'; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: '+n[1]*(0.5)+'s; -moz-transition-duration: '+n[1]*(0.5)+'s; -o-transition-duration: '+n[1]*(0.5)+'s; -ms-transition-duration: '+n[1]*(0.5)+'s; transition-duration: '+n[1]*(0.5)+'s; z-index: '+n[1]+';}\n';
                  styles += '#'+id+' .'+z+'.animate-out{left: -120%; top: '+top+'; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: '+n[1]*(0.5)+'s; -moz-transition-duration: '+n[1]*(0.5)+'s; -o-transition-duration: '+n[1]*(0.5)+'s; -ms-transition-duration: '+n[1]*(0.5)+'s; transition-duration: '+n[1]*(0.5)+'s; z-index: '+n[1]+';}\n';
                }
              else{
                styles += '#'+id+' .'+z+'.animate-in{left: '+left+'; top: '+top+'; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: '+n[1]*(0.5)+'s; -moz-transition-duration: '+n[1]*(0.5)+'s; -o-transition-duration: '+n[1]*(0.5)+'s; -ms-transition-duration: '+n[1]*(0.5)+'s; transition-duration: '+n[1]*(0.5)+'s; z-index: '+n[1]+';}\n';
                styles += '#'+id+' .'+z+'.animate-out{left: '+left+'; top: '+top+'; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: '+n[1]*(0.5)+'s; -moz-transition-duration: '+n[1]*(0.5)+'s; -o-transition-duration: '+n[1]*(0.5)+'s; -ms-transition-duration: '+n[1]*(0.5)+'s; transition-duration: '+n[1]*(0.5)+'s; z-index: '+n[1]+';}\n';
                }
            });
        });

        if (css.styleSheet) css.styleSheet.cssText = styles;
        else css.appendChild(document.createTextNode(styles));
        document.getElementsByTagName("head")[0].appendChild(css);
    }
    function chckArrows(){
      var x = countSlides();
      if(activeId == 1){
        $("#preSlide").hide();
      }
      else{
       $("#preSlide").show();
      }
      if(activeId == x){
        $("#nxtSlide").hide();
      }else{
        $("#nxtSlide").show();
      }
    }
    function nextSlide(){
        $('.present').removeClass('present');
    if(activeId!=countSlides()){
            $("#slide"+activeId+" .slideshowContent").each(function(){
                $(this).removeClass('animate-in');
                $(this).addClass('animate-out');
            });
            $("#background"+activeId).addClass('past');
            activeId = activeId + 1;
            $("#background"+activeId).removeClass('future');
            $("#background"+activeId).addClass('present');
            $("#slide"+activeId+" .slideshowContent").each(function(){
                $(this).removeClass('animate-out');
                $(this).addClass('animate-in');
            });
            chckArrows();
            checkProgress();        
        }
    }
    function prevSlide(){
        $('.present').removeClass('present');
        if(activeId!=1){
            $("#slide"+activeId+" .slideshowContent").each(function(){
                $(this).removeClass('animate-in');
                $(this).addClass('animate-out');
            });
            $("#background"+activeId).addClass('future');
            activeId = activeId - 1;
            $("#background"+activeId).removeClass('past');
            $("#background"+activeId).addClass('present');
            $("#slide"+activeId+" .slideshowContent").each(function(){
                $(this).removeClass('animate-out');
                $(this).addClass('animate-in');
            });
            chckArrows(); 
            checkProgress();
        }
    }
    function checkProgress() {
        var x = countSlides();
        var c = ((x-activeId)*100)/x;
        var v = (activeId*100)/x;
        $(".statusComplete").css('width',v+"%");
        $(".statusIncomplete").css('width',c+"%");
    }
    function countSlides(){
        var intx = 0;
        $("#slides section").each(function(){
            intx = intx+1;
        });
        return intx;
    }
    var cd = 0;
    function playSlideShow(t) {
            if(t){
                var a = t;
            }
            else{
                var a = $("#slide"+activeId).attr('data-slideT'); 
            }
            setTimeout(function(){
            var bool = $("#slideshowSection").hasClass("play");
            if(bool===true){
                nextSlide();
                cd = 0;
                playSlideShow(a);
            }
            },a);   
    }
    return{
            initSlideshow: initSlideshow,
            nextSlide: nextSlide,
            prevSlide: prevSlide,
            calculateZoom: calculateZoom,
            chckArrows: chckArrows,
            checkProgress: checkProgress,
            createCSS: createCSS,
            nextSlide: nextSlide,
            prevSlide: prevSlide,
        };

})();
//Slider.initSlideshow();

$(document).ready(function(){
    $('.past').removeClass('past');
    $('.present').removeClass('present');
    $('.future').removeClass('future');
    Slider.calculateZoom();
    Slider.initSlideshow();
    Slider.chckArrows();
    Slider.checkProgress();
    Slider.createCSS();
   $(".slideCarousels li").on('click', function () {
       if(($this).hasClass('activeLi')){
       }else{
        $('.activeLi').removeClass('activeLi');
        $(this).addClass('activeLi');
        var a = $(this).attr('data-slideNo');
        gotoSlide(a);
       }
   });
});
$(document).keyup(function(e){
    if(e.keyCode == 37){
        Slider.prevSlide();
    }
    if(e.keyCode == 39){
        Slider.nextSlide();
    }
});
$("#slideshowSection").hover(function(){
        $("#slideshowSection").removeClass('play');
        $("#slideshowSection").addClass('paused');
    },
    function(){
        $("#slideshowSection").addClass('play');
        $("#slideshowSection").removeClass('paused');
});
</script>
</body>
</html>
