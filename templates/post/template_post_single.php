<!-- Place this snippet wherever appropriate -->
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

<div class="vsmain" style="display:inline-block; height:90%;">

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


<h1 class="heading-1"><?php echo $postdata['main']['title']; ?></h1>
<?php if($postdata['tags']) : ?>
    <small>
        <div class="pull-left" style="">
            <?php foreach($postdata['tags'] as $tag) { ?>
            <a href="<?php echo DOCROOT;?>tagged/<?php echo $tag['tag_id']; ?>"><span class="green-button"><?php echo ucwords($tag['tag_name']); ?></span></a>
            <?php } ?>
        </div>
    </small>
<?php endif; ?>
<?php if($postdata['content']) : ?>
    <p><?php echo $postdata['content'];?></p>
<?php endif; ?>
<div class="card">
            <div class="card-media" style="">
                
                <?php 
                    $total_slide =  ($postdata['images'] ? count($postdata['images']) : '0')+ ($postdata['videos'] ? count($postdata['videos']) : '0');
                ?>
                    <?php if($postdata['videos']) : foreach($postdata['videos'] as $video) { $videoId = getYoutubeVideoId($video['video']); ?>
                        <li><img src="<?php echo resizeImage($video['video_image'], "common_assets/cache/". $videoId.substr(basename($video['video_image']),0,-4). "_803x360.jpg", 600, 330);?>" alt="<?php echo $video['title']; ?>" data-description="<?php echo $video['content']; ?>" />
                           <video preload="none" src="<?php echo $video['video'];?>"></video>
                        </li>
                    <?php } endif; ?>
                    <?php if($postdata['images']) : $count = 1; foreach($postdata['images'] as $image) { ?>
                        <li style="text-indent:200px; ">
                            <a href="<?php echo $image['image'] ;?>" class="html5lightbox" data-width="1000" data-height="549" data-group="mygroup" title="<?php echo $image['title'];?>"><img class="img-responsive" src="<?php echo DOCROOT.chk_thumb($image['image'],2);?>" alt="<small><?php echo $count.'/'.$total_slide; ?> &nbsp;Slides</small><br><br><?php echo $image['title'].'<p>'.$image['content'].'</p>';?>" data-description="<?php echo $image['content']; ?>" /></a> 
                            <? /*  <a href="<?php echo $image['image'] ;?>" class="html5lightbox" data-width="1920" data-height="520" data-group="mygroup" title="<?php echo $image['title']; ?>">
                            <img src="<?php echo $image['image']; ?>" alt="<?php echo $image['title']; ?>" data-description="<?php echo $image['content']; ?>" style="margin:auto; bottom:0; right:0;"/>
                            </a> */ ?>          
                        </li>
                    <?php $count++; }  endif; ?>
                
                <div class="amazingslider-engine" style=" background:#000"><a href="#">jQuery Image Slideshow</a></div>
                <div class="amazingslider-engine" style=""><a href="#">WordPress Slideshow</a></div>
            </div>
        
        <a data-toggle="modal" href="#myModal" class="pull-left" data-target="">Full Screen</a>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-remote="">
        <!--modal body starts-->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title heading-1">
                    <?php echo $postdata['main']['title']; ?>
                </h4>
        </div>
                        <?php 
                         $total_slide =  ($postdata['images'] ? count($postdata['images']) : '0')+ ($postdata['videos'] ? count($postdata['videos']) : '0');
                        ?>



        <div class="modal-body" >
            <div class="box-center text-center">
            <ul class="album" style="display;inline; width:90%;overflow-y:hidden;overflow-x:auto;">
                    <?php if($postdata['videos']) : $i=1; foreach($postdata['videos'] as $video) { $videoId = getYoutubeVideoId($video['video']); ?>
                        <li id="album-thumb-<?php echo $i;?>"><img src="<?php echo resizeImage($video['video_image'], "common_assets/cache/". $videoId.substr(basename($video['video_image']),0,-4). "_116x56.jpg", 116, 56);?>" alt="Viaslide.com" /></li>
                    <?php } endif; ?>
                    <?php if($postdata['images']) :$i=1; foreach($postdata['images'] as $image) { ?>
                    <?php $img = chk_thumb($image['image'],0);?>
                        <li id="album-thumb-<?php echo $i;?>"  onClick="change_content(this.id)" class="thumb-nav"><a href="#"><img src="<?php echo DOCROOT.$img;?>" alt ="<?php echo '<br>'. $image['title'].'<p>'.$image['content'].'</p>';?>" />
                            <small><?php echo $i.'/'.$total_slide; ?>&nbsp;Slides</small>
                        </a></li>
                    <?php $i++;}   endif; ?>
            </ul>
            </div>

            <div class="slide-box">
                <div class="row-fluid">

                    <span class="prev-slide" onclick="prev()" style="cursor:pointer; display: block;overflow: hidden;position: absolute;width: 32px;height: 32px;background-image: url(http://www.viaslide.com/view/themes/default/slideshow/skins/carouselarrows-32-32-0.png);left: 2%;top: 50%;margin-top: 23px;background-position: 0% 50%;background-repeat: no-repeat no-repeat;z-index:9999;">
                    
                </span>
                <div class="img-box"  id="albumImage">
                
                
                <div class="" style="disaply:block; background-color:black;">
                <img class="img-responsive" src = "<?php echo $postdata['images'][0]['image'];?>"  style="margin: 0px auto;height:500px; overflow:hidden; width:auto;">
                </div>
                
                    </div>
                       <span class="next-slide" onclick="next()" style="display: block; cursor:pointer;  overflow: hidden;position: absolute;width: 32px;height: 32px;background-image: url(http://www.viaslide.com/view/themes/default/slideshow/skins/carouselarrows-32-32-0.png);right: 2%;top: 50%;margin-top: 23px;background-position: 100% 50%;background-repeat: no-repeat no-repeat; z-index:9999;"></span>
                    </div>
                </div>
            </div>
        <div class="modal-footerx" style="z-index:999;">
            <div id ="slidetext" class="text-center">
                <?php echo $postdata['images'][0]['title'].'<br><p>'.$postdata['images'][0]['content'].'</p>';?>
            </div>
        </div>
    </div>
    </div>
    </div><!-- /.modal -->
    <div class="post_title">
    <div class="slide-title">
            <small>1/<?php echo $total_slide;?>&nbsp;Slides</small><br>
            <?php if($postdata['videos']) { echo $postdata['videos'][0]['title'] ; } else if ($postdata['images']) { echo $postdata['images'][0]['title'];} else {echo $postdata['main']['title'];} ?>
            <p><?php if($postdata['videos']) { echo $postdata['videos'][0]['content'] ; } else if ($postdata['images']) { echo $postdata['images'][0]['content'];} else {echo $postdata['main']['content'];} ?></p>
    <div class="clearfix bdr1"></div> 
    </div>
    </div>
