<?php echo $header; echo $menu; ?>
<div id="content">
  <div class="breadcrumb">
        <a href="index.php?route=common/home">Home</a>
         :: <a href="index.php?route=catalog/post">Post</a>
      </div>
    
    <?php if(!empty($notification)) : ?>  
    <div class="warning"><?php echo $notification; ?></div>  
    <?php endif; ?>
      
    <div class="box">
    <div class="heading">
      <h1><img alt="" src="view/image/post.png"> Post</h1>
      <div class="buttons"><a class="button" onclick="$('#form').submit();">Save</a><a class="button" href="index.php?route=catalog/post">Cancel</a></div>
    </div>
    <div class="content">
      <div class="htabs" id="tabs"><a href="#tab-general" style="display: inline;" class="selected">General</a><a href="#tab-data" style="display: inline;" class="">Additional Informations</a><a href="#tab-images" style="display: inline;" class="">Image</a><a href="#tab-videos" style="display: inline;" class="">Video</a></div>
      <form id="form" enctype="multipart/form-data" method="post" action="">
        <div id="tab-general" style="display: block;">
          <div class="htabs" id="languages">
                        <a href="#language1" style="display: inline;" class="selected"><img name="English" src="view/image/flags/gb.png"> English</a>
                      </div>
                    <div id="language1" style="display: block;">
            <table class="form">
              <tbody>
              
              <tr>
                <td><span class="required">*</span> Title:</td>
                <td><input type="text" value="<?php echo $title; ?>" size="100" name="info[title]">
                	<?php if(!empty($post_name_error)) : ?>
                	<span class="error"><?php echo $post_name_error; ?></span>
                    <?php endif; ?>
                </td>
              </tr>
              
              <tr>
                <td>Meta Tag Description:</td>
                <td><textarea rows="5" cols="40" name="info[meta_description]"><?php echo $meta_description; ?></textarea></td>
              </tr>
              
              <tr>
                <td>Meta Tag Keywords:</td>
                <td><textarea rows="5" cols="40" name="info[meta_keyword]"><?php echo $meta_keyword; ?></textarea></td>
              </tr>
              
              <tr>
                <td>Description:</td>
                <td><textarea class="ckeditor" id="description1" name="info[content]" style="visibility: hidden; display: none;"><?php echo $content; ?></textarea></td>
              </tr>

			<tr>
              	<td>Category :</td>
				<td>
                	<?php if($categories) : foreach($categories as $category) { ?>
					<br /><input type="checkbox" name="post_category[]" value="<?php echo $category[id]; ?>"  <?php echo in_array($category[id],$SelectedCategoriesID) ? 'checked="checked"' : ''; ?>><?php echo $category[name]; ?>
                    <?php } endif; ?>
                </td>
			</tr>

			<tr>
                <td> Display on Home Page <span class="help">If want to display on home page </span></td>
                <td>
                	<select name="info[home_page_display]">
        	        	<option <?php echo $home_page_display == 1 ? 'selected="selected"' : ''; ?> value="1">Yes</option>
						<option <?php echo $home_page_display == 0 ? 'selected="selected"' : ''; ?> value="0">No</option>
					</select>
				</td>

			</tr>

			<tr>
                <td>Status:</td>
                <td>
                	<select name="info[status]">
        	        	<option <?php echo $status == 1 ? 'selected="selected"' : ''; ?> value="1">Enabled</option>
						<option <?php echo $status == 0 ? 'selected="selected"' : ''; ?> value="0">Disabled</option>
					</select>
				</td>
			</tr>
            </tbody></table>
          </div>
                  </div>
        <div id="tab-data" style="display: none;">
          <table class="form">
            <tbody>
