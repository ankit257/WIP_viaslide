<?php echo $header; echo $menu; ?>
<?php //echo "<pre>"; print_r($categories); echo "</pre>"; ?>

<div id="content">
  <div class="breadcrumb">
        <a href="index.php?route=common/home">Home</a>
         :: <a href="index.php?route=catalog/post">Category</a>
      </div>
      <div class="box">
    <div class="heading">
      <h1><img alt="" src="view/image/category.png"> Categories</h1>
      <div class="buttons"><a class="button" href="index.php?route=catalog/category/insert">Insert</a><a class="button" onclick="$('form').submit();">Delete</a></div>
    </div>
    <div class="content">
      <form id="form" enctype="multipart/form-data" method="post" action="index.php?route=catalog/category/delete">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);"></td>
              <td class="center">Image</td>
              <td class="left">                <a class="<?php echo isset($_GET[order]) ? strtolower($_GET[order]) : 'asc' ; ?>" href="index.php?route=catalog/category&sort=name&order=<?php echo isset($_GET[order]) && $_GET[order]=='DESC'  ? 'ASC' : 'DESC' ; ?>">Category Name</a>
                </td>
              <td class="left">                <a href="index.php?route=catalog/category&sort=i.sort_order&order=DESC">Status</a>
                </td>
              <td class="right">Action</td>
            </tr>
          </thead>
          <tbody>
          	<tr class="filter">
              <td></td>
              <td></td>
              <td><input type="text" value="" name="filter_name" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" style="margin-right: 0px; padding-right: 0px; width: 106px;"></td>
              <td>
              	<select name="filter_status">
                	<option value="*"></option>
                    <option value="1">Enabled</option>
                    <option value="0">Disabled</option>
             	</select>
			  </td>
              <td align="right"><a class="button" onclick="filter();">Filter</a></td>
            </tr>

			<?php if($categories) : foreach($categories as $category) { ?>
			<tr>
              <td style="text-align: center;"><input type="checkbox" value="<?php echo $category[id]; ?>" name="selected[]"></td>
              <td class="left">&nbsp;</td>
              <td class="left"><?php echo $category[name]; ?></td>
              <td class="left"><?php echo $category[status] == 1 ? 'Enabled' : 'Disabled' ; ?></td>
              <td class="right">[ <a href="index.php?route=catalog/category/update&id=<?php echo $category[id]; ?>">Edit</a> ]  
                </td>
            </tr>
			
				<?php if($category[childs]) : foreach($category[childs] as $level1) { ?>
				<tr>
				  <td style="text-align: center;"><input type="checkbox" value="<?php echo $level1[id]; ?>" name="selected[]"></td>
				  <td class="left">&nbsp;</td>
				  <td class="left"><?php echo $category[name]. ' > '. $level1[name]; ?></td>
				  <td class="left"><?php echo $level1[status] == 1 ? 'Enabled' : 'Disabled' ; ?></td>
				  <td class="right">[ <a href="index.php?route=catalog/category/update&id=<?php echo $level1[id]; ?>">Edit</a> ]  
					</td>
				</tr>
			
					<?php if($level1[childs]) : foreach($level1[childs] as $level2) { ?>
					<tr>
					  <td style="text-align: center;"><input type="checkbox" value="<?php echo $level2[id]; ?>" name="selected[]"></td>
					  <td class="left">&nbsp;</td>
					  <td class="left"><?php echo $category[name]. ' > '. $level1[name]. ' > '. $level2[name] ; ?></td>
					  <td class="left"><?php echo $level2[status] == 1 ? 'Enabled' : 'Disabled' ; ?></td>
					  <td class="right">[ <a href="index.php?route=catalog/category/update&id=<?php echo $level2[id]; ?>">Edit</a> ]  
						</td>
					</tr>
			
						<?php if($level2[childs]) : foreach($level2[childs] as $level3) { ?>
						<tr>
						  <td style="text-align: center;"><input type="checkbox" value="<?php echo $level3[id]; ?>" name="selected[]"></td>
						  <td class="left">&nbsp;</td>
						  <td class="left"><?php echo $category[name]. ' > '. $level1[name]. ' > '. $level2[name]. ' > '. $level3[name] ; ?></td>
						  <td class="left"><?php echo $level3[status] == 1 ? 'Enabled' : 'Disabled' ; ?></td>
						  <td class="right">[ <a href="index.php?route=catalog/category/update&id=<?php echo $level3[id]; ?>">Edit</a> ]  
							</td>
						</tr>
						<?php } endif; //End Level 3?>
			
					<?php } endif; //End Level 2?>
			
				<?php } endif; // End Level 1 ?>

			<?php } endif; // End Main Level ?>
		</tbody>
        </table>
      </form>
      <div class="pagination"><div class="results">Showing 1 to 11 of 11 (1 Pages)</div></div>
    </div>
  </div>
</div>

<?php echo $footer; ?>