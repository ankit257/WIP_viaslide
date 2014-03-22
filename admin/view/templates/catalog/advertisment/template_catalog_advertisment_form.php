<?php echo $header; echo $menu; ?>
<div id="content">
  <div class="breadcrumb">
        <a href="index.php?route=common/home">Home</a>
         :: <a href="index.php?route=catalog/advertisment">Advertisment</a>
      </div>
    
    <?php if(!empty($notification)) : ?>  
    <div class="warning"><?php echo $notification; ?></div>  
    <?php endif; ?>
      
    <div class="box">
    <div class="heading">
      <h1><img alt="" src="view/image/advertisment.png"> Advertisment</h1>
      <div class="buttons"><a class="button" onclick="$('#form').submit();">Save</a><a class="button" href="index.php?route=catalog/advertisment">Cancel</a></div>
    </div>
    <div class="content">
      <div class="htabs" id="tabs"><a href="#tab-general" style="display: inline;" class="selected">General</a></div>
      <form id="form" enctype="multipart/form-data" method="post" action="">
        <div id="tab-general" style="display: block;">
          <div class="htabs" id="languages">
                        <a href="#language1" style="display: inline;" class="selected"><img banner_name="English" src="view/image/flags/gb.png"> English</a>
                      </div>
                    <div id="language1" style="display: block;">

	<table class="form">
		<tbody>
			<tr>
                <td><span class="required">*</span> Advertisment Name:</td>
                <td><input type="text" value="<?php echo $name; ?>" size="100" name="info[banner_name]">
                	<?php if(!empty($advertisment_name_error)) : ?>
                	<span class="error"><?php echo $advertisment_name_error; ?></span>
                    <?php endif; ?>
                </td>
			</tr>
            
			<tr>
                <td>Ad Banner Script::<br><span class="help">If google ad script then paste here.. Note: if this is used then below fields should be blank except Ad Banner Position</span></td>
                <td><textarea class="ckeditor" id="description1" name="info[content]" style="visibility: hidden; display: none;"><?php echo $content; ?></textarea></td>
			</tr>
              
			<tr>
              <td>Ad Banner Width:<br><span class="help">Type the width of Banner for ex: 100</span></td>
              <td><input type="text" value="<?php echo $dbInfo['banner_width']; ?>" name="info[banner_width]"></td>
            </tr>

			<tr>
              <td>Ad Banner Height:<br><span class="help">Type the Height of Banner for ex: 100</span></td>
              <td><input type="text" value="<?php echo $dbInfo['banner_height']; ?>" name="info[banner_height]"></td>
            </tr>

			<tr>
              <td>Ad Banner Url:<br><span class="help">Full Url where redirect</span></td>
              <td><input type="text" value="<?php echo $dbInfo['banner_url']; ?>" name="info[banner_url]"></td>
            </tr>

			<tr>
              <td>Ad Layout Page:<br><span class="help">On which page want to display for ex: home,information</span></td>
              <td><input type="text" value="<?php echo $dbInfo['layout_page']; ?>" name="info[layout_page]"></td>
            </tr>

			<tr>
              <td>Ad Banner Position:<br><span class="help">Banner Group Position.. for ex: if want to display on top then type top or want to display on left then type left</span></td>
              <td><input type="text" value="<?php echo $dbInfo['banner_position']; ?>" name="info[banner_position]"></td>
            </tr>


            <tr>
              <td>Image:</td>
              <td valign="top"><div class="image"><img width="100" height="100" id="thumbMain" alt="" src="<?php echo !empty($image) ? $image : $no_image ; ?>">
                  <input type="hidden" id="imageMain" value="<?php echo $image; ?>" name="info[banner_image]">
                  <br>
                  <a onclick="image_upload('imageMain', 'thumbMain');">Browse</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumbMain').attr('src', <?php echo $no_image; ?>); $('#imageMain').attr('value', '');">Clear</a></div></td>
            </tr>            

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

      </form>
    </div>
  </div>
</div>

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
$('input[name=\'path\']').autocomplete({
	delay: 500,
	source: function(request, response) {		
		$.ajax({
			url: 'index.php?route=catalog/advertisment/autocomplete&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {
				json.unshift({
					'advertisment_id':  0,
					'name':  ' --- None --- '
				});
				
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.advertisment_id
					}
				}));
			}
		});
	},
	select: function(event, ui) {
		$('input[name=\'path\']').val(ui.item.label);
		$('input[name=\'parent_id\']').val(ui.item.value);
		
		return false;
	},
	focus: function(event, ui) {
      	return false;
   	}
});
//--></script> 
<script type="text/javascript"><!--
// Filter
$('input[name=\'filter\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/filter/autocomplete&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.filter_id
					}
				}));
			}
		});
	}, 
	select: function(event, ui) {
		$('#advertisment-filter' + ui.item.value).remove();
		
		$('#advertisment-filter').append('<div id="advertisment-filter' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="advertisment_filter[]" value="' + ui.item.value + '" /></div>');

		$('#advertisment-filter div:odd').attr('class', 'odd');
		$('#advertisment-filter div:even').attr('class', 'even');
				
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});

$('#advertisment-filter div img').live('click', function() {
	$(this).parent().remove();
	
	$('#advertisment-filter div:odd').attr('class', 'odd');
	$('#advertisment-filter div:even').attr('class', 'even');	
});
//--></script> 

<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script>
<script type="text/javascript"><!--

$('#tabs a').tabs(); 

$('#languages a').tabs(); 

//--></script> 

<?php echo $footer; ?>