<!--12363-->
<script src="<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/html2canvas.min.js"></script>
<style>
.toolbarMenuBar{
  transition: background-color .2s;
  -moz-transition: background-color .2s;
  -webkit-transition: background-color .2s; 
}

.textBox #sourceText {
  padding: 0;
  margin: 0;

}
#slideSection{
  background: #fff;
  height: 100%;
  width: 100%;
  margin-right: 0px;
  margin-left: 0px;
  position: absolute;
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
  font-size: 30px;
  font-weight: 300;
  cursor: pointer;
  color: #fff;
  background: #3c3c3c;
  margin: 4px;
  padding: 10px;
  box-shadow: -6px 0 9px -4px rgba(0,0,0,.5),6px 0 9px -4px rgba(0,0,0,.5);
}
#insertPic:hover{
  cursor: pointer;
}
#slideToolbar{
  width:100%;
  float:left;
  padding-left: 240px;
}
#formSection{
  float:left;
  position: relative;
  width: 100%;
  height: 100%;
}
.activeContent{
  border: 1px dotted #000;
}
.rteControlsBar>li{
  display: inline-block;
  list-style: none;
  float: left;
  border-left: 1px solid #ffffff;
}
#frame{
  background: #fff;
}
#presentation{
/*  border: 1px solid #2e2e2e;*/

  z-index: 9;
}
#frame{
  margin: 16px;
}
#backgrounds{
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
}
#backgrounds div{
 position: absolute;
  width: 100%;
  height: 100%; 
}
article{
  z-index: 1;
}
.toolbarMenuBarX{  
      background: #272727;
      color:white;
      vertical-align: baseline;
      line-height: 16px;
      font-size: 14px;
      box-shadow: -6px 0 9px -4px rgba(0,0,0,.5),6px 0 9px -4px rgba(0,0,0,.5);
      color: #757575;
      cursor: pointer;
    }
.toolbarMenuBarZ{  
    background: #272727;
    color:white;
    vertical-align: baseline;
    box-shadow: -6px 0 9px -4px rgba(0,0,0,.5),6px 0 9px -4px rgba(0,0,0,.5);
    color: #757575;
    cursor: pointer;
    padding: 14px;
    transition: background-color .2s;
    -moz-transition: background-color .2s;
    -webkit-transition: background-color .2s; 
}
.toolbarMenuBarZ:hover{
  background: #7fc04c;
}
.textBox{
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-transition: -webkit-transform-origin 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),-webkit-transform 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),visibility 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),opacity 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985);
    -moz-transition: -moz-transform-origin 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),-moz-transform 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),visibility 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),opacity 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985);
    -ms-transition: -ms-transform-origin 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),-ms-transform 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),visibility 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),opacity 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985);
    -o-transition: -o-transform-origin 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),-o-transform 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),visibility 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),opacity 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985);
    transition: transform-origin 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),transform 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),visibility 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985),opacity 800ms cubic-bezier(0.26, 0.86, 0.44, 0.985);
}
.past{
  -webkit-transform: translate3d(0, -100%, 0) rotateX(-90deg) translate3d(0,-100%, 0);
  -moz-transform: translate3d(-100%, 0, 0) rotateX(-90deg) translate3d(-100%, 0, 0);
  -ms-transform: translate3d(-100%, 0, 0) rotateX(-90deg) translate3d(-100%, 0, 0);
  transform: translate3d(0, -100%, 0) rotateX(-90deg) translate3d(0, -100%, 0);}