</div>

<div class="slide-info">
    <span class="slide-info-posted">Published on <?php echo date("l jS \of F Y",$postdata['main']['created']);?></span>
    <span class="slide-info-views"><?php echo number_format($postdata['main']['total_views']);?>&nbsp;Views</span>
    <p>by: <a style="color:#A9A9A9;" href="index.php?route=post/userlisting&user_id=<?php echo $postdata['main']['submit_by']; ?>"><?php echo $postdata['main']['submit_by_user'];?></a></p>
</div>

 <!--comment section starts-->
<div class="comments-box-heading">Comments</div>
<div class="comments-box">

 <?php if( isLoggedIn() ) : ?>
        <div class="media">
            <a class="pull-left" href="#">
                <img src="<?php echo DOCROOT.THEMEPATH;?>images/profile-image.jpg" width="48" height="48" />
            </a>
            <div class="media-body">
                <textarea id="post_comment" name="comment" placeholder="Comment" style="width:100%; height:50%;" ></textarea>
            </div>
        </div>
        
        <input id="comment_submit" name="comment_submit" type="button" value="Submit" class="green-button pull-right comment-btn"/>
        <br>
        <br>
        <?php else : ?>
        <?php 
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        echo '<a href="'.DOCROOT.'signin"><h5 class="text-left">Sign in to post comment</h5></a>'; ?>

        <?php endif; ?>
        
        <div id="posted_comment-box">
    <?php if(  $postdata['comments']  ) :  foreach($postdata['comments'] as $comment) { ?>
        
        <!--comment starts-->
        <!---->
        <!---->

            <div class="media">
                <a class="pull-left">
                    <img src="<?php echo DOCROOT; ?><?php echo (isset($comment['image']) && !empty($comment['image'])) ? resizeImage($comment['image'], "images/users/".substr(basename($comment['image']),0,-4). "_48x48.jpg", 48, 48) : THEMEPATH. 'images/profile-image.jpg' ; ?>" width="48" height="48" />
                </a>
                <div class="media-body" style="display:line-height:0px;">
                    <h5 class="media-heading">
                        <a style="text-decoration:none;" href="<?php echo DOCROOT.'user/'.$comment['posted_by']; ?>"><?php echo $comment['submit_by_user']; ?></a>
                        <small><?php echo ago($comment['created']);?></small>
                    </h5>
                    
                    <?php echo $comment['comment']; ?>
                    <!--
                    <div class="reply">Reply .</div>&nbsp;<a href="#"><div class="like"><?php // echo $comment['total_likes']; ?></div></a>&nbsp;&nbsp;<a href="#"><div class="unlike"><?php // echo $comment['total_dislikes']; ?></div></a>
                    -->
                </div>
            </div>
         <!--comments ends-->   
        
        
        <?php } endif; ?>
        </div>
        <br>
