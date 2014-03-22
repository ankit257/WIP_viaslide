<style>
.textBox {
  height: 600px;
  width: 800px;
  border: 1px #000000 solid;
}
.textBox #sourceText {
  padding: 0;
  margin: 0;

}
#slideSection{
  background: #fff;
  padding: 20px;
}
#editMode label { cursor: pointer; }

input.file {
    cursor: pointer;
    opacity: 0;
    position: relative;
    text-align: right;
    width: 300px;
    z-index: 2;
}
input.file {
    opacity: 0;
    position: relative;
    text-align: right;
    z-index: 2;
}
[type="file"] {
    background: url("../images/upload_btn_bg.png") no-repeat scroll 0 0 transparent;
    height: 40px;
    width: 200px;
}
.select-control{
  width: 150px;
  float: left;
}
#toolBar1{
  display: inline-block;
}
#bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
#percent { position:absolute; display:inline-block; top:3px; left:48%; }
.iconLarge{
  font-size: 48px;
  font-weight: 300;
  cursor: pointer;
  color: #272727;
}

</style>

<script type="text/javascript">
$(document).ready(function(e){
$(".rteControlButtons").click(function(e){
    var ref =  $(this).attr('data-id');
    if(!ref){return false;}
    $(".overlay").show();
    $("#"+ref).addClass("lightbox-show");
});

$("#postType").on('click',function(e){
 //   var checkedType = $("#form_uploadPost input[type='radio']:checked").val();
      alert(123);
   });
});
</script>
<style type="text/css">
#insertPic:hover{
  cursor: pointer;
}
#slideToolbar{
  width:100%;
  height:200px;
  float:left;
}
#formSection{
  float:left;
}
</style>

<!--FORM STARTS-->
<div id="slideSection shadow" style="padding:40px; width:800px;">
<div id="slideToolbar">
  <div id="toolBar1">
Formatting
<select class="form-control select-control" onchange="formatDoc('formatblock',this[this.selectedIndex].value);this.selectedIndex=0;editFocus();">
<option selected value="h1">Title 1 &lt;h1&gt;</option>
<option value="h2">Title 2 &lt;h2&gt;</option>
<option value="h3">Title 3 &lt;h3&gt;</option>
<option value="h4">Title 4 &lt;h4&gt;</option>
<option value="h5">Title 5 &lt;h5&gt;</option>
<option value="h6">Subtitle &lt;h6&gt;</option>
<option value="p">Paragraph &lt;p&gt;</option>
<option value="pre">Preformatted &lt;pre&gt;</option>
</select>
<select  class="form-control select-control" onchange="formatDoc('fontname',this[this.selectedIndex].value);this.selectedIndex=0;editFocus();">
<option class="heading" selected>- font -</option>
<option>Arial</option>
<option>Arial Black</option>
<option>Courier New</option>
<option>Times New Roman</option>
</select>
<select  class="form-control select-control" onchange="formatDoc('fontsize',this[this.selectedIndex].value);editFocus();">
<option class="heading" selected>- size -</option>
<option value="1">Very small</option>
<option value="2">A bit small</option>
<option value="3">Normal</option>
<option value="4">Medium-large</option>
<option value="5">Big</option>
<option value="6">Very big</option>
<option value="7">Maximum</option>
</select>
<select  class="form-control select-control" onchange="formatDoc('forecolor',this[this.selectedIndex].value);this.selectedIndex=0;this.focus();editFocus();">
<option class="heading" selected>- color -</option>
<option value="red">Red</option>
<option value="blue">Blue</option>
<option value="green">Green</option>
<option value="black">Black</option>
<option value="white">White</option>

</select>
<select  class="form-control select-control" onchange="formatDoc('backcolor',this[this.selectedIndex].value);this.selectedIndex=0;editFocus();">
<option class="heading" selected>- background -</option>
<option value="red">Red</option>
<option value="green">Green</option>
<option value="black">Black</option>
</select>
<select  class="form-control select-control" onchange="changeOpacity(this[this.selectedIndex].value);editFocus();">
<option class="opacity" selected>Transparency</option>
<option value="0.0">100%</option>
<option value="0.1">90%</option>
<option value="0.2">80%</option>
<option value="0.3">70%</option>
<option value="0.4">60%</option>
<option value="0.5">50%</option>
<option value="0.6">40%</option>
<option value="0.7">30%</option>
<option value="0.8">20%</option>
<option value="0.9">10%</option>
<option value="1.0">0%</option>
</select>
</div>
<script type="text/javascript">
    function changeOpacity(e){
    document.getElementById("textBack").style.opacity = e;
  }
