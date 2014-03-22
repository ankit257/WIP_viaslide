<div class="container">
	<div id="main">

		<div class="row">
        <a href="index.php?route=account/addpost"><div class="main-title">Create New Post</div></a>
        <?php //aPrint($postdata); ?>
        <?php if($postdata) : foreach($postdata['main'] as $thisRow) { ?>
	        <div class="column col-mar">
    	        <img src="<?php echo $thisRow['type']=="image" ? resizeImage($thisRow['image'], "common_assets/cache/".substr(basename($thisRow['image']),0,-4). "_255x160.jpg", 255, 160) : resizeImage($thisRow['image'], "common_assets/cache/". getYoutubeImageId($thisRow['image']).substr(basename($thisRow['image']),0,-4). "_255x160.jpg", 255, 160); ?>" />
            <?php echo $thisRow['title']; ?>&nbsp;<a href="index.php?route=account/editpost&id=<?php echo $thisRow['id']; ?>">Edit</a> | <a target="_blank" href="index.php?route=post/single&post_id=<?php echo $thisRow['id']; ?>">view</a>
            </div>
        <?php } endif; ?>
   		</div>

    </div>
</div>