</div>

<div class="col-md-2 col-lg-4 col-xs-0">
        <h4 class="pull-left heading-2">Related Slideshows</h4>
        <?php if($postdata['related']) : $i = 0; foreach($postdata['related'] as $related) { ?>
            <div class="related"> 
            <!--div class="fl-left"-->
            <!--Media Object starts-->
            <div class="related-media">
                <a style="float:none;" href="<?php echo  DOCROOT;?>slide/<?php echo $related['id'].'/'.$related['slug'];?>">
                    <img src="<?php echo $related['type']=="video" ? resizeImage($related['image'], "common_assets/cache/". getYoutubeImageID($related['image']).substr(basename($related['image']),0,-4). "_0.jpg", 180, 110):DOCROOT.chk_thumb($related['image'],3);?>" height="100%" width="100%"/>
                </a>
                
            </div>
            <div class="related-desc" style="padding-right:6px;padding-left:6px;">
            <span ><a class="related-title" href="<?php echo  DOCROOT;?>slide/<?php echo $related['id'].'/'.$related['slug'];?>" style="width:210px;"><?php echo $related['title']; ?></a></span><br>
                
                    <small><strong ><a style="color:#A9A9A9;" href="<?php echo DOCROOT.'user/'.$related['submit_by'] ?>"><?php echo $related['submit_by_user']; ?></a></strong></small>
                        <br><small>
                        
                         <span class="pull-left"><?php echo $related['total_views']; ?> views,</span>
                         <span class="pull-right"><em><?php echo ago($related['created']); ?></em></span>
                    </small>
                </div>  
        </div>
        <?php if($i++ == 9) break;} endif; ?>    
    </div>

</div>

<!--span9 ends-->
<!--span2 starts-->
    
</div>
</div>  
</div>
  
<script>
	$("#comment_submit").click( function () {
		var post_comment = $("#post_comment").val();
		if(post_comment.trim()!="") {
			$.post('<?php echo DOCROOT; ?>index.php?route=post/addNewComment', { comment: post_comment , post_id: <?php echo $postid ; ?> }, function(data) {
				if(data.trim()=='success') {
					newComment = '<div class="media"><a class="pull-left"><img src="<?php echo DOCROOT; ?><?php echo (isset($_SESSION['LoggedUser']['image']) && !empty($_SESSION['LoggedUser']['image'])) ? resizeImage($_SESSION['LoggedUser']['image'], "common_assets/cache/".substr(basename($_SESSION['LoggedUser']['image']),0,-4). "_48x48.jpg", 48, 48) : THEMEPATH. 'images/profile-image.jpg' ; ?>" width="48" height="48"/></a><div class="media-body" style="display:line-height:0px;"><h5 class="media-heading"><a style="text-decoration:none;" href="<?php echo DOCROOT.'user/'.$_SESSION['LoggedUser']['id']; ?>"><?php echo $_SESSION['LoggedUser']['first_name']." ".$_SESSION['LoggedUser']['last_name']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>0 hour ago</small></h5><small></small>' + post_comment + '</div></div>'
                    $("#posted_comment-box").prepend(newComment);
					$("#post_comment").attr('value','');
				}
				else
					alert(data);
			});
		}else {
		//	alert("Say Something");
		}
	});