</script>
<div class="rteControlsBar controls">
                <a href="#" title="Bold" onclick="formatDoc('bold');"><li style="font-size:20px; color:black;" class="fa fa-bold btn btn-default"></li></a>
                <a href="#" title="Italic" onclick="formatDoc('italic');"><li style="font-size:20px; color:black;" class="fa fa-bold btn btn-default"></li></a>
                <a href="#" title="Underline" onclick="formatDoc('underline');"><li style="font-size:20px; color:black;" class="fa fa-bold btn btn-default"></li></a>
                <a href="#" title="Left Align" onclick="formatDoc('justifyleft');"><li style="font-size:20px; color:black;" class="fa fa-bold btn btn-default"></li></a>
                <a href="#" title="Center Align" onclick="formatDoc('justifycenter');"><li style="font-size:20px; color:black;" class="fa fa-bold btn btn-default"></li></a>
                <a href="#" title="Right Align" onclick="formatDoc('justifyright');"><li style="font-size:20px; color:black;" class="fa fa-bold btn btn-default"></li></a>
                <a href="#" title="Numbered List" onclick="formatDoc('insertorderedlist');"><li style="font-size:20px; color:black;" class="fa fa-bold btn btn-default"></li></a>
                <a href="#" title="Dotted List" onclick="formatDoc('insertunorderedlist');"><li style="font-size:20px; color:black;" class="fa fa-bold btn btn-default"></li></a>
                <img class="intLink" title="Bold" onclick="formatDoc('bold');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAInhI+pa+H9mJy0LhdgtrxzDG5WGFVk6aXqyk6Y9kXvKKNuLbb6zgMFADs=" />
                <img class="intLink" title="Italic" onclick="formatDoc('italic');" src="data:image/gif;base64,R0lGODlhFgAWAKEDAAAAAF9vj5WIbf///yH5BAEAAAMALAAAAAAWABYAAAIjnI+py+0Po5x0gXvruEKHrF2BB1YiCWgbMFIYpsbyTNd2UwAAOw==" />
                <img class="intLink" title="Underline" onclick="formatDoc('underline');" src="data:image/gif;base64,R0lGODlhFgAWAKECAAAAAF9vj////////yH5BAEAAAIALAAAAAAWABYAAAIrlI+py+0Po5zUgAsEzvEeL4Ea15EiJJ5PSqJmuwKBEKgxVuXWtun+DwxCCgA7" />
                <img class="intLink" title="Left align" onclick="formatDoc('justifyleft');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAIghI+py+0Po5y02ouz3jL4D4JMGELkGYxo+qzl4nKyXAAAOw==" />
                <img class="intLink" title="Center align" onclick="formatDoc('justifycenter');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAIfhI+py+0Po5y02ouz3jL4D4JOGI7kaZ5Bqn4sycVbAQA7" />
                <img class="intLink" title="Right align" onclick="formatDoc('justifyright');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAIghI+py+0Po5y02ouz3jL4D4JQGDLkGYxouqzl43JyVgAAOw==" />
                <img class="intLink" title="Numbered list" onclick="formatDoc('insertorderedlist');" src="data:image/gif;base64,R0lGODlhFgAWAMIGAAAAADljwliE35GjuaezxtHa7P///////yH5BAEAAAcALAAAAAAWABYAAAM2eLrc/jDKSespwjoRFvggCBUBoTFBeq6QIAysQnRHaEOzyaZ07Lu9lUBnC0UGQU1K52s6n5oEADs=" />
                <img class="intLink" title="Dotted list" onclick="formatDoc('insertunorderedlist');" src="data:image/gif;base64,R0lGODlhFgAWAMIGAAAAAB1ChF9vj1iE33mOrqezxv///////yH5BAEAAAcALAAAAAAWABYAAAMyeLrc/jDKSesppNhGRlBAKIZRERBbqm6YtnbfMY7lud64UwiuKnigGQliQuWOyKQykgAAOw==" />
                <img class="intLink" title="Quote" onclick="formatDoc('formatblock','blockquote');" src="data:image/gif;base64,R0lGODlhFgAWAIQXAC1NqjFRjkBgmT9nqUJnsk9xrFJ7u2R9qmKBt1iGzHmOrm6Sz4OXw3Odz4Cl2ZSnw6KxyqO306K63bG70bTB0rDI3bvI4P///////////////////////////////////yH5BAEKAB8ALAAAAAAWABYAAAVP4CeOZGmeaKqubEs2CekkErvEI1zZuOgYFlakECEZFi0GgTGKEBATFmJAVXweVOoKEQgABB9IQDCmrLpjETrQQlhHjINrTq/b7/i8fp8PAQA7" />
                <img class="intLink" title="Add indentation" onclick="formatDoc('outdent');" src="data:image/gif;base64,R0lGODlhFgAWAMIHAAAAADljwliE35GjuaezxtDV3NHa7P///yH5BAEAAAcALAAAAAAWABYAAAM2eLrc/jDKCQG9F2i7u8agQgyK1z2EIBil+TWqEMxhMczsYVJ3e4ahk+sFnAgtxSQDqWw6n5cEADs=" />
                <img class="intLink" title="Delete indentation" onclick="formatDoc('indent');" src="data:image/gif;base64,R0lGODlhFgAWAOMIAAAAADljwl9vj1iE35GjuaezxtDV3NHa7P///////////////////////////////yH5BAEAAAgALAAAAAAWABYAAAQ7EMlJq704650B/x8gemMpgugwHJNZXodKsO5oqUOgo5KhBwWESyMQsCRDHu9VOyk5TM9zSpFSr9gsJwIAOw==" />
                <a href="#" class="rteControlButtons btn btn-default" data-id="addPictureOverlay"><i class="fa fa-picture-o"></i></a>
          </div>