.future{
  -webkit-transform: translate3d(0, -100%, 0) rotateX(90deg) translate3d(0, 100%, 0);
  -moz-transform: translate3d(100%, 0, 0) rotateX(90deg) translate3d(100%, 0, 0);
  -ms-transform: translate3d(100%, 0, 0) rotateX(90deg) translate3d(100%, 0, 0);
  transform: translate3d(0, 100%, 0) rotateX(90deg) translate3d(0, 100%, 0);
}
.pictureForm{
  width: 100%;
  height: 200px;
  font-size: 48px;
  color: #fff;
}
#inputPicture{
  width: 100%;
  height: 200px;
}
#inputPicture2{
  position: absolute;
  width: 100%;
  height: 100%;
}
#addPicture{
    height: 200px;
    width: 100%;
   /* position: absolute;*/
    
}
.bgThumb{

}
.bgThumb, .imgThumbnail{
   /*position:absolute; */
   /*width:37%; */
   /*padding: 50px;*/
   height:200px;
   overflow: hidden;

}
.bgThumbX{
  margin-top: -200px;
  padding-right: 20%;
  padding-left: 20%;
  box-shadow: -6px 0 9px -4px rgba(0,0,0,.5),6px 0 9px -4px rgba(0,0,0,.5);
}
.hidden{
  display: none;
}
.addDelControls{
  /*float: left;
  display: inline-block;
  width: 50px;
  height: 100px;*/
  bottom: 10px;
position: absolute;
padding-left: 240px;
z-index: 9;
}
.deleteBox{
  width: 20px;
  height: 20px;
  position: absolute;
  top: 0px;
  right: 0px;
  font-size: 20px;
  color: red;
  cursor: pointer;
}
.deleteBox:hover{
  font-size: 22px;
}
.btnCenter{
  width: 50%;
  margin: 0px auto;
}
.textFormat{
  height: 25px;
  vertical-align: middle;
}
.arrowCtls{
  z-index: 99;
  margin-top: 30%;
  position: relative; 
}
.hiddenX{
  opacity: 0;
  z-index: -99;
}
.title5{
  color:#757575;
}
#toolBar2{
  height: 100%;
  overflow: hidden;
  z-index: 999;
}
.selectCustom{
    padding: 12px;
    margin-top:-18px; 
    opacity: 0;
    z-index: 99;
    cursor: pointer;
}
.overSelect{
  /*position: absolute;*/
  height: 40px;
  margin-top:-40px; 
  padding: 12px;
  color: #fff;
  width: 100%;
  background: #272727;
  z-index: -99;
  border-left: 1px solid #ffffff;
}
.asdf{
  position:relative;
  float: left;
}
.past{
  opacity: 0;
}
.future{
  opacity: 0;
}
.present{
  opacity: 1;
}
.slide-control-btn{
  padding: 0.5em 0.75em;
  margin: 0em;
  margin-top: 0.75em;
  margin-bottom: 0.75em;
  font-size: 1.5em;
  width: 100%
}
#toolBar2{
  padding: 0;
}
.toolbar-fixed{
    width: inherit;
    position: fixed;
    z-index: 5;
  }
  .toolbar-menu{
    width: 233px;
    max-width: 233px;
    position: fixed;
    background: rgb(34,34,34);
  }
  .slideshow-section{
    width: 100%;
    padding-left: 240px;
    position: absolute;
    height: 100%;
    padding-top: 50px;
  }
  .color-1{
    background-position: 0px 0px;
  }
  .color-2{
    background-position: 0px -37px;
  }
  .color-3{
    background-position: 0px -74px;
  }
  .color-4{
    background-position: 0px -111px;
  }
  .color-5{
    background-position: 0px -148px;
  }
  .color-6{
    background-position: -37px 0px;
  }
  .color-7{
    background-position: -37px -37px;
  }
  .color-8{
    background-position: -37px -74px;
  }
  .color-9{
    background-position: -37px -111px;
  }
  .color-10{
    background-position: -37px -148px;
  }
  .color-11{
    background-position: -74px 0px;
  }
  .color-12{
    background-position: -74px -37px;
  }
  .color-13{
    background-position: -74px -74px;
  }
  .color-14{
    background-position: -74px -111px;
  }
  .color-15{
    background-position: -74px -148px;
  }
  .color-16{
    background-position: -111px 0px;
  }
  .color-17{
    background-position: -111px -37px;
  }
  .color-18{
    background-position: -111px -74px;
  }
  .colors{
    height: 40px;
    padding-left: 240px;
  }
  .colors div{
    height: 37px;
    width: 37px;
    background-image: url(<?php echo DOCROOT;?>sprite.png);
    position: relative;
    float: left;
    cursor: pointer;

  }
</style>
<div class="colors">
  <div class="color-1"></div>
  <div class="color-2"></div>
  <div class="color-3"></div>
  <div class="color-4"></div>
  <div class="color-5"></div>
  <div class="color-6"></div>
  <div class="color-7"></div>
  <div class="color-8"></div>
  <div class="color-9"></div>
  <div class="color-10"></div>
  <div class="color-11"></div>
  <div class="color-12"></div>
  <div class="color-13"></div>
  <div class="color-14"></div>
  <div class="color-15"></div>
  <div class="color-16"></div>
  <div class="color-17"></div>
  <div class="color-18"></div>
</div>
<div id="slideSection" class="row shadow">
<div id="toolBar2" class="toolbar-menu">
<div class="toolbarMenuBarZ toolbar-fixed" style="top:0;">
  <a href="<?php echo DOCROOT;?>"><h3 class="title ">viaslide</h3></a>
