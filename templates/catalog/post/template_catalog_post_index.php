<?php echo $header; echo $menu; ?>
<?php //echo "<pre>"; print_r($categories); echo "</pre>"; ?>

<div id="content">
  <div class="breadcrumb">
        <a href="index.php?route=common/home">Home</a>
         :: <a href="index.php?route=catalog/post">Post</a>
      </div>
      <div class="box">
    <div class="heading">
      <h1><img alt="" src="view/image/product.png"> Posts</h1>
      <div class="buttons"><a class="button" href="index.php?route=catalog/post/insert">Insert</a><a class="button" onclick="$('form').submit();">Delete</a></div>
    </div>
    <div class="content">
      <form id="form" enctype="multipart/form-data" method="post" action="index.php?route=catalog/post/delete">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);"></td>
              <td class="center">Image</td>
              <td class="left">
              	<a class="<?php echo isset($_GET[order]) ? strtolower($_GET[order]) : 'asc' ; ?>" href="index.php?route=catalog/post&sort=name&order=<?php echo isset($_GET[order]) && $_GET[order]=='DESC'  ? 'ASC' : 'DESC' ; ?>">Post Title</a>
			  </td>
              <td class="left">Status</td>
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

			<?php if($results) : foreach($results as $post) { ?>
			<tr>
              <td style="text-align: center;"><input type="checkbox" value="<?php echo $post[id]; ?>" name="selected[]"></td>
              <td class="left">&nbsp;</td>
              <td class="left"><?php echo $post[name]; ?></td>
              <td class="left"><?php echo $post[status] == 1 ? 'Enabled' : 'Disabled' ; ?></td>
              <td class="right">[ <a href="index.php?route=catalog/post/update&id=<?php echo $post[id]; ?>">Edit</a> ]  
                </td>
            </tr>
			<?php } endif; // End Main Level ?>
		</tbody>
        </table>
      </form>
      <div class="pagination">
      	<div class="results">Showing <?php echo $recordFrom; ?> to <?php echo $recordTo; ?> of <?php echo $totalRecords; ?> (<?php echo $totalPages; ?> Pages)
          <?php if($totalPages > 1) : ?>
          <form action="" id="PageChange" method="post">
          <br />Pages:
          	<select id="selectPageNo" name="page">
            	<?php for( $i=1; $i <= $totalPages; $i++) { ?>
            	<option <?php echo $pageNo==$i ? 'selected="selected"' : ''; ?>><?php echo $i; ?></option>
                <?php } ?>
            </select>
          </form>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
	$("#selectPageNo").live('change', function() {
		var SelectedPageNo = $("#selectPageNo").val();
		//alert(window.location.href);
		$("#PageChange").submit();
		//alert(SelectedPageNo);
	});
</script>

<script type="text/javascript"><!--
function filter() {
	url = 'index.php?route=catalog/post';
	
	var filter_name = $('input[name=\'filter_name\']').attr('value');
	
	if (filter_name) {
		url += '&filter_name=' + encodeURIComponent(filter_name);
	}
	
	var filter_name = $('input[name=\'filter_name\']').attr('value');
	
	if (filter_name) {
		url += '&filter_name=' + encodeURIComponent(filter_name);
	}
	
	var filter_model = $('input[name=\'filter_model\']').attr('value');
	
	if (filter_model) {
		url += '&filter_model=' + encodeURIComponent(filter_model);
	}
	
	var filter_price = $('input[name=\'filter_price\']').attr('value');
	
	if (filter_price) {
		url += '&filter_price=' + encodeURIComponent(filter_price);
	}
	
	var filter_quantity = $('input[name=\'filter_quantity\']').attr('value');
	
	if (filter_quantity) {
		url += '&filter_quantity=' + encodeURIComponent(filter_quantity);
	}
	
	var filter_status = $('select[name=\'filter_status\']').attr('value');
	
	if (filter_status != '*') {
		url += '&filter_status=' + encodeURIComponent(filter_status);
	}	

	location = url;
}
//--></script> 

<?php echo $footer; ?>