</div>
<div id="formSection">
<?php if($slideNo){
    echo '<h2>Slide #'.$slideNo.'</h2>';
  }
?>

<form name="compForm" action="http://localhost/viaslide5/index.php?route=account/addslideshow" method="post" enctype="multipart/form-data" onsubmit="if(validateMode()){this.myDoc.value=submitSlide();return true;}return false;" class="form-horizontal" id="form_uploadPost">
<input type="hidden" name="myDoc">
        <div id="presentation"style="position:relative">
            <div id="slide1" class="textBox" style="overflow:hidden;">
              <div class="imageBox ui-widget-content" style="max-width:100%; max-height:100%;overflow:hidden;">
              </div>
              <div class="resizable ui-widget-content" style="max-height:100%;max-width:100%;overflow:hidden;background:none;position:absolute;width:70%;height:60%;left:10%;top:10%;">
                <div class="textBack" style="height:100%; width:100%;position:absolute; background:black; opacity:0.6; z-index:99; padding:12px;"></div>
                <div class="desc" contenteditable="true" style="z-index:100;height:100%;width:100%;padding:12px;position:absolute;overflow:hidden;"><p>Edit Description Here</p></div>
              </div>
            </div>
        </div>
<p id="editMode"><input type="checkbox" name="switchMode" id="switchBox" onchange="setDocMode(this.checked);" /> <label for="switchBox">Show HTML</label></p>
<!--upload -->
<div class="form-group">
  <label class="control-label"></label>
    <div class="controls">
      <span class="span4">
        <input name="finish" type="submit" value="Finish" class="btn btn-default pull-right controllerButton" style="margin-left:25px;"/>
        <input name="next" type="submit" value="Next" class="btn btn-default pull-right" onclick="sendFormContent()" style="margin-left:25px;"/>
      </span>
    </div>
  </div>
</form>       
<!--FORM ENDS-->
<?php // }; ?>
</div>
<script type="text/javascript">
var activeId = 1;
var totalSlides = 1;