</div>
<div class="x" style=" height:100%;">
<div class="toolbarMenu" style="overflow:auto;padding-top:100px; padding-bottom:80px;">
      <div class="toolbarMenuBar" id="changeBackgroundColor" data-toggle="off" data-option="changeBGC">
        <span id="backgroundColor" class="inlineTools">Background</span>
        <!--span class="inlineTools" id="backgroundColorBlock"></span-->
        <span class="inlineTools fa fa-gear" id="backgroundArrow"></span>
      </div>
      <div class="toolbarMenuOptions" id="changeBGC" data-target="slide" style="display:block;">
        <div id="inputPicture">
                  <form id="addPicture" action="/viaslide5/index.php?route=account/addimage"  onsubmit="validateImage()" method="post" enctype="multipart/form-data">   
                    <input class="form-control solid-bdr file-browse-input" type="file" class="file" id="fileinput" name="myfile" onchange="document.getElementById('submitPictureForm').click();" style="width:100%;height:100%; z-index:-99; opacity:0; cursor:pointer;"/>
                    <input type="submit" id="submitPictureForm" class="btn btn-default pull-right" style="display:none;">
                    <div class="fa fa-picture-o bgThumb bgThumbX" onclick="document.getElementById('fileinput').click();" style="font-size:1000%;text-align:center; z-index:99; cursor:pointer;"></div><br>
                    <div style="text-align:center;font-size:200%; margin-top:-80px;color:#757575;">
                    <div id="message"></div>
                    <div id="percent"></div>
                    <div id="progress"></div>
                    <div id="bar"></div>
                    Click here to Add Picture</div>
                  </form>
                  <div class="bgThumb">
                  <div class="imgThumbnail hidden">
                  <div class="bgThumbOptions customMenu" data-toggle="off" style="top:60%; text-align:center;">  
                        <span id="fontFamily" class="inlineTools button">Stretched&nbsp;<span class="fa fa-angle-down"></span></span>
                        <ul class="listItems hidden">
                          <li class="bgOption" data-bg-option="Stretched" >Stretched</li>
                          <li class="bgOption" data-bg-option="Cover">Cover</li>
                        </ul>
                  </div> 
                  <div class="bgRemoveBtn" style=" top:80%; text-align:center;"><span class="button">Remove Image</span></div>
                  </div>
                  </div>
          </div>
          <div id="changeBGC" data-target="changeBackGClr">
            <h5 class="title5">Background Color</h5>
            <div class="red"></div>
            <div class="green"></div>
            <div class="blue"></div>
            <div class="swatch" class="ui-widget-content ui-corner-all"></div>  
          </div>
      </div>
        <div id="toolBar3"></div>
        <div class="toolbarMenuBar">
            <span class="inlineTools" onclick="insertTextBox()" data-toggle="off" style="width:80%;">Insert Text Box</span>
            <span id="insertText" class="inlineTools fa fa-gear" onclick="insertTextBoxSettings()" style="width:18%; font-size:20px;" data-toggle="off" data-option="changeTBS"></span>
        </div>
        <div class="toolbarMenuOptions" id="changeTBS" data-target="textBack" style="color:#757575;">
        <h5 class="title5">Background Color</h5>
        <div id="changeTextBoxBG" data-target="changeBGCS">
          <div class="red"></div>
          <div class="green"></div>
          <div class="blue"></div>
          <div class="swatch" class="ui-widget-content ui-corner-all"></div>
        </div>
          <br>
          <h5 class="title5">Transparency</h5>
          <div style="width:100%; display:inline-block;">
            <div id="transparencySliderTB" style="float:left;"></div>
            <h5 class="title5" id="transparencyValueTB" style="float:right; margin-top:0px;"></h5>
          </div>
          <h5 class="title5">Font Color</h5>
          <div class="" id="changeFCS" data-target="changeFontColor">
          <div class="red"></div>
          <div class="green"></div>
          <div class="blue"></div>
          <div class="swatch" class="ui-widget-content ui-corner-all"></div>
        </div>
        </div>
  </div>
  </div>
  <div class="toolbarMenuBarX toolbar-fixed" style="bottom:0;">
        <div class="col-xs-4 col-md-4 col-lg-4">
          <button name="view" value="Publish" class="button slide-control-btn" title="View" onclick="createCSS()" /><i class="fa fa-eye"></i></button>
        </div>
        <div class="col-xs-4 col-md-4 col-lg-4">
          <button name="publish" value="Publish" class="button slide-control-btn" onclick="sendFormContent(this.name);" title="Publish"/><i class="fa fa-cloud-upload"></i></button>  
        </div>
        <div class="col-xs-4 col-md-4 col-lg-4">
          <button name="save" class="button slide-control-btn"  onclick="sendFormContent(this.name);" title="Save" /><i class="fa fa-save"></i></button>  
        </div>
      </div>

