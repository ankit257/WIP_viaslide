

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<!-- End Pop Box -->

<style type="text/css">
.album {
    display: inline-block;
    white-space: nowrap;
    overflow: auto;
    max-width: 100%
}
.album li{
    display: inline-block;
    height: auto;
}
.album li small{
display: block;
position: relative;
text-align: center;
text-decoration: none;
color:#696969;
font-weight: bold;
}
</style>


           
</head>
<body>
<!--Slider start-->






<!--Slider end-->

<!--container starts-->
<div class="modal-dialog">
      <div class="modal-content">
        

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title heading-1">
        <?php echo $postdata['main']['title']; ?>
        <br>
        <?php if($postdata['tags']) : ?>
        <small>
            <div class="pull-left" style="">
                <?php foreach($postdata['tags'] as $tag) { ?>
                <a href="index.php?route=post/taglisting&tag_id=<?php echo $tag['tag_id']; ?>"><span class="green-button"><?php echo ucwords($tag['tag_name']); ?></span></a>
                <?php } ?>
            </div>
        </small>
         <?php endif; ?></h4>
        </div>
                        <?php 
                         $total_slide =  ($postdata['images'] ? count($postdata['images']) : '0')+ ($postdata['videos'] ? count($postdata['videos']) : '0');
                        ?>



        <div class="modal-body" >
            <div class="box-center text-center">
            <ul class="album" style="display;inline; width:500px;overflow-y:hidden;overflow-x:auto;">
                    <?php if($postdata['videos']) : $i=1; foreach($postdata['videos'] as $video) { $videoId = getYoutubeVideoId($video['video']); ?>
                        <li id="album-thumb-<?php echo $i;?>"><img src="<?php echo resizeImage($video['video_image'], "common_assets/cache/". $videoId.substr(basename($video['video_image']),0,-4). "_116x56.jpg", 116, 56);?>" alt="Viaslide.com" /></li>
                    <?php } endif; ?>
                    <?php if($postdata['images']) :$i=1; foreach($postdata['images'] as $image) { ?>
                    <?php $img = chk_thumb($image['image'],0);?>
                        <li id="album-thumb-<?php echo $i;?>"  onClick="change_content(this.id)" class="thumb-nav"><a href="#"><img src="<?php echo DOCROOT.$img;?>" alt ="<small><?php echo $i.'/'.$total_slide.'&nbsp;Slides</small><br>'. $image['title'].'<p>'.$image['content'].'</p>';?>" />
                            <small><?php echo $i.'/'.$total_slide; ?>&nbsp;Slides</small>
                        </a></li>
                    <?php $i++;}   endif; ?>
            </ul>
            </div>

            <div class="slide-box">
                <div class="row-fluid">

                    <span class="prev-slide" onclick="prev()" style="cursor:pointer; display: block;overflow: hidden;position: absolute;width: 32px;height: 32px;background-image: url(http://localhost/viaslide4/beta/view/themes/default/slideshow/skins/carouselarrows-32-32-0.png);left: 2%;top: 50%;margin-top: 23px;background-position: 0% 50%;background-repeat: no-repeat no-repeat;">
                    
                </span>
                <div class="img-box"  id="albumImage">
                
                
                <div class="" style="disaply:block; background-color:black;">
                <img class="img-responsive" src = "<?php echo $postdata['images'][0]['image'];?>"  style="margin: 0px auto;height:500px; overflow:hidden; width:auto;">
                </div>
                
                </div>
                <span class="next-slide" onclick="next()" style="display: block; cursor:pointer;  overflow: hidden;position: absolute;width: 32px;height: 32px;background-image: url(http://localhost/viaslide4/beta/view/themes/default/slideshow/skins/carouselarrows-32-32-0.png);right: 2%;top: 50%;margin-top: 23px;background-position: 100% 50%;background-repeat: no-repeat no-repeat;">
                </span>
                
                
            </div>
            </div>


        </div>



        <div class="modal-footerx" style="z-index:99999;">
        <div id ="slidetext" class="text-center">
                <?php echo $postdata['images'][0]['title'].'<br><p>'.$postdata['images'][0]['content'].'</p>';?>
                </div>
          <!--button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button-->
        </div>
      </div><!-- /.modal-content -->


    </div><!-- /.modal-dialog -->




<br>



</body>
</html>