</script>
  
  
  


<script>
  
  
 function change_content(a){
    var x = '.amazingslider-bullet-0-'+a;
    $(x).live('click', function(e) {
        var SlideTitle = '<div class="slide-title">' + $(".amazingslider-title-0").html() + '</div><div class="clearfix bdr1"></div>';
        $(".post_title").html(SlideTitle);
        var SlideTitle = '<div class="slide-title">' + $(".amazingslider-title-0").html() + '</div><div class="clearfix bdr1"></div>';
        $(".post_title").html(SlideTitle);
     });

}
 
$(document).keyup(function(e) {
	if(e.keyCode == 37) {
    prev();
		 $(".amazingslider-arrow-left-0").trigger('click');
		 var SlideTitle = '<div class="slide-title">' + $(".amazingslider-title-0").html() + '</div><div class="clearfix bdr1"></div>';
        $(".post_title").html(SlideTitle);
	}else if(e.keyCode == 39) {
    next();
		 $(".amazingslider-arrow-right-0").trigger('click');
		 var SlideTitle = '<div class="slide-title">' + $(".amazingslider-title-0").html() + '</div><div class="clearfix bdr1"></div>';
		$(".post_title").html(SlideTitle);
	}
});


$(document).ready(function(e) {
    $(".thumb-chng-title").live('click', function(e) {
    	var SlideTitle = '<div class="slide-title">' + $(".amazingslider-title-0").html() + '</div><div class="clearfix bdr1"></div>';
    	$(".post_title").html(SlideTitle);
	});
    $(".amazingslider-arrow-left-0").live('click', function(e) {
	   var SlideTitle = '<div class="slide-title">' + $(".amazingslider-title-0").html() + '</div><div class="clearfix bdr1"></div>';
       $(".post_title").html(SlideTitle);
	});
    $(".amazingslider-arrow-right-0").live('click', function(e) {
		var SlideTitle = '<div class="slide-title">' + $(".amazingslider-title-0").html() + '</div><div class="clearfix bdr1"></div>';
    	$(".post_title").html(SlideTitle);
    });
});
document.getElementById("p2").style.color="blue";
</script>

<!--bs scripts-->
<script>
var oldli='album-thumb-' + 1;
$(document).ready(function(){
document.getElementById(oldli).style.opacity = "0.4";    
});
function next(){
var n = oldli.split("-");
var d = parseInt(n[2])+1;
var m = n[0]+'-'+n[1]+'-'+d;
document.getElementById(oldli).style.opacity = "1.0";    
change_content(m);    
document.getElementById(m).style.opacity = "0.4";
oldli = m;
}

function change_content(id){
 var x = '#'+id;
document.getElementById(id).style.opacity = "0.4";
document.getElementById(oldli).style.opacity = "1.0";
var src = $("img",x).attr("src");
var txt = $("img",x).attr("alt");
var image_new = src.replace("_0","_2");
var image = '<div class="" style="disaply:block; background-color:black;"><img class="img-responsive" src = "'+ image_new +'"  style="margin: 0px auto;height:500px; width:auto;"></div>';
$("#albumImage").html(image);
$("#slidetext").html(txt);
oldli = id;
};

function prev(){
var n = oldli.split("-");
var d = parseInt(n[2])-1;
var m = n[0]+'-'+n[1]+'-'+d;
document.getElementById(oldli).style.opacity = "1.0";
change_content(m);
document.getElementById(m).style.opacity = "0.4";
oldli = m;
};
</script>

<!---->