</div>
            <div id="slideToolbar">
              <ul class="rteControlsBar controls">
                <li style="list-style:none;"><a href="#" class="fa fa-bold btnX" title="Bold" onclick="formatDoc('bold');editFocus();"></a></li>
                <li style="list-style:none;"><a href="#" class="fa fa-italic btnX" title="Italic" onclick="formatDoc('italic');editFocus();"></a></li>
                <li style="list-style:none;"><a href="#" class="fa fa-underline btnX" title="Underline" onclick="formatDoc('underline');editFocus();"></a></li>
                <li style="list-style:none;"><a href="#" class="fa fa-align-left btnX" title="Left Align" onclick="formatDoc('justifyleft');editFocus();"></a></li>
                <li style="list-style:none;"><a href="#" class="fa fa-align-center btnX" title="Center Align" onclick="formatDoc('justifycenter');editFocus();"></a></li>
                <li style="list-style:none;"><a href="#" class="fa fa-align-right btnX" title="Right Align" onclick="formatDoc('justifyright');editFocus();"></a></li>
                <li style="list-style:none;"><a href="#" class="fa fa-list-ol btnX" title="Numbered List" onclick="formatDoc('insertorderedlist');editFocus();"></a></li>
                <li style="list-style:none;"><a href="#" class="fa fa-list-ul btnX" title="Dotted List" onclick="formatDoc('insertunorderedlist');editFocus();"></a></li>
                <li style="list-style:none;"><a href="#" class="fa fa-link rteControlButtons btnX" data-id="addLinkOverlay"></a></li>
                <li style="list-style:none;">
                  <form id="addPicture2" action="<?php echo DOCROOT;?>?route=account/addimage"  onsubmit="validateImage()" method="post" enctype="multipart/form-data">   
                    <input class="form-control solid-bdr file-browse-input" type="file" class="file" id="fileinput2" name="myfile" onchange="document.getElementById('submitPicture2Form').click();" title="Insert Picture"style="width:40px; z-index:99; opacity:0; cursor:pointer;"/>
                    <input type="submit" id="submitPicture2Form" class="btn btn-default pull-right hidden">
                      <span class="btnX fa fa-picture-o"style="position:absolute; top:0px; color:#fff; cursor:pointer;"></span>
                  </form>
                </li>
              </ul>
              <div class="asdf" style="display:inline-block;">
                <select class="selectCustom" onchange="formatDoc('formatblock',this[this.selectedIndex].value);this.selectedIndex=0;">
                <option selected>- formatting -</option>
                <option value="h1">Title 1 &lt;h1&gt;</option>
                <option value="h2">Title 2 &lt;h2&gt;</option>
                <option value="h3">Title 3 &lt;h3&gt;</option>
                <option value="h4">Title 4 &lt;h4&gt;</option>
                <option value="h5">Title 5 &lt;h5&gt;</option>
                <option value="h6">Subtitle &lt;h6&gt;</option>
                <option value="p">Paragraph &lt;p&gt;</option>
                <option value="pre">Preformatted &lt;pre&gt;</option>
              </select>  
              <div class="overSelect">--Formatting--&nbsp;&#x25bc;</div>
              </div>
              <div  class="asdf" style="display:inline-block;">
                <select  class="selectCustom" onchange="formatDoc('fontsize',this[this.selectedIndex].value);this.selectedIndex=0;">
                  <option class="heading" selected>- size -</option>
                  <option value="1">Very small</option>
                  <option value="2">A bit small</option>
                  <option value="3">Normal</option>
                  <option value="4">Medium-large</option>
                  <option value="5">Big</option>
                  <option value="6">Very big</option>
                  <option value="7">Maximum</option>
                </select>
                <div class="overSelect">--Size--&nbsp;&#x25bc;</div>
                </div>
            </div>

