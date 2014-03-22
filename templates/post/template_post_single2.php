<style type="text/css">
/*sharing starts*/
#sticky-anchor{
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding-box;
    background-clip: padding-box;
    background-color: #FFFFFF;
    font-family: Arial;
    font-size: 10px;
    line-height: 16px;
    padding: 4px 10px 4px 10px;
    text-align: center;
    z-index: 99;
    float: right;
    margin-left:-85px;
    text-align:center;
}
.sticky{
 
}
#sticky-anchor.stick{
    position:fixed;
    top:50px;
}
#sticky-anchor .fb-like{
    padding:5px 5px;
}
.comments{
    width: 80%;
    padding: 20px;  
    background: #fff;
    margin: 0 auto;
}
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
.future{
        -webkit-transform-origin: 0% 0%;
-moz-transform-origin: 0% 0%;
-ms-transform-origin: 0% 0%;
transform-origin: 0% 0%;
-webkit-transform: translate3d(100%,0,0);
-moz-transform:  translate3d(100%,0,0);
-ms-transform: translate3d(100%,0,0);
transform:  translate3d(100%,0,0);
}
.past{
    -webkit-transform-origin: 0% 0%;
-moz-transform-origin: 0% 0%;
-ms-transform-origin: 0% 0%;
transform-origin: 0% 0%;
-webkit-transform: translate3d(-100%,0,0);
-moz-transform:  translate3d(-100%,0,0);
-ms-transform: translate3d(-100%,0,0);
transform:  translate3d(-100%,0,0);
}
/*
.cube-vertical .past{
-webkit-transform-origin: 0% 0%;
-moz-transform-origin: 0% 0%;
-ms-transform-origin: 0% 0%;
transform-origin: 0% 0%;
-webkit-transform: translate3d(0,100%,0) rotateX(-90deg);
-moz-transform:  translate3d(0,100%,0) rotateX(-90deg);
-ms-transform: translate3d(0,100%,0) rotateX(-90deg);
transform:  translate3d(0,100%,0) rotateX(-90deg);
}
.cube-vertical .future{
-webkit-transform-origin: 0% 0%;
-moz-transform-origin: 0% 0%;
-ms-transform-origin: 0% 0%;
transform-origin: 0% 0%;
-webkit-transform: rotateX(90deg) translate3d(0,-100%,0);
-moz-transform: rotateX(90deg) translate3d(0,-100%,0) ;
-ms-transform:  rotateX(90deg) translate3d(0%,-100%,0);
transform:  rotateX(90deg) translate3d(0,-100%,0);
}
.cube .past{
-webkit-transform-origin: 00% 0%;
-moz-transform-origin: 100% 0%;
-ms-transform-origin: 100% 0%;
transform-origin: 100% 0%;
-webkit-transform:  rotateY(-90deg) translate3d(-100%,0,0) ;
-moz-transform: translate3d(-100%,0,0) rotateY(-90deg);
-ms-transform: translate3d(-100%,0,0) rotateY(-90deg);
transform: translate3d(-100%,0,0) rotateY(-90deg);
}
.cube .future{
-webkit-transform-origin: 0% 0%;
-moz-transform-origin: 0% 0%;
-ms-transform-origin: 0% 0%;
transform-origin: 0% 0%;
-webkit-transform:translate3d(100%,0,0) rotateY(90deg);
-moz-transform:translate3d(100%,0,0) rotateY(90deg);
-ms-transform: translate3d(100%,0,0) rotateY(90deg);
transform: translate3d(100%,0,0) rotateY(90deg);
}
.rotate .past{
    -webkit-transform-origin: 100% 0%;
-moz-transform-origin: 100% 0%;
-ms-transform-origin: 100% 0%;
transform-origin: 50% 0%;
-webkit-transform:  translate3d(-100%,0,0) rotateY(-90deg) translate3d(-100%,0,0);
-moz-transform:  translate3d(-100%,0,0) rotateY(-90deg) translate3d(-100%,0,0);
-ms-transform:  translate3d(-100%,0,0) rotateY(-90deg) translate3d(-100%,0,0);
transform:  translate3d(-100%,0,0) rotateY(-90deg) translate3d(-100%,0,0);
}
.rotate .future{
-webkit-transform-origin: 0% 0%;
-moz-transform-origin: 0% 0%;
-ms-transform-origin: 0% 0%;
transform-origin: 50% 0%;
-webkit-transform: translate3d(100%,0,0) rotateY(90deg) translate3d(100%,0,0);
-moz-transform: translate3d(-100%,0,0) rotateY(90deg) translate3d(-100%,0,0);
-ms-transform:  translate3d(-100%,0,0) rotateY(90deg) translate3d(-100%,0,0);
transform:  translate3d(100%,0,0) rotateY(90deg) translate3d(100%,0,0);
}
*/
/*
.textBox{
    width: 800px;
    height: 600px;
    position: absolute;
}
*/
.background{
    position: absolute;
    margin: 0 auto;
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
  z-index: 9;
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
    overflow: hidden;
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
.color-1:hover{
    color:rgba(88,88,88,0.8);
}
.user-pic-2{
    height: 34px;
    width: 34px;
}

</style>
<script type="text/javascript">
  (function() {
    var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
    li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
  })();
</script>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
<?php 
$a = explode('/', $_SERVER['REQUEST_URI']);
$permalink = 'http://www.viaslide.com'.$_SERVER['REQUEST_URI'];
?>

<script type="text/javascript">
  (function() {
    var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
    li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
  })();
</script>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
<?php 
$a = explode('/', $_SERVER['REQUEST_URI']);
$permalink = 'http://www.viaslide.com'.$_SERVER['REQUEST_URI'];
?>

    <div class="container-fluid">
        <div class="row slide-header">
            <div class="col-lg-12 col-xs-12 col-md-12">
                <h1 class="color-1"><?php echo $postdata['main']['title']; ?></h1>
                <?php if($postdata['tags']) : ?>
                    <div>
                        <span class="h5" title="tags"><i class="fa fa-tags"></i></span>
                        <?php foreach($postdata['tags'] as $tag) { ?>
                        <a href="<?php echo DOCROOT;?>tagged/<?php echo $tag['tag_id']; ?>" class="h5 tag-button"><?php echo strtolower($tag['tag_name']); ?></a>
                        <?php } ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
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
        <div class="row slide-info">
            <div class="col-lg-6 col-xs-12 col-md-6">
                <h3 class="color-1">
                    <span class="slide-info-posted"><i class="fa fa-clock-o color-1"></i><?php echo date("jS F Y",$postdata['main']['created']);?></span>,&nbsp;
                    <span class="slide-info-views"><strong><?php echo number_format($postdata['main']['total_views']);?></strong>&nbsp;<i class="fa fa-eye color-1"></i></span>
                </h3>
                <div class="user-info-header">
                    <a class="color-1" href="<?php echo DOCROOT.'user/'.$postdata['main']['submit_by'];?>">
                    <?php if($postdata['main']['user_image']):?>
                            <span class="user-pic"><img class="" width="50" height="50" src="<?php echo DOCROOT.$postdata['main']['user_image'];?>"></span>
                    <?php else:?>
                            <span class="user-pic-2"><i class="fa fa-user fa-2x"></i></span>
                    <?php endif;?>
                    <span class="user-info-header-title"><?php echo $postdata['main']['submit_by_user'];?></span></a>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12 col-md-6">
                <div id="sticky-anchor">
                    <div class="sticky">
                        <!-- LinkedIN -->
                        <? /*
                        <script type="IN/Share" data-counter="top" data-url="<?php // the_permalink() ?>"></script>
                        */ ?>
                        <a href="//www.pinterest.com/pin/create/button/?url=<?php echo $permalink; ?>&media=<?php echo $permalink; ?>&description=Next%20stop%3A%20Pinterest" data-pin-do="buttonPin" data-pin-config="above"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
                        <!-- facebook like -->
                        <span class="fb-like" data-send="false" data-layout="box_count" data-width="50" data-show-faces="false" data-href="<?php echo $permalink; ?>"></span>
                        <!-- twitter -->
                        <a class="twitter-share-button" data-count="vertical" data-url="<?php echo $permalink; ?>"></a>
                        <!-- g+ -->
                        <g:plusone size="tall" data-href="<?php echo $permalink; ?>"></g:plusone>
                        <!-- Pinterest -->
                        <su:badge layout="5"></su:badge>
                    </div>
                </div>
            </div>
        </div>
        <div class="comments shadow">
            <?php if( isLoggedIn() ) : ?>
            <div class="media shadow">
                <a class="pull-left user-pic" href="#">
                    <!--img src="<?php // echo DOCROOT.THEMEPATH;?>images/profile-image.jpg" width="48" height="48" /-->
                    <img src="<?php echo DOCROOT.$_SESSION['LoggedUser']['image']; ?>" width="100%" height="100%"/>
                </a>
                <div class="media-body">
                <div class="form-group col-lg-12 col-xs-12 col-md-12">
                <div class="controls">
                    <textarea id="post_comment" class="form-control" name="comment" placeholder="Comment"></textarea>
                </div>
                </div>
                    
                </div>
            </div>
            <div class="form-group col-lg-12 col-xs-12 col-md-12">
                <div class="controls">
                    <input id="comment_submit" name="comment_submit" type="button" value="Submit" class="button pull-right comment-btn"/>
                </div>
                </div>
                <br>
                <br>
                <br>
            <?php else : ?>
            <?php 
                $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
                echo '<a href="#comment"><h4 class="text-left color-1" style="margin:1em;">Sign in to post comment</h5></a>'; ?>
            <?php endif; ?>
            <div id="posted_comment-box">
                <?php if(  $postdata['comments']  ) :  foreach($postdata['comments'] as $comment) { ?>
                <!--comment starts-->
                <div class="media shadow">
                    <a class="pull-left user-pic">
                        <img src="<?php echo DOCROOT.$comment['image']; ?>" width="100%" height="100%"/>
                    </a>
                    <div class="media-body" style="display:line-height:0px;">
                        <h4 class="media-heading color-1">
                            <a class="comment-user-title" href="<?php echo DOCROOT.'user/'.$comment['posted_by']; ?>"><?php echo $comment['submit_by_user']; ?></a>
                            <small><?php echo ago($comment['created']);?></small>
                        </h4>
                    <?php echo $comment['comment']; ?>
                    </div>
                </div>  
                <?php } endif; ?>
            </div>
        </div>
            <div class="page-header">
                <h2 class="color-1">Related Slideshows</h2>
            </div>
            <div class="related">
                <ul class="items itemsContainer shadow">
                    <?php if($postdata['related']) : $i = 0; foreach($postdata['related'] as $related) { ?>
                        <li class="strip shadow" style="width:400px; height:300px; position:absolute;">
                            <div class="boxStrip">
                                <div class="boxStripMedia">
                                    <a href="<?php echo DOCROOT; ?>slide/<?php echo $postdata['related'][$i]['id'].'/'.$postdata['related'][$i]['slug']; ?>">
                                    <img src="<?php echo DOCROOT.$postdata['related'][$i]['image'];?>" width="100%" height="100%">
                                    </a>
                                </div>
                                <div class="boxStripInfo">
                                    <div class="boxStripTitle">
                                        <a href="<?php echo DOCROOT; ?>slide/<?php echo $postdata['related'][$i]['id'].'/'.$postdata['related'][$i]['slug']; ?>"><?php echo $postdata['related'][$i]['title']; ?></a>
                                    </div>
                                    <div class="boxStripAddInfo">
                                        <?/*
                                        <small class="pull-left"><a href="<?php echo DOCROOT;?>user/<?php echo $postdata['related'][$i]['submit_by'] ?>" style="color:#A9A9A9;"><strong><?php echo $postdata['related'][$i]['submit_by_user']; ?></strong></a></small>
                                        <small class="pull-right" style="color:#A9A9A9;"><em><?php echo $postdata['related'][$i]['total_views'].' views ,'.ago($postdata['related'][$i]['created']); ?></em></small>
                                        */?>
                                        <span class="pull-left"><i class="fa fa-clock-o">&nbsp;<?php echo ago($postdata['related'][$i]['created']); ?></i></span>
                                        <span class="pull-right"><i class="fa fa-eye"></i>&nbsp;<?php echo $postdata['related'][$i]['total_views'];?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php if($i++ == 9) break;} endif; ?>    
                </ul>    
            </div>
    <!--/div-->
</div>
<script type="text/javascript">
$("a[href='#comment']").click(function(){
    $(".lightbox-show").removeClass("lightbox-show");
    var ref =  $("#loginLink").attr('data-id');
    $(".overlay").show();
    $("#"+ref).addClass("lightbox-show");
});
$("#comment_submit").click( function () {
    var post_comment = $("#post_comment").val();
    if(post_comment.trim()!="") {
        $.post('<?php echo DOCROOT; ?>index.php?route=post/addNewComment', { comment: post_comment , post_id: <?php echo $postid ; ?> }, function(data) {
            if(data.trim()=='success') {
               newComment = '<div class="media"><a class="pull-left"><img src="<?php echo DOCROOT.$_SESSION['LoggedUser']['image']; ?>" width="34" height="34"/></a><div class="media-body" style="display:line-height:0px;"><h5 class="media-heading"><a class="comment-user-title" href="<?php echo DOCROOT.'user/'.$_SESSION['LoggedUser']['id']; ?>"><?php echo $_SESSION['LoggedUser']['first_name']." ".$_SESSION['LoggedUser']['last_name']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>0 hour ago</small></h5><small></small>' + post_comment + '</div></div>';
                
                $("#posted_comment-box").prepend(newComment);
                //$("#post_comment").attr('value','');
                $("#post_comment").value = '';
            }
            else
                alert(data);
            });
        }else {
            //
        }
});
$(document).keyup(function(e){
    if(e.keyCode == 37){
        Slider.prevSlide();
    }
    if(e.keyCode == 39){
        Slider.nextSlide();
    }
});
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
        var s = $("#backgrounds").attr('data-css');
        $("#backgrounds").addClass(s);
        var css = document.createElement('link');
        css.type = 'text/css';
        css.rel = 'stylesheet';
        css.href = '<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/css/'+s+'.css';

        //var a = '<link rel="stylesheet" type="text/css" href"<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/css/'+s+'.css">';
        document.getElementsByTagName('head')[0].appendChild(css);
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
        $(".slideshow").css('height',sh);
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
});$("#slideshowSection").hover(function(){
        $("#slideshowSection").removeClass('play');
        $("#slideshowSection").addClass('paused');
    },
    function(){
        $("#slideshowSection").addClass('play');
        $("#slideshowSection").removeClass('paused');
});
function eventHover(){
    $(".boxStrip").hover(function(){
    $(this).find(".boxStripAddInfo").css('visibility','visible');
    var x =  $(this).find(".boxStripAddInfo").css('height');
    $(this).find(".boxStripInfo").css('bottom',x);
    },function()
    {
    $(this).find(".boxStripAddInfo").css('visibility','hidden');
    $(this).find(".boxStripInfo").css('bottom',0);
    });    
}
<?php if($i): ?>
var f = <?php echo $i;?>;
<?else: ?>
var f = 0;
<?php endif;?>
$(window).resize(function() {
    Related.initialize();
});
    var Related = (function(){
    var k, fg, fw, fh, grid, gridIn;
    'use strict'
    var l = 2*(f+1);
    function getk(s){
        if(s > 1400){
            k = 8;
        }
        else if( s >= 1000 && s <=1400){
            k=6;
        }
        else if(s<1000 && s>=800){
            k=5;
        }
        else if(s<800 && s>=600){
            k=3;
        }
        else if(s<600 && s>=300){
            k=2;
        }
        else{
            k=1;
        }
        return k;   
    }
    function initialize(){
        var s = $(".related").width();
        k = getk(s);
        fw = (s-((k-1)*8))/k;
        fh = Math.floor(fw*(3/4));
        makeGrid();
        var cx = ".items li";
        arrangeGrid(cx);
    }
    function makeGrid(){
            grid = new Array(k);
            for (i=0; i<l; i++){
                grid[i] = new Array(k); 
            };
            for (i = 0 ; i<l; i++) {
                    for (j = 0; j < k; j++) {
                    grid[i][j] = 0;
                };
            };
    }
    function increaseGrid(){
        var a;
        if(grid.length){
            a = grid.length;
        }else{
            a = 1;
        }
        for (var i = a-1; i < a+50; i++) {
            grid.push([]);
            for (var j = 0; j < k; j++) {
                grid[i].push(0);
            };
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
    function countItems(){
        var d = 1;
        $( ".items li" ).each(function(e) {
            d++; 
        });
        return d;
    }
    function arrangeGrid(newItems){
        var newItems = newItems;
        var maxH=0;
        $('.a').removeClass('a');
        $('.b').removeClass('b');
        var cst = cssTransform();
        $(newItems).each(function( index ) {
            var fr = Math.floor((Math.random()*k) + 1);
            if(fr<=3){
                var c = placement(0);
                $(this).css(cst, 'translate3d('+c.x+'px,'+c.y+'px,'+0+'px)');
                $(this).css("height",fh);
                $(this).css("width",fw);
                $(this).addClass('b');
                if(maxH<(c.y+fh)){
                    maxH = c.y+fh;
                }
            }
            else if(fr>3){
                var c = placement(1);
                $(this).css(cst, 'translate3d('+c.x+'px,'+c.y+'px,'+0+'px)');
                $(this).css("height",2*fh+8);
                $(this).css("width",2*fw+8);
                $(this).addClass('a');
                if(maxH<(c.y+2*fh+8)){
                    maxH = c.y+2*fh+8;
                }
            }
            maxH = maxH;
            $(".itemsContainer").css('height',maxH);
        });   
    }
    function placement(a){
        var grid_item_h = fh, grid_item_w = fw;
        var gl = grid.length;
        asd:
        switch(a){
            case 0:
            for (i = 0 ; i < gl; i++){
                for (j = 0; j < k; j++) {
                    if(i<gl && j<k){
                        
                     if(grid[i][j] == 0){
                        var x = j*(grid_item_w+8);
                        var y = i*(grid_item_h+8);
                        grid[i][j] = 1;
                        break asd;
                        }
                    }
                };
            };
            break;
            case 1:
            for (i = 0 ; i <gl-1; i++) {
                for (j = 0; j < k-1; j++) {
                    if(i<gl-1 && j<k-1){
                     if(grid[i][j] == 0 && grid[i+1][j] == 0 && grid[i][j+1] == 0 && grid[i+1][j+1] == 0){
                        var x = j*(grid_item_w+8);
                        var y = i*(grid_item_h+8);
                        grid[i][j] = 1;
                        grid[i+1][j] = 1;
                        grid[i][j+1] = 1;
                        grid[i+1][j+1] = 1;
                        break asd;
                        }
                    } 
                };
            };
            break;
            case 2:
            for (i = 0 ; i <gl; i++) {
                for (j = 0; j < k; j++) {
                    if(i<gl && j<k){
                     if(grid[i][j] == 0 && grid[i][j+1] == 0){
                        var y = j*grid_item_h;
                        var x = i*grid_item_w;
                        grid[i][j] = 1;
                        grid[i][j+1] = 1;
                        break asd;
                        } 
                    }
                };
            };
        };
        return({x:x, y:y});
    };
    return{
        initialize:initialize,
        getk: getk,
        placement: placement,
        arrangeGrid: arrangeGrid,
        increaseGrid: increaseGrid,
    };
})();
Related.initialize();
eventHover();
    var page = 2;
    var datax;
    var dataurlx = "<?php echo DOCROOT;?>index.php?page=";
    var didscroll = false;
    $(window).scroll(function(){
        didscroll = true;
    });
    setInterval(function(){
    if(didscroll){
        didscroll = false;
        var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
        var  scrolltrigger = 0.95;
        if  ((wintop/(docheight-winheight)) > scrolltrigger) {
            lastAddedLiveFunc();
        }
    }
},250);
function lastAddedLiveFunc()
    {
        dataurl = dataurlx+page;
        $.get(dataurl, function(data){
        if(datax == data){
        }
        else{
            datax = data;
            if (data!= "") {
                //alert(data);
                var a = eval(data);
                var b = JSON.parse(data);
                for (var i = b.length - 1; i >= 0; i--) {
                    var item = '<li class="newItems strip shadow" style="left:0; top:0; position:absolute; width:400px; height:300px;"><div class="boxStrip"><div class="boxStripMedia"><a href="<?php echo DOCROOT; ?>slide/'+b[i]['id']+'/'+b[i]['slug']+'"><img src="<?php echo DOCROOT;?>'+b[i]['image']+'" width="100%" height="100%"></a></div><div class="boxStripInfo"><div class="boxStripTitle"><a href="<?php echo DOCROOT; ?>slide/'+b[i]['id']+'/'+b[i]['slug']+'">'+b[i]['title']+'</a></div><div class="boxStripAddInfo"><!--span class="pull-left"><a href="<?php echo DOCROOT;?>user/'+b[i]['submit_by']+'" style="color:#A9A9A9;"><strong>'+b[i]['submit_by_user']+'</strong></a></span--><span class="pull-left color-2"><i class="fa fa-clock-o"></i>&nbsp;<span class="slide-time">'+ago(b[i]['created'])+'</span></span><span class="pull-right">&nbsp;'+b[i]['total_views']+'&nbsp;<i class="fa fa-eye"></i></span></div></div></div></li>';
                    $(".items").append(item);
                };
                var e = ".newItems";
                Related.increaseGrid();
                Related.arrangeGrid(e);
                $(".newItems").removeClass('newItems');
                page++;
                eventHover();
            }
        }
    });
};    
function ago(time)
    {
    var periods = ["second", "minute", "hour", "day", "week", "month", "year", "decade"];
    var lengths = ["60","60","24","7","4.35","12","10"];
    var time = Math.round(time);
    var now = Math.round(+new Date()/1000);
    var difference     = now - time;
    var tense         = "ago";
    for(var j = 0; difference >= lengths[j] && j < lengths.length-1; j++) {
       difference /= lengths[j];
    }
    difference = Math.round(difference);
    if(difference != 1) {
       periods[j]+= "s";
    }
    return difference+' '+periods[j];
}
</script>
