<?php echo $header; ?>
	<div class="container vsmain">
		<div class="inner-main" style="width:97.3%;">
     		<h1 class="headingxl" style="margin:13px 0 8px 0;"><?php echo $heading; ?></h1>
            
            <div class="side-panel">
            
            	<h3><a href="<?php echo DOCROOT; ?>">Home</a></h3>
                            
				<h3>
                <?php echo $InformationHeading; ?>
                
                <?php if($Informations) : ?>
                <ul class="side-panel-list">
                <?php foreach($Informations as $information) { ?>
                <?php echo '<li><a href="index.php?route=information/information&id='. $information['id']. '">'.$information['title']. '</a></li>'; ?>
                <?php } ?>
                <?php echo '<li><a href="index.php?route=faq/index">FAQs</a></li>'; ?>
                </ul>
                <?php endif; ?>
				</h3>
                
                <h3>
                	My Account
	                <ul class="side-panel-list">
                    	<li><a href="index.php?route=account/index">Manage Account</a></li>
                        <li><a href="index.php?route=account/addpost">Create Slide Show</a></li>
                        <li><a href="index.php?route=account/myposts">My Posts</a></li>
                        <li><a href="index.php?route=account/editprofile">Edit Profile</a></li>
                        <li><a href="index.php?route=account/changepwd">Change Password</a></li>
                    </ul>
                </h3>
                
			</div>
            
            
            <div class="side-panel" style="margin-left:300px;">
            	<?php if($Categories) : ?>
                <h3>
                	Search Posts
                    <ul class="side-panel-list">
                    <?php foreach($Categories as $category) { ?>
                    <li>
                        <?php echo '<a href="index.php?route=post/listing&cat_id='. $category['id']. '">'.$category['name']. '</a>'; ?>
                        <?php if($category['childs']) : ?>
                        <ul class="side-panel-list">
                        <?php foreach($category['childs'] as $catLevel1) { ?>
                        <li><?php echo '<a href="index.php?route=post/listing&cat_id='. $catLevel1['id']. '">'.$catLevel1['name']. '</a>'; ?></li>
                        <?php } ?>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php } ?>
                    </ul>
                </h3>
                <?php endif; ?>
                
            </div>
            
    	</div>
	</div>
<?php echo $footer; ?>
