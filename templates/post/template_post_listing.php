<script type="text/javascript">
    var grid = new Array(3);
    for (i=0; i<8; i++){
        grid[i] = new Array(3); 
    };
    for (i = 0 ; i<8; i++) {
        for (j = 0; j < 3; j++) {
            grid[i][j] = 0;
        };
    };
</script>

<ul class="items">
<?php if($postList): $i=0; foreach($postList as $post) { if ($i%4==0){} ?>
		<li  class="strip" style="position:absolute; left:0; top:0;">
		 <div class="box-1">
      <div class="box-1-media">
                    <a class="card-media-container" href="<? echo DOCROOT; ?>slide/<?php echo $post['id'].'/'.$post['slug'] ; ?>">
                    <?php 
                    // $updir = chk_thumb($post['image'],1);
                    echo '<img class="img-responsive" src="'.$post['image'].'">';
                    ?>
                    <?php
                    // <img src="<?php echo $thisRow['type']=="image" ? resizeImage($thisRow['image'], "common_assets/cache/".substr(basename($thisRow['image']),0,-4). "_255x160.jpg", 255, 160) : resizeImage($thisRow['image'], "common_assets/cache/". getYoutubeImageId($thisRow['image']).substr(basename($thisRow['image']),0,-4). "_255x160.jpg", 255, 160); 
                    ?>
                    <img src="<?php echo DOCROOT;?><?php echo  $post['type']=="image" ? $updir : resizeImage($thisRow['image'], "common_assets/cache/". getYoutubeImageId($post['image']).substr(basename($post['image']),0,-4). "_255x160.jpg", 255, 160); ?>" />
                        <?php if(  $post['type'] == "video"  ) : ?>
                          <img style="position:; margin-top:50px; margin-left:-150px;" src="<?php echo THEMEPATH; ?>images/play.png" width="46" height="46" />
                        <?php endif; ?>
                    </a>
                    </div>
                
                    <div class="box-1-title">
                      <a class="title pull-left" href="<?php echo DOCROOT; ?>slide/<?php echo $post['id'].'/'.$post['slug'] ; ?>"><?php echo $post['title']; ?></a>
                    </div>
                    <?php echo $post['content']; ?>
                    <small class="pull-left"><a href="<?php echo DOCROOT; ?>user/<?php echo $post['submit_by'] ?>" style="color:#A9A9A9;"><strong><?php echo $post['submit_by_user']; ?></strong></a></small>
                    <small class="pull-right" style="color:#A9A9A9;"><?php echo $post['total_views'];?> views,&nbsp;<?php echo ago($post['created']); ?></small>
                    <br>
                    </li>
                    <?php $i++; } endif; ?>
</ul>

<?php // echo $pagination; ?>
	 
    
  
<script>
	$("#selectPageNo").live('change', function() {
		var SelectedPageNo = $("#selectPageNo").val();
		//alert(window.location.href);
		$("#PageChange").submit();
	});
</script>

<script type="text/javascript">
$(document).ready(function(e){
    $( ".items li" ).each(function( index ) {
        var c = placement(0);
            $(this).css("left",c.x);
            $(this).css("top",c.y);
    });
}); 
</script>



<script type="text/javascript">
function placement(a){
    var grid_item_h = 250, grid_item_w = 250;
    // var h = a.height/grid_item_h;
    // var w = a.width/grid_item_w;
    //var y, x;
    asd:
    switch(a){
        case 0:
        for (i = 0 ; i <12; i++){
            for (j = 0; j < 3; j++) {
                if(i<12 && j<3){
                    
                 if(grid[i][j] == 0){
                    var x = i*grid_item_h;
                    var y = j*grid_item_w;
                    //alert(x,y);
                    grid[i][j] = 1;
                    break asd;
                    }
                }
            };
        };
        break;
        case 1:
        for (i = 0 ; i <8; i++) {
            for (j = 0; j < 3; j++) {
                if(i<8 && j<3){
                 if(grid[i][j] == 0 && grid[i+1][j] == 0 && grid[i][j+1] == 0 && grid[i+1][j+1] == 0){
                    var y = i*grid_item_h;
                    var x = j*grid_item_w;
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
        for (i = 0 ; i <8; i++) {
            for (j = 0; j < 3; j++) {
                if(i<8 && j<3){
                 if(grid[i][j] == 0 && grid[i][j+1] == 0){
                    var y = i*grid_item_h;
                    var x = j*grid_item_w;
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
</script>
</div>
</div>
</div>