<div class="slideshow-section">
            
  <div id="formSection">
    <form name="compForm" action="<?php echo DOCROOT;?>?route=account/updateslideshow" method="post" enctype="multipart/form-data" onsubmit="this.myDoc.value=submitSlide();this.docImg.value=ImageX;alert(this.docImg.value);" class="form-horizontal" id="form_uploadPost">
      <input type="hidden" name="myDoc">
      <input type="hidden" name="docImg">
      <!--div id="frame" style="position:relative; width:960px;height:700px;"-->
        <i id="preSlide" class="fa fa-angle-double-left iconLarge arrowCtls pull-left"  onclick="prevSlide();" title="Previous"></i>
        <!--div  id="presentation" style="position:absolute; width:960px;height:700px;"-->
        <div  id="presentation">
        <?php if($postdata[0]['content']):?>
          <?php echo $postdata[0]['content'];?>
        <?php else:?>
          <div id="slides" class="play"></div>
          <div id="backgrounds"></div>
        <?php endif;?>
          
        </div>
        <i id="nxtSlide" class="fa fa-angle-double-right iconLarge arrowCtls pull-right"  onclick="nextSlide();" title="Next"></i>
      <!--/div-->
    </form>       
  <!--FORM ENDS-->
  </div>
  
</div>
  <div class="addDelControls">
    <i class="fa fa-plus iconLarge" onclick="addSlide();" title="Add Slide"></i>
    <i class="fa fa-minus iconLarge" onclick="removeSlide();" title="Remove Slide"></i>
  </div>