<!--
            <tr>
              <td>Rating:</td>
              <td><input type="text" value="<?php echo $rating; ?>" name="info[rating]"></td>
            </tr>

            <tr>
              <td>Total Likes:</td>
              <td><input type="text" value="<?php echo $total_likes; ?>" name="info[total_likes]"></td>
            </tr>
            
            <tr>
              <td>Total Dislikes:</td>
              <td><input type="text" value="<?php echo $total_dislikes; ?>" name="info[total_dislikes]"></td>
            </tr>
 -->           
            <tr>
              <td>Total Views:</td>
              <td><input type="text" value="<?php echo $total_views; ?>" name="info[total_views]"></td>
            </tr>


            <tr>
              <td>SEO Keyword:<br><span class="help">Do not use spaces instead replace spaces with - and make sure the keyword is globally unique.</span></td>
              <td><input type="text" value="<?php echo $keyword; ?>" name="info[keyword]"></td>
            </tr>
 
            <tr>
              <td>Sort Order:</td>
              <td><input type="text" size="1" value="<?php echo $sort_order; ?>" name="info[sort_order]"></td>
            </tr>


          </tbody></table>
        </div>

		<div id="tab-images" style="display: block;">
          <table class="form">
	          <tbody>
              <tr>
              <td>Main Image:</td>
              <td valign="top"><div class="image"><img width="100" height="100" id="thumbMain" alt="" src="<?php echo !empty($image) ? $image : $no_image ; ?>">
                  <input type="hidden" id="imageMain" value="<?php echo $image; ?>" name="info[image]">
                  <br>
                  <a onclick="image_upload('imageMain', 'thumbMain');">Browse</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumbMain').attr('src', <?php echo $no_image; ?>); $('#imageMain').attr('value', '');">Clear</a></div></td>
            </tr>
          
    	      </tbody>
          </table>
         
          Additional Images:
          <table class="list" id="images">
            <thead>
              <tr>
                <td class="left">Image:</td>
                <td class="left">Title:</td>
                <td class="left">Description:</td>
                <td class="right">Sort Order:</td>
                <td></td>
              </tr>
            </thead>
			<?php if($images) : $i=1; foreach($images as $postImage) { ?>
            <tbody id="image-row<?php echo $i; ?>">
              <tr>
                <td class="left">
                	<div class="image">
                    	<img widht="100" height="100" src="<?php echo $postImage['image']; ?>" alt="" id="thumb<?php echo $i; ?>"><input type="hidden" name="post_image[<?php echo $i; ?>][image]" value="<?php echo $postImage['image']; ?>" id="image<?php echo $i; ?>"><br><a onclick="image_upload('image<?php echo $i; ?>', 'thumb<?php echo $i; ?>');">Browse</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb<?php echo $i; ?>').attr('src', ''); $('#image<?php echo $i; ?>').attr('value', '');">Clear</a>
					</div>
				</td>
				<td class="right"><input type="text" name="post_image[<?php echo $i; ?>][title]" value="<?php echo $postImage['title']; ?>" size="50"></td>
				<td class="right"><input type="text" name="post_image[<?php echo $i; ?>][content]" value="<?php echo $postImage['content']; ?>" size="50"></td>
                <td class="right"><input type="text" name="post_image[<?php echo $i; ?>][sort_order]" value="<?php echo $postImage['sort_order']; ?>" size="2"></td>

                
                <td class="left"><a onclick="$('#image-row<?php echo $i; ?>').remove();" class="button">Remove</a></td>
			  </tr>
			</tbody>
            <?php $i++; } endif; ?>
            <tfoot>
              <tr>
                <td colspan="4"></td>
                <td class="left"><a class="button" onclick="addImage();">Add Image</a></td>
              </tr>
            </tfoot>
          </table>
        </div>

		<div id="tab-videos" style="display: block;">
          <table class="list" id="videos">
            <thead>
              <tr>
                <td class="left">Video Image:</td>
                <td class="left">Video Link:</td>
                <td class="left">Title:</td>
                <td class="left">Description:</td>
                <td class="right">Sort Order:</td>
                <td></td>
              </tr>
            </thead>
			<?php if($videos) : $i=1; foreach($videos as $postVideo) { ?>
            <tbody id="video-row<?php echo $i; ?>">
              <tr>
                <td class="left">
                	<div class="image">
                    	<img widht="100" height="100" src="<?php echo $postVideo[video_image]; ?>" alt="" id="thumbVideo<?php echo $i; ?>"><input type="hidden" name="post_video[<?php echo $i; ?>][image]" value="<?php echo $postVideo[video_image]; ?>" id="imageVideo<?php echo $i; ?>"><br><a onclick="image_upload('imageVideo<?php echo $i; ?>', 'thumbVideo<?php echo $i; ?>');">Browse</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumbVideo<?php echo $i; ?>').attr('src', ''); $('#imageVideo<?php echo $i; ?>').attr('value', '');">Clear</a>
					</div>
				</td>
                <td class="left"><input type="text" name="post_video[<?php echo $i; ?>][video]" value="<?php echo $postVideo['video']; ?>" size="50"></td>
                <td class="right"><input type="text" name="post_video[<?php echo $i; ?>][title]" value="<?php echo $postVideo['title']; ?>" size="50"></td>
				<td class="right"><input type="text" name="post_video[<?php echo $i; ?>][content]" value="<?php echo $postVideo['content']; ?>" size="50"></td>
                <td class="right"><input type="text" name="post_video[<?php echo $i; ?>][sort_order]" value="<?php echo $postVideo['sort_order']; ?>" size="2"></td>
                <td class="left"><a onclick="$('#video-row<?php echo $i; ?>').remove();" class="button">Remove</a></td>
			  </tr>
			</tbody>
            <?php $i++; } endif; ?>
            <tfoot>
              <tr>
                <td colspan="5"></td>
                <td class="left"><a class="button" onclick="addVideo();">Add Video</a></td>
              </tr>
            </tfoot>
          </table>
        </div>

      </form>
    </div>
  </div>