</script>
<?php
$a = "Uncheck \"Show HTML\".";
echo $a;
?>
<div id="toolBar2" style="position:absolute; left:900px; top:400px;"></div>
<button class="btn btn-default" onclick="showId();">show active Id</button>
<i class="fa fa-plus-circle iconLarge" onclick="addSlide();" title="Add Slide"></i>
<i class="fa fa-minus-circle iconLarge" onclick="removeSlide();" title="Remove Slide"></i>
<i id="preSlide" class="fa fa-angle-double-left iconLarge fa-3"  onclick="prevSlide();" title="Previous"></i>
<i id="nxtSlide" class="fa fa-angle-double-right iconLarge fa-3"  onclick="nextSlide();" title="Next"></i>
<!--button id="nxtSlide" class="btn btn-default" onclick="nextSlide();">Next Slide</button>
<button id="preSlide" class="btn btn-default" onclick="prevSlide();">Previous Slide</button-->

<script type="text/javascript">
$(function(){
  $("#toolBar2").load('toolbar.html');

});
function showId(){
  editFocus();
  alert(activeId);
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
  document.getElementById("slide"+activeId).style.display = 'none';
  activeId = activeId + 1;
  document.getElementById("slide"+activeId).style.display = 'block';
  editFocus();
  chckArrows(); 
}
function prevSlide(){
  document.getElementById("slide"+activeId).style.display = 'none';
  activeId = activeId - 1;
  document.getElementById("slide"+activeId).style.display = 'block';
  editFocus();
  chckArrows(); 
}
function countSlides(){
    var intx = 0;
    $("#presentation .textBox").each(function(){
     intx = intx+1;
  });
  return intx;
}
function removeSlide(){
  $("#slide"+activeId).remove();
  if(activeId == 1){
    activeId = 0;
    addSlide();
  }
  a = totalslides();
  if(activeId == a && a>1){
    activeId = activeId - 1;
  }
   document.getElementById("slide"+activeId).style.display = 'block';
   updateSlideId();
   editFocus();
}
function updateSlideId(){
  var i = 0;
  $("#presentation .textBox").each(function(){
    i = i+1;
    $(this).attr('id','slide'+i); 
    if(i==activeId){
      $(this).css('display','block');
    }
    else{
      $(this).css('display','none'); 
    }
  });
}
function addSlide()
{
  var insertId = 1 + parseInt(activeId);
  var a = document.createElement("div");
  a.setAttribute('id','slide'+insertId);
  a.setAttribute('class','textBox');
  a.setAttribute('style','overflow:hidden; max-width:100%; max-height:100%;');
  var b = document.createElement("div");
  b.setAttribute('class', 'imageBox');
  b.setAttribute('style', 'overflow:hidden; max-width:100%; height:auto;');
  var c = document.createElement("div");
  c.setAttribute('class','resizable');
  c.setAttribute('style','max-height:100%;max-width:100%;overflow:hidden;background:none;position:absolute;width:70%;height:60%;left:10%;top:10%');
  var d = document.createElement("div");
  d.setAttribute('class','textBack');
  d.setAttribute('style','height:100%; width:100%;position:absolute; background:black; opacity:0.6; z-index:99; padding:12px;');
  var e = document.createElement("div");
  e.setAttribute('class','desc');
   e.setAttribute('contenteditable','true');
  e.setAttribute('style','position:absolute; z-index:100;height:100%;width:100%;padding:12px;overflow:hidden;');
  var f = document.createElement("p");
  f.setAttribute('style','font-size:20px;text-align:center;');
  var g = document.createTextNode('Click here to add Description');
  f.appendChild(g);
  e.appendChild(f);
  c.appendChild(d);
  c.appendChild(e);
  a.appendChild(b);
  a.appendChild(c);
  var ts = countSlides();
  var ib = document.getElementById("presentation");
  if(ts == activeId){
    ib.appendChild(a);  
  }
  else{
    alert(activeId);
    var y = document.getElementById("slide"+insertId);
    ib.insertBefore(a,y);  
  }
  ib = null;
  activeId = insertId;
  textDragAndResize();
  updateSlideId();
  editFocus();
  chckArrows();
};
function editFocus(){
$("#slide"+activeId+" .resizable .desc").focus();
}
function textDragAndResize(){
  $( "#slide"+activeId+" .resizable" ).resizable({
      containment: "#slide"+activeId
    }).draggable({
      containment: "#slide"+activeId
  });
}
function imageDragAndResize(){
  $("#slide"+activeId+" .imageBox").resizable({
      containment: "#slide"+activeId
    }).draggable({
      containment: "#slide"+activeId
    });
}
$(function(){
  imageDragAndResize();
  textDragAndResize();
  chckArrows();
});
function submitSlide(){
  $(".ui-resizable-handle").remove();
  $(".imageBox").removeClass("ui-widget-content ui-resizable ui-draggable");
  $(".resizable").removeClass("ui-widget-content ui-resizable ui-draggable");
  var a = new Array();
  var imgs = new Array();
  var editable_elements = document.querySelectorAll("[contenteditable=true]");
  for (var i = activeId - 1; i >= 0; i--) {
    editable_elements[i].setAttribute("contentEditable", false);
  };
  $("#presentation .textBox").each(function(){
    var sd = $("#presentation .imageBox img").attr("src");
      imgs.push(sd);
     a.push(this.outerHTML);
    // alert(this.outerHTML);
  });
  //alert(a[1]);
  b = JSON.stringify(a);
  //c = JSON.stringify(imgs);
  //var d = new Array();
  //d[0] = b;
  //d[1] = c;
  //var e = JSON.stringify(d);
  return b;
}
$("#presentation").mouseup(function(){
  editFocus();
});
</script>

