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
.container{
    padding-top: 60px;
}
.div-center{
    width: 80%;
    margin: 0px auto;
}
.slideLine{
    position: absolute;
    bottom: 0px;
    width: 100%;
    z-index: 10;
}
.background{
    background-position: 50% 50%;
}
.container-slide{
    padding-top: 60px;
}
.slideshow{
    position: relative;
    min-height: 800px;
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
<style type="text/css">
    #slide1 .item-1.animate-in{left: 115.1875px; top: 77px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: 0.5s; -moz-transition-duration: 0.5s; -o-transition-duration: 0.5s; -ms-transition-duration: 0.5s; transition-duration: 0.5s; z-index: 1;}
    #slide1 .item-1.animate-out{left: -120%; top: 77px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: 0.5s; -moz-transition-duration: 0.5s; -o-transition-duration: 0.5s; -ms-transition-duration: 0.5s; transition-duration: 0.5s; z-index: 1;}
    #slide1 .item-2.animate-in{left: 96px; top: 210px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: 1s; -moz-transition-duration: 1s; -o-transition-duration: 1s; -ms-transition-duration: 1s; transition-duration: 1s; z-index: 2;}
    #slide1 .item-2.animate-out{left: 120%; top: 210px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: 1s; -moz-transition-duration: 1s; -o-transition-duration: 1s; -ms-transition-duration: 1s; transition-duration: 1s; z-index: 2;}
    #slide2 .item-1.animate-in{left: 96px; top: 126px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: 0.5s; -moz-transition-duration: 0.5s; -o-transition-duration: 0.5s; -ms-transition-duration: 0.5s; transition-duration: 0.5s; z-index: 1;}
    #slide2 .item-1.animate-out{left: 96px; top: -120%; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: 0.5s; -moz-transition-duration: 0.5s; -o-transition-duration: 0.5s; -ms-transition-duration: 0.5s; transition-duration: 0.5s; z-index: 1;}
    #slide2 .item-2.animate-in{left: 96px; top: 238px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: 1s; -moz-transition-duration: 1s; -o-transition-duration: 1s; -ms-transition-duration: 1s; transition-duration: 1s; z-index: 2;}
    #slide2 .item-2.animate-out{left: -120%; top: 238px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: 1s; -moz-transition-duration: 1s; -o-transition-duration: 1s; -ms-transition-duration: 1s; transition-duration: 1s; z-index: 2;}
    #slide2 .item-3.animate-in{left: 96px; top: 357px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: 1.5s; -moz-transition-duration: 1.5s; -o-transition-duration: 1.5s; -ms-transition-duration: 1.5s; transition-duration: 1.5s; z-index: 3;}
    #slide2 .item-3.animate-out{left: 96px; top: 120%; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: 1.5s; -moz-transition-duration: 1.5s; -o-transition-duration: 1.5s; -ms-transition-duration: 1.5s; transition-duration: 1.5s; z-index: 3;}
    #slide3 .item-1.animate-in{left: 326.390625px; top: 98px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: 0.5s; -moz-transition-duration: 0.5s; -o-transition-duration: 0.5s; -ms-transition-duration: 0.5s; transition-duration: 0.5s; z-index: 1;}
    #slide3 .item-1.animate-out{left: 326.390625px; top: -120%; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: 0.5s; -moz-transition-duration: 0.5s; -o-transition-duration: 0.5s; -ms-transition-duration: 0.5s; transition-duration: 0.5s; z-index: 1;}
    #slide3 .item-2.animate-in{left: 316.796875px; top: 231px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: 1s; -moz-transition-duration: 1s; -o-transition-duration: 1s; -ms-transition-duration: 1s; transition-duration: 1s; z-index: 2;}
    #slide3 .item-2.animate-out{left: 120%; top: 231px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: 1s; -moz-transition-duration: 1s; -o-transition-duration: 1s; -ms-transition-duration: 1s; transition-duration: 1s; z-index: 2;}
    #slide3 .item-3.animate-in{left: 307.1875px; top: 364px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: 1.5s; -moz-transition-duration: 1.5s; -o-transition-duration: 1.5s; -ms-transition-duration: 1.5s; transition-duration: 1.5s; z-index: 3;}
    #slide3 .item-3.animate-out{left: -120%; top: 364px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: 1.5s; -moz-transition-duration: 1.5s; -o-transition-duration: 1.5s; -ms-transition-duration: 1.5s; transition-duration: 1.5s; z-index: 3;}
    #slide3 .item-4.animate-in{left: 316.796875px; top: 504px; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 1;-webkit-transition-duration: 2s; -moz-transition-duration: 2s; -o-transition-duration: 2s; -ms-transition-duration: 2s; transition-duration: 2s; z-index: 4;}
    #slide3 .item-4.animate-out{left: 316.796875px; top: 120%; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)"; filter: alpha(opacity=100); opacity: 0;-webkit-transition-duration: 2s; -moz-transition-duration: 2s; -o-transition-duration: 2s; -ms-transition-duration: 2s; transition-duration: 2s; z-index: 4;}
</style>

<div class="slideshow" style="height: inherit; width: inherit;">
            <i id="preSlide" class="fa fa-angle-left fa-5x arrowCtls arrow-left" onclick="Slider.prevSlide();" title="Previous" style="display: none;"></i>
            <div id="slideshowSection" class="paused">
                     
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                          <div id="slides" class="play"><section id="slide1" class="textBox" data-slidet="6000"><div class="textBlock slideshowContent animate-in item-1" style="background-image: none; position: absolute; font-family: calibri; z-index: 2; height: 18%; width: 77%;" data-item="item-1" data-effect="right"><div class="textBack" style="opacity: 0; background-color: rgb(255, 200, 200); background-position: initial initial; background-repeat: initial initial;"></div><div class="desc" contenteditable="false" style="color:#000000;"><h2 style="text-align: center;"><font color="#f8ffff" size="7"><span style="line-height: 52.79999923706055px;"><b>viaslide</b></span></font></h2></div></div><div class="textBlock slideshowContent animate-in item-2" style="background-image: none; position: absolute; font-family: helvetica; z-index: 2; height: 26%; width: 85%;" data-item="item-2" data-effect="left"><div class="textBack" style="opacity: 0; background-color: rgb(13, 146, 0); background-position: initial initial; background-repeat: initial initial;"></div><div class="desc" contenteditable="false" style="color:#000000;"><div style="text-align: center;"><font color="#ffffff" size="6">a place to create beautiful slideshows</font></div></div></div></section><section id="slide2" class="textBox" data-slidet="6000"><div class="textBlock slideshowContent active animate-out item-1" style="background-image: none; position: absolute; z-index: 3; height: 13%; width: 24%;" data-item="item-1" data-effect="bottom"><div class="textBack" style="opacity: 0.5; background-color: rgb(245, 190, 0); background-position: initial initial; background-repeat: initial initial;"></div><div class="desc" contenteditable="false" style="color:#000000;"><div style="text-align: center;"><font size="7" color="#ffffff"><b>make</b></font></div></div></div><div class="textBlock slideshowContent animate-out item-2" style="background-image: none; position: absolute; z-index: 3; height: 14%; width: 24%;" data-item="item-2" data-effect="right"><div class="textBack" style="opacity: 0.5; background-color: rgb(13, 146, 0); background-position: initial initial; background-repeat: initial initial;"></div><div class="desc" contenteditable="false" style="color:#000000;"><div style="text-align: center;"><font color="#ffffff" size="7"><span style="line-height: 68.5714340209961px;"><b>colorful</b></span></font></div></div></div><div class="textBlock slideshowContent active animate-out item-3" style="background-image: none; position: absolute; z-index: 3; height: 14%; width: 24%;" data-item="item-3" data-effect="top"><div class="textBack" style="opacity: 0.4; background-color: rgb(232, 68, 143); background-position: initial initial; background-repeat: initial initial;"></div><div class="desc" contenteditable="false" style="color:#000000;"><div style="text-align: center;"><span style="line-height: 1.428571429;"><font color="#ffffff" size="7"><b>slides</b></font></span></div></div></div></section><section id="slide3" class="textBox" data-slidet="6000"><div class="textBlock slideshowContent active animate-out item-1" style="background-image: none; position: absolute; z-index: 4; height: 17%; width: 32%;" data-item="item-1" data-effect="bottom"><div class="textBack" style="background-color: rgb(39, 39, 39); opacity: 0; background-position: initial initial; background-repeat: initial initial;"></div><div class="desc" contenteditable="false" style="color:#000000;"><h2 style="text-align:center;"><font color="#ffffff" size="7">apply</font></h2></div></div><div class="textBlock slideshowContent animate-out item-2" style="background-image: none; position: absolute; z-index: 4; height: 18%; width: 35%;" data-item="item-2" data-effect="left"><div class="textBack" style="background-color: rgb(39, 39, 39); opacity: 0; background-position: initial initial; background-repeat: initial initial;"></div><div class="desc" contenteditable="false" style="color:#000000;"><h2 style="text-align:center;"><font color="#ffffff" size="7">different</font></h2></div></div><div class="textBlock slideshowContent animate-out item-3" style="background-image: none; position: absolute; z-index: 4; height: 19%; width: 37%;" data-item="item-3" data-effect="right"><div class="textBack" style="background-color: rgb(39, 39, 39); opacity: 0; background-position: initial initial; background-repeat: initial initial;"></div><div class="desc" contenteditable="false" style="color:#000000;"><h2 style="text-align:center;"><font color="#ffffff" size="7">transition</font></h2></div></div><div class="textBlock slideshowContent active item-4 animate-out" style="background-image: none; position: absolute; z-index: 4; height: 16%; width: 36%;" data-item="item-4" data-effect="top"><div class="textBack" style="background-color: rgb(39, 39, 39); opacity: 0; background-position: initial initial; background-repeat: initial initial;"></div><div class="desc" contenteditable="false" style="color:#000000;"><h2 style="text-align:center;"><font color="#ffffff" size="7">effects</font></h2></div></div></section></div>
              <div id="backgrounds"><section id="background1" class="background present" style="background-image: url(http://localhost/viaslide6/data/slides/391/139434911826430.jpg); background-color: rgb(200, 200, 200); background-size: cover; -webkit-filter: blur(10px);"></section><section id="background2" class="background future" style="background-image: url(http://localhost/viaslide6/data/slides/391/13943492872463.jpg); background-color: rgb(0, 0, 0); background-size: cover; background-position: initial initial; background-repeat: initial initial;-webkit-filter: blur(6px);"></section><section id="background3" class="background future" style="background-color: rgb(0, 0, 0); background-size: cover;"></section></div>
                        
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                            <div class="slideLine">
                    <div class="slideProgress">
                        <div class="statusComplete" style="width: 33.333333333333336%;"></div><div class="statusIncomplete" style="width: 66.66666666666667%;"></div>
                    </div>
                </div>
            </div>
            <i id="nxtSlide" class="fa fa-angle-right fa-5x arrowCtls arrow-right" onclick="Slider.nextSlide();" title="Next"></i>
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
        $(".slideshow").css('height',wh);
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
    //Slider.createCSS();
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