</div>

<script type="text/javascript"><!--
  $(function() {
    $( "#dateFrom" ).datepicker({ dateFormat: "yy-mm-dd" });
	$( "#dateTo" ).datepicker({ dateFormat: "yy-mm-dd" });
    $( "#Event_Date_From" ).datepicker({ dateFormat: "yy-mm-dd" });
    $( "#Event_Date_To" ).datepicker({ dateFormat: "yy-mm-dd" });
    $( "#hotdeal_dateFrom" ).datepicker({ dateFormat: "yy-mm-dd" });
    $( "#hotdeal_dateTo" ).datepicker({ dateFormat: "yy-mm-dd" });

  });
//--></script> 

<script type="text/javascript"><!--
function image_upload(field, thumb) {
	$('#dialog').remove();
	
//	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
		$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="elfinder/index.php" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
	$('#dialog').dialog({
		name: 'Image Manager',
		close: function (event, ui) {
			//var abc = $.cookie("imagefile");
			//alert(readCookie("imagefile"));
			data = readCookie("imagefile");
			$('#' + thumb).replaceWith('<img width="100" height="100" src="elfinder/files/' + data + '" alt="" id="' + thumb + '" />');
			$('#' + field).val('elfinder/files/' + data);
			/*
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'elfinder/elfinder.html&image=' + encodeURIComponent($('#' + field).val()),
					dataType: 'text',
					success: function(data) {
						alert(data);
						$('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
					}
				});
			}
			*/
		},	
		bgiframe: false,
		width: 800,
		height: 400,
		resizable: false,
		modal: false
	});
};
//--></script> 
<script type="text/javascript"><!--
$('input[name=\'category\']').autocomplete({
	delay: 500,
	source: function(request, response) {		
		$.ajax({
			url: 'index.php?route=catalog/category/autocomplete&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {
				json.unshift({
					'id':  0,
					'name':  ' --- None --- '
				});
				
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.id
					}
				}));
			}
		});
	},
	select: function(event, ui) {
		$('#post-category' + ui.item.value).remove();
		
		$('#post-category').append('<div id="post-category' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="post_category[]" value="' + ui.item.value + '" /></div>');

		$('#post-category div:odd').attr('class', 'odd');
		$('#post-category div:even').attr('class', 'even');
				
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});

$('#post-category div img').live('click', function() {
	$(this).parent().remove();
	
	$('#post-category div:odd').attr('class', 'odd');
	$('#post-category div:even').attr('class', 'even');	
});

//--></script> 

<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script>
<script type="text/javascript"><!--

$('#tabs a').tabs(); 

$('#languages a').tabs(); 

//--></script> 