</div>
<script type="text/javascript">
function deleteThis(){
  $(".activeContent").remove();
  refreshzIndex();
}
$('.customMenu').on('click',function(){
    var cd = $(this).attr('data-toggle');
    if(cd == 'off'){
      $(this).attr('data-toggle','on');
      $(this).find('ul').removeClass('hidden');
    }else{
      $(this).attr('data-toggle','off');
      $(this).find('ul').addClass('hidden');
    }
});
$(function(){
      $.fn.toggleX = function(){
        var a = $(this).attr('data-toggle');
        var xs = $(this).attr('data-option');
        if(a == 'on'){
          $("#"+xs).addClass('hidden');
          $(this).attr('data-toggle','off');
        }
        else{
          $("#"+xs).removeClass('hidden');
          $(this).attr('data-toggle','on');
        }
        a = null;
        xs = null;
      }
      $.fn.onX = function(){
        var a = $(this).attr('data-toggle');
        var xs = $(this).attr('data-option');
        if($("#"+xs).hasClass('hidden')){
          $("#"+xs).removeClass('hidden');
          $(this).attr('data-toggle','on');  
        }
      }
      $.fn.offX = function(){
        var a = $(this).attr('data-toggle');
        var xs = $(this).attr('data-option');
        if(!$("#"+xs).hasClass('hidden')){
          $("#"+xs).addClass('hidden');
          $(this).attr('data-toggle','off');
        }
      }
      $.fn.toggleXY = function(){
        var a = $(this).attr('data-toggle');
        if(a == 'on'){
          $(this).find('ul').addClass('hidden');
          $(this).attr('data-toggle','off');
        }
        else{
          $(this).find('ul').removeClass('hidden');
          $(this).attr('data-toggle','on');
        }
        a = null;
        xs = null;
      } 
});
$('.bgRemoveBtn').on('click', function(){
  removeBackground();
})
$('.deleteBox').on('click', function(){
  deleteThis();
})
$(".rteControlButtons").on('click',function(e){
    var ref =  $(this).attr('data-id');
    if(!ref){return false;}
    $(".overlay").show();
    $("#"+ref).addClass("lightbox-show");
});
$.fn.activeX = function(){
  $('.activeContent').removeClass('activeContent');
  $(this).addClass('activeContent');
}
$.fn.toggleEffectsToolBar = function(){
  var e = $(this).attr('data-effect');
  if(e=='transition'){
    $("#addEffects").effectsOnX();
    var d = $(this).attr('data-direction');
    }
  else{
    $("#addEffects").effectsOffX();
  }
}
$(document).on('mouseup','.slideshowContent',function(){
  $(this).activeX();
  if($(this).hasClass('textBlock')){
      $(this).toggleEffectsToolBar();
      var a = $('.activeContent .textBack').css('background-color');
      changeSwatch(a); 
      $("#changeTextBackgroundColor").onX();
    }
    else{
      $("#changeTextBackgroundColor").offX();
    }
    if($(this).hasClass('slideshowContent')){
      refreshzIndex();
      addDeleteBox(); 
    }
    editFocus();
});
var activeId = 0;
var ImageX;
var backgroundColor = '#272727', opacity = 0.4, fontFamily = 'verdana', fontColor = "#000000";
$(function(){
  //
  $("#toolBar3").load('<?php echo DOCROOT;?>toolbar.html');
});
$(".bgOption").on('click', function(){
  var at = $(this).attr('data-bg-option');
  if(at=='Stretched'){
    $("#background"+activeId).css('background-size','cover');
    $(".imgThumbnail").css("background-size","cover");
  }else if(at=='Cover'){
    $("#background"+activeId).css('background-size','contain');
    $(".imgThumbnail").css("background-size","contain");
  }
})
function showId(){
  editFocus();
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
function removeBackground(){
  $("#background"+activeId).css("background","");
  backgroundDiv();
}

function nextSlide(){
  $("#slide"+activeId).addClass('past');
  $("#background"+activeId).addClass('past');
  activeId = activeId + 1;
  $("#background"+activeId).removeClass('future');
  $("#background"+activeId).addClass('present');      
  $("#slide"+activeId).removeClass('future');
  $("#slide"+activeId).addClass('present');
  editFocus();
  chckArrows(); 
  backgroundDiv();
}
function prevSlide(){
    $("#background"+activeId).addClass('future');
    $("#slide"+activeId).addClass('future');
    activeId = activeId - 1;
    $("#background"+activeId).removeClass('past');
    $("#background"+activeId).addClass('present');
    $("#slide"+activeId).removeClass('past');
    $("#slide"+activeId).addClass('present');
    editFocus();
    chckArrows(); 
    backgroundDiv();
}
function countSlides(){
    var intx = 0;
    $("#slides section").each(function(){
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
   updateSlides();
   editFocus();
}
function updateSlides(){
  var i = 0, j=0;
  $('.past').removeClass('past');
    $('.present').removeClass('present');
    $('.future').removeClass('future');
    
  $("#presentation .textBox").each(function(){
    i = i+1;
    $(this).attr('id','slide'+i); 
    if(i<activeId){
      $(this).addClass('past');
    }
    if(i==activeId){
      $(this).addClass('present');
    }
    if(i>activeId){
      $(this).addClass('future');
    }
  });
   $("#backgrounds .background").each(function(){
    j = j+1;
    $(this).attr('id','background'+j);
    if(j<activeId){
      $(this).addClass('past');
    }
    if(j==activeId){
      $(this).addClass('present');
    }
    if(j>activeId){
      $(this).addClass('future');
    }
  });
}
function sendFormContent(e){
  var slideData = submitSlide();
  $("#background1").css("background-size",'');
    //var a = document.getElementById("frame");
    var b = document.createElement('div');
    b.setAttribute('id','aqs');
    b.setAttribute('style','position:absolute; width:960px; height:700px;');
    var d1 = document.createElement('div');
    d1.setAttribute('class','slides');
    d1.setAttribute('style', 'height:100%;width:100%;position:absolute;');
    d1.innerHTML = document.getElementById('slide1').innerHTML;
    var d2 = document.createElement('div');
    d2.setAttribute('class','backgrounds');
    var as = document.getElementById('background1').getAttribute('style');
    d2.setAttribute('style','height:100%;width:100%;position:absolute;'+as);
    b.appendChild(d1);
    b.appendChild(d2);
    var f = b.innerHTML;
    document.body.appendChild(b);
    var c3 = document.getElementById('aqs');
    var x = c3.innerHTML;
    $('.section-loading').removeClass('hidden');
    html2canvas(c3, {
    onrendered: function(canvas) {
    document.body.appendChild(canvas);
    var canvasc = $("canvas");
    canvasc.attr('id','myCanvas');
    var canvasx = document.getElementById("myCanvas");
    var img = canvasx.toDataURL("image/jpeg");
    $.post('<?php echo DOCROOT."index.php?route=account/updateslideshow";?>', {img:img, myDoc: slideData, type: e}, function(data){
      $('.section-loading').addClass('hidden');  
    });
    $("#aqs").remove();
    $("#myCanvas").remove();
  },
 // width: 300,
 // height: 300
});
  
if(event.preventDefault){
    event.preventDefault();    
  }
  else{
      event.returnValue = false;
  }
}
function addSlide()
{
  var insertId = 1 + parseInt(activeId);
  var a = document.createElement("section");
  a.setAttribute('id','slide'+insertId);
  a.setAttribute('class','textBox');
  a.setAttribute('data-slideT',6000);
  var ts = countSlides();
  var ib = document.getElementById("slides");
  var cx = document.createElement("section");
  cx.setAttribute("id","background"+insertId);
  cx.setAttribute("class","background");
  var ix = document.getElementById("backgrounds");
  if(ts == activeId){
    ib.appendChild(a);  
    ix.appendChild(cx);
  }
  else{
    var y = document.getElementById("slide"+insertId);
    ib.insertBefore(a,y);
    var cd = document.getElementById("background"+insertId);
    ix.insertBefore(cx,cd);
  }
  ib = null;
  activeId = insertId;
  //textDragAndResize();
  updateSlides();
  editFocus();
  chckArrows();
  backgroundDiv();
  insertTextBox();
};
function addDeleteBox(){
 if(!$('.activeContent').children().hasClass('deleteBox')){
  var a = '<div class="deleteBox" onclick="deleteThis()" title="Remove This" style="z-index:999;"><div class="fa fa-times"></div></div>';
  $('.activeContent').append(a);
 }
}
function totalSlideshowContent(){
  var xd = 0;
  $("#slide"+activeId+" .slideshowContent").each(function(){
    xd = xd+1;
  });
  return xd;
}
function refreshzIndex(){
  var xx = totalSlideshowContent();
  var xd = 1;
  $("#slide"+activeId+" .slideshowContent").each(function(){
    var c = $(this).attr('data-item');
    $("."+c).removeClass(c);
    $(this).addClass('item-'+xx);
    $(this).attr('data-item','item-'+xd);
    xd = xd+1;
  });
  $("#slide"+activeId+" .activeContent").css('z-index',xx);
}
function editFocus(){
  $("#slide"+activeId+" .activeContent .desc").focus();
}
function backgroundDiv(){
  var ci = $("#background"+activeId).css('background-image');
  var cc = $("#background"+activeId).css('background-color');
  if(ci!='none'){
    $(".imgThumbnail").css("background",cc+" "+ci);
    $(".imgThumbnail").removeClass('hidden');
    $("#addPicture").addClass("hidden");
  }
  else{
    $(".imgThumbnail").addClass('hidden');
    $("#addPicture").removeClass("hidden");
  }
}
function insertTextBox(){
  var a = document.getElementById("slide"+activeId);
  var c = document.createElement("div");
  //document.querySelector('.activeContent').
  $(".activeContent").removeClass('activeContent');
  c.setAttribute('class','textBlock slideshowContent activeContent');
  c.setAttribute('style','background:none;width:70%;height:60%;left:10%;top:10%;position:absolute;');
  var d = document.createElement("div");
  d.setAttribute('class','textBack');
  d.setAttribute('style','background:'+ backgroundColor +'; opacity:'+ opacity +';');
  var e = document.createElement("div");
  e.setAttribute('class','desc');
  e.setAttribute('contenteditable','true');
  e.setAttribute('style','color:'+ fontColor +';');
  //e.setAttribute('style','position:absolute;overflow:hidden;');
  var f = document.createElement("h2");
  f.setAttribute('style','text-align:center;');
  var g = document.createTextNode('TITLE');
  f.appendChild(g);
  e.appendChild(f);
  c.appendChild(d);
  c.appendChild(e);
  //a.appendChild(b);
  a.appendChild(c);
  textDragAndResize();
  refreshzIndex();
  //$(".activeContent").toggleEffectsToolBar();
      
}
function textDragAndResize(){
  $( "#slide"+activeId+" .textBlock" ).resizable({
      containment: "#slide"+activeId
    }).draggable({
      containment: "#slide"+activeId
  });
  /*  
  var c = '<div class="dragThis"></div>';
  $( "#slide"+activeId+" .activeContent" ).append(c);
  $(".dragThis").draggable({
      containment: "#slide"+activeId
  });
  $(".dragThis").bind('drag', moveThis);
  */
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
  imgFormWidth();
});
function imgFormWidth(){
  var w = $(".toolbarMenu").width();
  var n = w*(1000/287);
  $(".bgThumb.bgThumbX").css('font-size', n+'%');
}
function submitSlide(){
  $(".ui-resizable-handle").remove();
  $(".deleteBox").remove();
  $(".activeContent").removeClass("activeContent");
  $(".imageBox").removeClass("ui-widget-content ui-resizable ui-draggable");
  $(".textBlock").removeClass("ui-widget-content ui-resizable ui-draggable");
  var cv = document.getElementById("presentation").innerHTML;
  return cv;
}
function insertTextBoxSettings(){
  $(".toolbarMenuOptions").offX();
  $("#insertText").toggleX();
}
</script>
<script type="text/javascript">
var oDoc, sDefTxt;
function initDoc() {
  oDoc = document.getElementById("presentation");
  sDefTxt = oDoc.innerHTML;
}
function formatDoc(sCmd, sValue) {
  document.execCommand(sCmd, false, sValue); 
  oDoc.focus(); 
}
$(document).ready(function(){
    initDoc();
    var optionsBG = { 
    beforeSend: function() 
    { 
      $("#progress").show();
      $("#bar").width('0%');
      $("#message").html("");
      $("#percent").html("0%");
    },
    uploadProgress: function(event, position, total, percentComplete) 
    {
        $("#bar").width(percentComplete+'%');
        $("#percent").html(percentComplete+'%');
    },
    success: function() 
    {    
        document.getElementById('fileinput').value = null;
         // $("#bar").width('100%');
          // $("#percent").html('100%');
         $(".overlay").hide();
         $(".lightbox-show").removeClass("lightbox-show");
    },
    complete: function(response) 
    {
        var a = response.responseText;
        var xs = a.split("-");
        var sd = '<div class="imageBox slideshowContent"><img class="img-responsive" src="<?php echo DOCROOT; ?>'+xs[1]+'"></img></div>';
        var cd = '<img class="img-responsive" src="<?php echo DOCROOT; ?>'+xs[1]+'"></img>';
        var cx = "url('<?php echo DOCROOT; ?>"+xs[1]+"')";
        $("#background"+activeId).css("background","#000000 "+cx);
        $("#background"+activeId).css("background-size","cover");
        $(".imgThumbnail").css("background","#000000 "+cx);
        $(".imgThumbnail").css("background-size","cover");
        $(".imgThumbnail").removeClass("hidden");
        $("#addPicture").addClass("hidden");
        imageDragAndResize();
    },
    error: function()
    {
        // $("#message").html("<font color='red'> ERROR: unable to upload files</font>");
    }
};
var optionsIMG = { 
    beforeSend: function() 
    { 
      // $("#progress").show();
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
        document.getElementById('fileinput2').value = null;
         // $("#bar").width('100%');
          // $("#percent").html('100%');
         $(".overlay").hide();
         $(".lightbox-show").removeClass("lightbox-show");
    },
    complete: function(response) 
    {
        var a = response.responseText;
        var xs = a.split("-");
        var sd = '<div class="imageBox slideshowContent"><img class="img-responsive" src="<?php echo DOCROOT; ?>'+xs[1]+'"></img></div>';
        
        //var y = document.getElementById("slide"+activeId);
        //y.appendChild(sd);
        //alert(989);
        var u = $("#slide"+activeId);
        u.append(sd);
        //var cd = '<img class="img-responsive" src="/viaslide5/alt/'+xs[1]+'"></img>';
        //var cx = "url('/viaslide5/alt/"+xs[1]+"')";
        //$("#background"+activeId).css("background","#000000 "+cx);
        //$(".imgThumbnail").css("background","#000000 "+cx);
        //$(".imgThumbnail").removeClass("hidden");
        //$("#addPicture").addClass("hidden");

        imageDragAndResize();
    },
    error: function()
    {
        // $("#message").html("<font color='red'> ERROR: unable to upload files</font>");
    }
};  
    $("#addPicture").ajaxForm(optionsBG);
    $("#addPicture2").ajaxForm(optionsIMG);
});
function moveThis(){
  $(".activeContent").css('left', $(".activeContent .dragThis").css('left'));
  $(".activeContent").css('top', $(".activeContent .dragThis").css('top'));
  $(".activeContent .dragThis").css('left', 0);
  $(".activeContent .dragThis").css('top', 0);
}
$(function(){
  $.fn.Slider = function(){
  //if(options){
  //}
  var height = 960,
    width = 800,
    zoom = 1;
  $(this).each(function(){
  })
  }
}); 
$(document).ready(function(){
//  $("#presentation article").Slider();
  $("nav").hide();
  $("#footer").hide();
  var h = $(window).height();
  $(".main").css('padding',0);
  $("#toolBar2").css('height',h);
  $("#toolBar2").css('background','#3e3e3e');
  $("#toolBar2").css('overflow','auto');
});
$(".toolbarMenuBar").on('click', function(){
  var e = $(this).attr('data-toggle');
  if(e == 'off'){
    $(this).find('ul').removeClass('hidden');
  }
  else{
    $(this).find('ul').addClass('hidden'); 
  }
});
</script>
<style>
  .dragThis{
    position: absolute;
    background: green;
    width: 50px;
    height: 50px;
  }
</style>
<?php if($postdata[0]['content']): ?>
  <script type="text/javascript">
    activeId = 1;
    updateSlides();
    var n = countSlides();
  $(function(){
    for(var i = 1; i<=n; i++){
      $("#slide"+i+" .imageBox").resizable({
        containment: "#slide"+i
        }).draggable({
        containment: "#slide"+i
      });
      $("#slide"+i+" .textBlock").resizable({
        containment: "#slide"+i
        }).draggable({
        containment: "#slide"+i
      });
    }
  });
</script>
<?php else: ?>
<script type="text/javascript">
    $(function(){
      addSlide();
    });
</script>
<?php endif;?>
<script>  
</script>