</div>
</div>
</div>


<script type="text/javascript">
var oDoc, sDefTxt;
function initDoc() {
  oDoc = document.getElementById("presentation");
  sDefTxt = oDoc.innerHTML;
  if (document.compForm.switchMode.checked) { setDocMode(true); }
}
function formatDoc(sCmd, sValue) {

  if (validateMode()) { document.execCommand(sCmd, false, sValue); oDoc.focus(); }
}

function validateMode() {
  if (!document.compForm.switchMode.checked) { return true ; }
  alert("Uncheck \"Show HTML\".");
  oDoc.focus();
  return false;
}


function setDocMode(bToSource) {
  var oContent;
  if (bToSource) {
    //alert('as');
    oContent = document.createTextNode(oDoc.innerHTML);
    oDoc.innerHTML = "";
    var oPre = document.createElement("pre");
    //alert(oContent);
    oDoc.contentEditable = false;
    oPre.id = "sourceText";
    //alert(oPre.id);
    oPre.contentEditable = true;
    oPre.appendChild(oContent);
    oDoc.appendChild(oPre);
  } else {
    if (document.all) {
      oDoc.innerHTML = oDoc.innerText;
    } else {
     oContent = document.createRange();
      oContent.selectNodeContents(oDoc.firstChild);
      oDoc.innerHTML = oContent.toString();
    }
    oDoc.contentEditable = true;
  }
  oDoc.focus();
}



$(document).ready(function(){
  var f = 1;
    initDoc();
    var options = { 
    beforeSend: function() 
    { 
    if(f==0){
       return error();
    }
    else{
      this.preventDefault;
    }
     
      // $("#progress").show();
      //clear everything
      // $("#bar").width('0%');
      // $("#message").html("");
      //$("#percent").html("0%");
    },
    uploadProgress: function(event, position, total, percentComplete) 
    {
       // $("#bar").width(percentComplete+'%');
       // $("#percent").html(percentComplete+'%');
    },
    success: function() 
    {
       // $("#bar").width('100%');
       // $("#percent").html('100%');
         $(".overlay").hide();
         $(".lightbox-show").removeClass("lightbox-show");
      //alert('finish');
    },
    complete: function(response) 
    {
        var a = response.responseText;
        alert(activeId);
        $("#slide"+activeId+" .imageBox").append(a);
        imageDragAndResize();
    },
    error: function()
    {
        // $("#message").html("<font color='red'> ERROR: unable to upload files</font>");
    }
}; 
    $("#addPicture").ajaxForm(options);
    $("#insertPic").ajaxForm(options);
});
</script>