<script>
function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else var expires = "";
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = escape(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return unescape(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}
</script>


<script type="text/javascript"><!--

var image_row = <?php echo $image_row; ?>;



function addImage() {

    html  = '<tbody id="image-row' + image_row + '">';

	html += '  <tr>';

	html += '    <td class="left"><div class="image"><img widht="100" height="100" src="<?php echo $no_image; ?>" alt="" id="thumb' + image_row + '" /><input type="hidden" name="post_image[' + image_row + '][image]" value="" id="image' + image_row + '" /><br /><a onclick="image_upload(\'image' + image_row + '\', \'thumb' + image_row + '\');">Browse</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$(\'#thumb' + image_row + '\').attr(\'src\', \'<?php echo $no_image; ?>\'); $(\'#image' + image_row + '\').attr(\'value\', \'\');">Clear</a></div></td>';

	html += '    <td class="right"><input type="text" name="post_image[' + image_row + '][title]" value="" size="50" /></td>';
	
	html += '    <td class="right"><input type="text" name="post_image[' + image_row + '][content]" value="" size="50" /></td>';
	
	html += '    <td class="right"><input type="text" name="post_image[' + image_row + '][sort_order]" value="" size="2" /></td>';

	html += '    <td class="left"><a onclick="$(\'#image-row' + image_row  + '\').remove();" class="button">Remove</a></td>';

	html += '  </tr>';

	html += '</tbody>';

	

	$('#images tfoot').before(html);

	

	image_row++;

}

//--></script> 


<script type="text/javascript"><!--

var video_row = <?php echo $video_row; ?>;



function addVideo() {

    html  = '<tbody id="video-row' + video_row + '">';

	html += '  <tr>';

	html += '    <td class="left"><div class="image"><img widht="100" height="100" src="<?php echo $no_image; ?>" alt="" id="thumbVideo' + video_row + '" /><input type="hidden" name="post_video[' + video_row + '][image]" value="" id="imageVideo' + video_row + '" /><br /><a onclick="image_upload(\'imageVideo' + video_row + '\', \'thumbVideo' + video_row + '\');">Browse</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$(\'#thumbVideo' + video_row + '\').attr(\'src\', \'<?php echo $no_image; ?>\'); $(\'#imageVideo' + video_row + '\').attr(\'value\', \'\');">Clear</a></div></td>';

	html += '    <td class="left"><input type="text" name="post_video[' + video_row + '][video]" value="" size="50" /></td>';
	
	html += '    <td class="right"><input type="text" name="post_video[' + image_row + '][title]" value="" size="50" /></td>';
	
	html += '    <td class="right"><input type="text" name="post_video[' + image_row + '][content]" value="" size="50" /></td>';
	
	html += '    <td class="right"><input type="text" name="post_video[' + video_row + '][sort_order]" value="" size="2" /></td>';

	html += '    <td class="left"><a onclick="$(\'#video-row' + video_row  + '\').remove();" class="button">Remove</a></td>';

	html += '  </tr>';

	html += '</tbody>';

	

	$('#videos tfoot').before(html);

	

	video_row++;

}

//--></script> 

<script type="text/javascript"><!--

var menu_row = <?php echo $menu_row; ?>;



function addMenu() {

    html  = '<tbody id="menu-row' + menu_row + '">';

	html += '  <tr>';

	html += '    <td class="left"><div class="image"><img widht="100" height="100" src="<?php echo $no_image; ?>" alt="" id="thumbMenu' + menu_row + '" /><input type="hidden" name="post_menu[' + menu_row + '][image]" value="" id="imageMenu' + menu_row + '" /><br /><a onclick="image_upload(\'imageMenu' + menu_row + '\', \'thumbMenu' + menu_row + '\');">Browse</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$(\'#thumbMenu' + menu_row + '\').attr(\'src\', \'<?php echo $no_image; ?>\'); $(\'#imageMenu' + menu_row + '\').attr(\'value\', \'\');">Clear</a></div></td>';

	html += '    <td class="right"><input type="text" name="post_menu[' + menu_row + '][sort_order]" value="" size="2" /></td>';

	html += '    <td class="left"><a onclick="$(\'#menu-row' + menu_row  + '\').remove();" class="button">Remove</a></td>';

	html += '  </tr>';

	html += '</tbody>';

	

	$('#menus tfoot').before(html);

	

	menu_row++;

}

//--></script> 

<script type="text/javascript"><!--
	$("#cities").change( function() {
		$.post("index.php?route=catalog/category/getChilds&id=" + $('#cities').val(), function(data) {
			jsonObj = $.parseJSON(data);
			
			var result = "<option value=\"\">Select</option>" ;
			for(var i in jsonObj) {
				result += "<option value=" + jsonObj[i]["id"] + ">" + jsonObj[i]["name"] + "</option>";
				//alert(jsonObj[i]["region_name"]);
				
			}
			$("#zones").html(result);
			$("#localities").html("<option value=\"\">Select</option>");
		});
	});
	
	$("#zones").change( function() {
		$.post("index.php?route=catalog/category/getChilds&id=" + $('#zones').val(), function(data) {
			jsonObj = $.parseJSON(data);
			
			var result = "<option value=\"\">Select</option>" ;
			for(var i in jsonObj) {
				result += "<option value=" + jsonObj[i]["id"] + ">" + jsonObj[i]["name"] + "</option>";
				//alert(jsonObj[i]["region_name"]);
				
			}
			$("#localities").html(result);
		});
	});
	
	
	$("#post_type").change( function() {
		$("#post_type_val").val($("#post_type option:selected").text());
	});
	


	$("#Event_Cities").change( function() {
		$.post("index.php?route=catalog/category/getChilds&id=" + $('#Event_Cities').val(), function(data) {
			jsonObj = $.parseJSON(data);
			
			var result = "<option value=\"\">Select</option>" ;
			for(var i in jsonObj) {
				result += "<option value=" + jsonObj[i]["id"] + ">" + jsonObj[i]["name"] + "</option>";
				//alert(jsonObj[i]["region_name"]);
				
			}
			$("#Event_Zones").html(result);
			$("#Event_Localities").html("<option value=\"\">Select</option>");
		});
	});
	
	$("#Event_Zones").change( function() {
		$.post("index.php?route=catalog/category/getChilds&id=" + $('#Event_Zones').val(), function(data) {
			jsonObj = $.parseJSON(data);
			
			var result = "<option value=\"\">Select</option>" ;
			for(var i in jsonObj) {
				result += "<option value=" + jsonObj[i]["id"] + ">" + jsonObj[i]["name"] + "</option>";
				//alert(jsonObj[i]["region_name"]);
				
			}
			$("#Event_Localities").html(result);
		});
	});


	$(window).load(function() {
		//alert("hi");
  		//$('#cities').trigger('change');
	});
	

//--></script> 

<?php echo $footer; ?>