
            
<script src="<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/html2canvas.min.js"></script>
    <!--title></title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css"-->
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!--script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"-->
  <style type="text/css">
  html, body{
    height: 100%;
  }
  .side-toolbar-menu>li{
    list-style: none;
    font-size: 14px;
    padding: 10px;
    width: 180px;
    /*background: rgba(34,34,34,0.9);*/
    color: rgb(211,211,211);
    font-family: verdana;
    border-top: 1px solid #3c3c3c;
    border-bottom: 1px solid #282828;
    line-height: 25px;
  }
  .side-toolbar-menu{
    padding: 0px;
    width: 230px;
  }
  .main-toolbar{
    width: 100%;
    padding-left: 200px;
    height: 500px;
  }
  .background-settings{

  }
  .background-color-settings{
    /*background: #272727;*/
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
    background-position: -37px 0px;
  }
  .color-6{
    background-position: -37px -37px;
  }
  .color-7{
    background-position: -37px -74px;
  }
  .color-8{
    background-position: -37px -111px;
  }
  .color-9{
    background-position: -74px 0px;
  }
  .color-10{
    background-position: -74px -37px;
  }
  .color-11{
    background-position: -74px -74px;
  }
  .color-12{
    background-position: -74px -111px;
  }
  .color-13{
    background-position: -111px 0px;
  }
  .color-14{
    background-position: -111px -37px;
  }
  .color-15{
    background-position: -111px -74px;
  }
  .color-16{
    background-position: -148px -74px;
  }
  .color-17{
    background-position: -148px 0px;
  }
  .color-18{
    background-position: -148px -37px;
    /*background-position: -148px -74px;*/
  }
  .colors{
    width: 200px;
    padding: 15px;
  }
  
  .colors div{
    height: 37px;
    width: 37px;
    background-image: url(<?php echo DOCROOT;?>sprite.png);
    display: inline-block;
    cursor: pointer;
}
.background-settings-menu{
  padding: 0;
}
.background-settings-menu li{
  list-style: none;
  font-size: 14px;
  padding: 10px;
  width: 180px;
  /*background: rgba(34,34,34,0.9);*/
  color: rgb(211,211,211);
  font-family: verdana;
  border-top: 1px solid #3c3c3c;
  border-bottom: 1px solid #282828;
  line-height: 25px;
  display: inline-block;
}
.red, .green, .blue {
    /**/
    float: left;
    clear: left;
    width: 60%;
    margin: 8px;
  }
  .swatch {
    width: 50px;
    height: 50px;
    /*margin-top: 18px;
    margin-left: 350px;*/
    margin-left: 70%;
    background-image: none;
  }
  .red .ui-slider-range { background: #ef2929; }
  .red .ui-slider-handle { border-color: #ef2929; }
  .green .ui-slider-range { background: #8ae234; }
  .green .ui-slider-handle { border-color: #8ae234; }
  .blue .ui-slider-range { background: #729fcf; }
  .blue .ui-slider-handle { border-color: #729fcf; }

  #changeBGC{
    width: 200px;
  }
  #addPicture{
    height: 200px;
    width: 100%;
   /* position: absolute;*/
    
}
.bgThumb, .imgThumbnail{
   overflow: hidden;
}
.imgThumbnail{
  height: 200px;
}
@import url(http://fonts.googleapis.com/css?family=Open+Sans:600);
.sidenav {
  position: fixed;
  width: 280px;
  height: 100%;
  /*background-color: #1e2027;*/
  background: rgba(0,0,0,0.9);
}
.sidenav .main-buttons {
  list-style-type: none;
  /*margin: 64px 0;*/
  padding: 0;
  color: #fff;
}
.main-buttons{
  /*margin-top: 64px;*/
}
.sidenav .main-buttons li {
  /*text-transform: uppercase;*/
  letter-spacing: 1px;
  font-family: 'Open Sans', sans-serif;
}
.sidenav .main-buttons > li {
  padding: 16px 52px;
}
.sidenav .main-buttons > li .faX {
  position: absolute;
  left: 12px;
  color: #414655;
  
}
.sidenav .main-buttons > li:hover, .sidenav .main-buttons > li:active, .sidenav .main-buttons > li:focus {
  background-color: #292c35;
  /*cursor: pointer;*/
}
.sidenav .main-buttons > li:hover .nav-hidden, .sidenav .main-buttons > li:active .nav-hidden, .sidenav .main-buttons > li:focus .nav-hidden {
  width: 230px;

}
ul>li{
   border-top: 1px solid #3c3c3c;
border-bottom: 1px solid #282828;
}

.nav-hidden {
    margin-top: 80px;
    width: 0;
    height: 100%;
    padding: 0;
    position: absolute;
    top: 0;
    right: 0;
    overflow: hidden;
    list-style-type: none;
    background-color: #292c35;
    transition: linear 0.3s;
    overflow-y:  auto;
    z-index: 9;
}
.nav-hidden li {
  /*padding: 16px 24px;*/
  padding: 14px;
}
.nav-hidden li:hover, .nav-hidden li:active, .nav-hidden li:focus {
  /*background-color: #323541;*/
}
.nav-hidden li div{
  /*position: relative;*/
}
.container-main{
  padding: 12px;
  padding-left: 300px;
  height: 100%;
}

#slideToolbar{
    width: 720px;
  position: absolute;
}
#slideToolbar ul{
  padding: 0;
}

.rteControlsBar>li{
  display: inline-block;
  list-style: none;
  float: left;
  border-left: 1px solid #ffffff;
}
.btnX{
  background: #222729;
  padding: 12px;
  color: rgba(255,255,255,0.5);
}
.btnX:hover{
  background: #3c3c3c;
  color: #ffffff;
}
.asdf{/*
  position:relative;
  float: left;*/
}
.selectCustom{
    padding: 12px;
    margin-top:-15px; 
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
.slide-container{
  
  padding-top: 40px;
  padding-bottom: 40px;
  width: 100%;
  height: 100%;
}
.slide-container-main{
  height: 100%;
  position: relative;
}
.c{
  display: block;
  overflow: auto;
}
.main-buttons-li{
  cursor: pointer;
}
.nav-brand{
  text-align: center;
}
.nav-brand>a{
  text-decoration: none;
}
#presentation, #slides, #backgrounds{
  width: 100%;
  height: 100%;
}
#presentation{
  position: relative;
}
#slides, #backgrounds{
  position: absolute;
}
#formSection{
  width: 960px;
  height: 700px;
  position: absolute;
  left: 0;
 /* right: 0;
  top: 0;
  bottom: 0;
  margin: auto;*/
  border: 1px solid;
}
.con{
    position: absolute;
    height: 100%;
    width: 100%;
  }
  .slide-controls{
    cursor: pointer;
  }
  .slide-controls:hover{
    background: rgba(0,0,0,0.9);
    transition:linear 0.5s;
    color:#fff;
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
.activeContent{
  border: 0.2em dotted rgba(0,0,0,0.8);
}
article{
  z-index: 1;
}
.arrowCtls{
  z-index: 99;
  top:50%;
  position: absolute;
  /*background: rgba(100,100,100,0.8);*/
  cursor: pointer;
}
.arrow-right{
  right: 0.5em;
}
.arrow-left{
  left: 0.5em;
}
.arrowCtls:hover{
  -webkit-transform:scale3d(1.4,0.8,0.2);
  -ms-transform:scale3d(1.4,0.8,0.2);
  -o-transform:scale3d(1.4,0.8,0.2);
  -moz-transform:scale3d(1.4,0.8,0.2);
  transform:scale3d(1.4,0.8,0.2);
  transition:0.3s ease-out;
  -webkit-transition:0.3s ease-in-out;
  -o-transition:0.3s ease-in-out;
  -ms-transition:0.3s ease-in-out;
  -moz-transition:0.3s ease-in-out;
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
.textBox{
  position: absolute;
}
.fa-angle-down{
  position: relative;
}
.nav-fonts>li, .anime{
  overflow: hidden;
  border-left: 4px solid #292c35;
}
.nav-fonts>li:hover, .anime:hover{
  border-left: 4px solid #7fc04c;
  background: rgba(34,34,34,0.9);
  transition: 0.5s ease-out;
}
.icon-stack{
  position: relative;
}
.icon-stack>i{
  position: absolute;
}
.icon-anime{
  -webkit-transition-duration: 0.5s;
  -moz-transition-duration: 0.5s;
  -o-transition-duration: 0.5s;
  -ms-transition-duration: 0.5s;
  transition-duration: 0.5s;
}
.icon-anime-right{
  left:-100%;
}
.anime-right:hover .icon-anime-right{
  left:0%;
}
.icon-anime-left{
  left:120%;
}
.anime-left:hover .icon-anime-left{
  left:0%;
}
.icon-anime-up{
  top:100px;
}
.anime-up:hover .icon-anime-up{
  top:0%;
}
.icon-anime-down{
  top:-100px;
}
.anime-down:hover .icon-anime-down{
  top:0%;
}
.icon-static:hover{
  opacity: 0;
}
.colors .active{
  border: 2px solid rgba(100,100,100,0.8);
}
.add-del-button{
  clear: right;
}
.addDelControls{
  position: absolute;
  top: 40%;
  right: 1.2em;
}
.ui-corner-all{
  border-top-left-radius: 2px;
  border-top-right-radius: 2px;
  border-bottom-left-radius: 2px;
  border-bottom-right-radius: 2px;
}
.red, .green, .blue{
  margin: 2px;
  border: none;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{
  border: none;
}
.ui-slider .ui-slider-handle{
  width: 1em;
  height: 1em;
  top: -0.1em;
  border: none;
}
.background-image-settings{
  text-align: center;
}
.main-title{
  padding: 0;
}
.nav-btn{
  float: left;
  display: inline;
  cursor: pointer;
  padding: 8px 16px;
  margin: 0.4em;
}
.nav-footer{
  position: absolute;
  bottom: 0;
  /*z-index: -1;*/
}
li .active{
  border-left: 4px solid #7fc04c;
  background: rgba(34,34,34,0.9);
}
</style>
  <nav class="sidenav">
      <ul class="main-buttons">
        <li class="main-title main-buttons-li" style="padding:8px;">
          <h2 class="nav-brand"><a href="<?php echo DOCROOT;?>" style="z-index:999;">viaslide</a></h2>
        </li>
        <li class="main-buttons-li">
          <i class="fa fa-gear fa-2x faX"></i>
          Slide Background 
          <ul class="nav-hidden">
            <li><h5>Background Color</h5>
              <div class="background-color-settings" data-target="changeBGC">
                <div class="colors">
                  <div class="color-1" data-color="#ffffff"></div>
                  <div class="color-2" data-color="#f5be00"></div>
                  <div class="color-3" data-color="#e8448f"></div>
                  <div class="color-4" data-color="#705038"></div>
                  <!--div class="color-5" data-color=""></div-->
                  <!--div class="color-6" data-color=""></div-->
                  <div class="color-7" data-color="#6d3eb7"></div>
                  <div class="color-8" data-color="#747474"></div>
                  <!--div class="color-9" data-color=""></div-->
                  <div class="color-10" data-color="#f7681f"></div>
                  <div class="color-11" data-color="#3784d3"></div>
                  <div class="color-12" data-color="#000000"></div>
                  <!--div class="color-13" data-color=""></div-->
                  <div class="color-14" data-color="#cb0000"></div>
                  <div class="color-15" data-color="#0d9200"></div>
                  <div class="color-16" data-color="#7b7b00"></div>
                  <div class="color-17" data-color="#bcac88"></div>
                  <div class="color-18" data-color="#b05b31"></div>
                </div>
              </div>
            </li>
            <li><h5>Advanced Color Options</h5>
            <div class="background-advanced-color-settings">
              <div id="changeBGC" data-target="changeBackGClr">
                <div class="red"></div>
                <div class="green"></div>
                <div class="blue"></div>
                <div class="swatch ui-widget-content ui-corner-all"></div>  
              </div>
            </div>
            </li>
            <li><h5>Background Image</h5>
              <div class="background-image-settings">
              <div class="toolbarMenuOptions" id="changeBGC" data-target="slide" style="display:block;">
      
             <div id="inputPicture">
              <form id="addPicture" action="<?php echo DOCROOT;?>index.php?route=account/addimage"  onsubmit="validateImage()" method="post" enctype="multipart/form-data">   
                <input class="form-control solid-bdr file-browse-input" type="file" class="file" id="fileinput" name="myfile" onchange="document.getElementById('submitPictureForm').click();" style="width:100%; z-index:-99; opacity:0; cursor:pointer; position:absolute;"/>
                <input type="submit" id="submitPictureForm" class="btn btn-default pull-right" style="display:none;">
                <div class="fa fa-picture-o bgThumb bgThumbX fa-5x" onclick="document.getElementById('fileinput').click();" style="text-align:center; z-index:99; cursor:pointer;"></div><br>
                <p class="h3 color-2">Click here to Add Picture</p>
              </form>
              <div class="bgThumb" style="position:absolute;">
                <div class="imgThumbnail hidden">
                <div class="bgThumbOptions customMenu" data-toggle="off" style="top:60%; text-align:center;">  
                      <span id="fontFamily" class="inlineTools button">Stretched&nbsp;<span class="fa fa-angle-down" style="position:relative;"></span></span>
                      <ul class="listItems hidden">
                        <li class="bgOption" data-bg-option="Stretched" >Stretched</li>
                        <li class="bgOption" data-bg-option="Cover">Cover</li>
                      </ul>
                </div> 
                <div class="bgRemoveBtn" style=" top:80%; text-align:center;"><span class="button">Remove Image</span></div>
                </div>
              </div>
            </div>
          </div>
          </div>
            </li>
          </ul>
        </li>
        <li class="main-buttons-li">
          <i class="fa fa-font fa-2x faX"></i>
          Font Style
          <ul class="nav-hidden nav-fonts">
            <li style="font-family:arial;" data-font="arial" class="active">Arial</li>
            <li style="font-family:arial black;" data-font="arial black">Arial Black</li>
            <li style="font-family:calibri;" data-font="calibri">Calibri</li>
            <li style="font-family:comic sans;"  data-font="Comic Sans">Comic sans</li>
            <li style="font-family:georgia;"  data-font="georgia">Georgia</li>
            <li style="font-family:helvetica;"  data-font="helvetica">Helvetica</li>
            <li style="font-family:sans serif;" data-font="sans serif">Sans serif</li>
            <li style="font-family:tahoma;" data-font="tahoma">Tahoma</li>
            <li style="font-family:trebuchet ms;" data-font="trebuchet ms">Trebuchet Ms</li>
            <li style="font-family:ubuntu;" data-font="ubuntu">Ubuntu</li>
            <li style="font-family:verdana;" data-font="verdana">Verdana</li>
            <li style="font-family:courier new;" data-font="courier new">Courier New</li>
            <li style="font-family:times new roman;" data-font="times new roman">Times New Roman</li>
          </ul>
        </li>

        <li class="main-buttons-li">
          <i class="fa fa-font fa-2x faX" style="color:#7fc04c;"></i>
           Font Color
           <ul class="nav-hidden">
              <li><h5>Color</h5>
                <div class="font-color-settings"  data-target="changeFC">
                  <div class="colors">
                  <div class="color-1" data-color="#ffffff"></div>
                    <div class="color-2" data-color="#f5be00"></div>
                    <div class="color-3" data-color="#e8448f"></div>
                    <div class="color-4" data-color="#705038"></div>
                    <!--div class="color-5" data-color=""></div-->
                    <!--div class="color-6" data-color=""></div-->
                    <div class="color-7" data-color="#6d3eb7"></div>
                    <div class="color-8" data-color="#747474"></div>
                    <!--div class="color-9" data-color=""></div-->
                    <div class="color-10" data-color="#f7681f"></div>
                    <div class="color-11" data-color="#3784d3"></div>
                    <div class="color-12" data-color="#000000"></div>
                    <!--div class="color-13" data-color=""></div-->
                    <div class="color-14" data-color="#cb0000"></div>
                    <div class="color-15" data-color="#0d9200"></div>
                    <div class="color-16" data-color="#7b7b00"></div>
                    <div class="color-17" data-color="#bcac88"></div>
                    <div class="color-18" data-color="#b05b31"></div>
                  </div>
                </div>
              </li>
              <li>
                <div class="" id="changeFC" data-target="fontColor">
                  <h5>Advanced Options</h5>
                  <div class="red"></div>
                  <div class="green"></div>
                  <div class="blue"></div>
                  <div class="swatch" class="ui-widget-content ui-corner-all"></div>
                </div>  
              </li>
          </ul>   
        </li>
        <li class="main-buttons-li">
          <i class="fa fa-magic fa-2x faX"></i>
           Transition Effect
           <ul class="listItems animation-direction nav-effects nav-hidden">
            <li class="anime anime-null active" data-effect="null">
            <!--div class="icon-stack">
              <i class="icon-static fa fa-long-arrow-right fa-2x"></i>
              <i class="icon-anime icon-anime-right fa fa-long-arrow-right fa-2x"></i>  
            </div-->
            No Effect</li>
            <li class="anime anime-right" data-effect="right">
            <div class="icon-stack">
              <i class="icon-static fa fa-long-arrow-right fa-2x"></i>
              <i class="icon-anime icon-anime-right fa fa-long-arrow-right fa-2x"></i>  
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Right</li>
            <li class="anime anime-left" data-effect="left">
            <div class="icon-stack">
              <i class="icon-static fa fa-long-arrow-left fa-2x"></i>
              <i class="icon-anime icon-anime-left fa fa-long-arrow-left fa-2x"></i>  
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Left</li>
            <li class="anime anime-up" data-effect="top">
            <div class="icon-stack">
              <i class="icon-static fa fa-long-arrow-up fa-2x"></i>
              <i class="icon-anime icon-anime-up fa fa-long-arrow-up fa-2x"></i>  
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;Up</li>
            <li class="anime anime-down" data-effect="bottom">
            <div class="icon-stack">
              <i class="icon-static fa fa-long-arrow-down fa-2x"></i>
              <i class="icon-anime icon-anime-down fa fa-long-arrow-down fa-2x"></i>  
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;Down</li>
          </ul>   
        </li>
        <li class="main-buttons-li">
          <i class="fa fa-magic fa-2x faX"></i>
           Text Box
           <ul class="listItems animation-direction nav-hidden">
              <li><h5>Background Color</h5>
                <div class="background-color-settings" data-target="changeTBCX">   
                  <div class="colors"><div class="color-1" data-color="#ffffff"></div>
                    <div class="color-2" data-color="#f5be00"></div>
                    <div class="color-3" data-color="#e8448f"></div>
                    <div class="color-4" data-color="#705038"></div>
                    <!--div class="color-5" data-color=""></div-->
                    <!--div class="color-6" data-color=""></div-->
                    <div class="color-7" data-color="#6d3eb7"></div>
                    <div class="color-8" data-color="#747474"></div>
                    <!--div class="color-9" data-color=""></div-->
                    <div class="color-10" data-color="#f7681f"></div>
                    <div class="color-11" data-color="#3784d3"></div>
                    <div class="color-12" data-color="#000000"></div>
                    <!--div class="color-13" data-color=""></div-->
                    <div class="color-14" data-color="#cb0000"></div>
                    <div class="color-15" data-color="#0d9200"></div>
                    <div class="color-16" data-color="#7b7b00"></div>
                    <div class="color-17" data-color="#bcac88"></div>
                    <div class="color-18" data-color="#b05b31"></div>
                  </div>
                </div>
              </li>
              <li>
                <div id="changeTBCX" data-target="textBack">
                  <h5>Advanced Color Options</h5>
                  <div class="red"></div>
                  <div class="green"></div>
                  <div class="blue"></div>
                  <div class="swatch" class="ui-widget-content ui-corner-all"></div>
                </div>
              </li>
              <li>
                <span class="h5" style="float:left;">Transparency</span><span class="h5" id="transparencyValue" style="float:right;"></span>
                <div id="transparencySlider" style="clear:right;"></div>
              </li>
          </ul>   
        </li>
        <li class="main-buttons-li" onclick="insertTextBox()">
          <i class="fa fa-plus fa-2x faX"></i>
           Insert Text Box
        </li>
      </ul>
      <div class="nav-footer">
        <div class="nav-btn" onclick="sendFormContent('publish');">
          <i class="fa fa-upload fa-3x faX"></i>
           <h5>Publish</h5>
        </div>
        <div class="nav-btn" onclick="sendFormContent('save');">
          <i class="fa fa-save fa-3x faX"></i>
           <h5>Save</h5>
        </div>
          <div class="nav-btn" onclick="sendFormContent('preview');">
            <i class="fa fa-eye fa-3x faX"></i>
           <h5>Preview</h5>
        </div>
      </div>
  </nav>
  <div class="container-main">
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
          <input class="solid-bdr" type="file" class="file" id="fileinput2" name="myfile" onchange="document.getElementById('submitPicture2Form').click();" title="Insert Picture"style="width:40px; height:40px z-index:999; opacity:0; cursor:pointer; position:absolute;"/>
          <input type="submit" id="submitPicture2Form" class="hidden">
            <span class="btnX fa fa-picture-o"style="cursor:pointer;" onclick="document.getElementById('fileinput2').click();"></span>
        </form>
      </li>
    </ul>
    <div class="asdf" style="display:inline-block;">
      <select class="selectCustom" onchange="formatDoc('formatblock',this[this.selectedIndex].value);this.selectedIndex=0;">
      <option selected>- formatting -</option>
      <!--option value="h1">Title 1 &lt;h1&gt;</option>
      <option value="h6">Subtitle &lt;h6&gt;</option-->
      <option value="h2">Title 2 &lt;h2&gt;</option>
      <option value="h3">Title 3 &lt;h3&gt;</option>
      <option value="h4">Title 4 &lt;h4&gt;</option>
      <option value="h5">Title 5 &lt;h5&gt;</option>
      <option value="h6">Subtitle &lt;h6&gt;</option>
      <option value="p">Paragraph &lt;p&gt;</option>
      <option value="pre">Preformatted &lt;pre&gt;</option>
    </select>  
    <div class="overSelect">--Formatting--&nbsp;<i class="fa fa-angle-down"></i></div>
    </div>
    <div  class="asdf" style="display:inline-block;">
      <select  class="selectCustom" onchange="formatDoc('fontsize',this[this.selectedIndex].value);this.selectedIndex=0;">
        <option class="heading" selected>- size -</option>
        <!--option value="1">Very small</option>
        <option value="2">A bit small</option-->
        <option value="3">Normal</option>
        <option value="4">Medium-large</option>
        <option value="5">Big</option>
        <option value="6">Very big</option>
        <option value="7">Maximum</option>
      </select>
      <div class="overSelect">--Size--&nbsp;<i class="fa fa-angle-down"></i></div>
      </div>
  </div>
  <div class="slide-container">
    <div class="slide-container-main">
        <form id="formSection" name="compForm" action="<?php echo DOCROOT;?>?route=account/updateslideshow" method="post" enctype="multipart/form-data" onsubmit="this.myDoc.value=submitSlide();this.docImg.value=ImageX;alert(this.docImg.value);" class="form-horizontal" id="form_uploadPost">
          <input type="hidden" name="myDoc">
          <input type="hidden" name="docImg">
            <i id="preSlide" class="fa fa-angle-left fa-5x arrowCtls arrow-left"  onclick="prevSlide();" title="Previous"></i>
            <div  id="presentation">     
              <div id="slides">
              <?php if($postdata['main']['content']):?>
                <?php echo $postdata['main']['content'];?>
              <?php else: {?>
                <?php if($postdata['images']) :$i=1; foreach($postdata['images'] as $image) { ?>
                <section id="slide<?php echo $i;?>" class="textBox" data-slidet="6000">
                <div class="textBlock slideshowContent" style="background-image: none; position: absolute; z-index: 2; height: 87%; width: 29%;" data-item="item-1">
                  <div class="textBack" style="opacity: 0.4; background-color: rgb(200, 200, 200); background-position: initial initial; background-repeat: initial initial;"></div><div class="desc" contenteditable="false" style="color:#000000;">
                  <?php echo '<h2>'. $image['title'].'</h2><p>'.$image['content'].'</p>';?></div>
                </div>
                <div class="imageBox slideshowContent" style="position: absolute; z-index: 2; height: 58%; width: 64%;" data-item="item-2">
                  <img class="img-responsive" src="<?php echo $image['image'];?>">
                </div>
              </section>
              <?php } endif;?>
              </div>
              <div id="backgrounds">
              <?php if($postdata['images']) :$i=1; foreach($postdata['images'] as $image) { ?>
              <section id="background<?php echo $i;?>" class="background"></section>
              <?php } endif;?>
                
              <?php } endif;?>
              </div>
            </div>
            <i id="nxtSlide" class="fa fa-angle-right fa-5x arrowCtls arrow-right"  onclick="nextSlide();" title="Next"></i>
        </form>       
      <!--FORM ENDS-->
    </div>
  </div>
  <div class="slide-toolbar-bottom">
    <div class="addDelControls">
    <div class="add-btn add-del-btn">
        <i class="slide-controls fa fa-plus fa-4x" onclick="addSlide();" title="Add Slide"></i>
    </div>
    <div class="del-btn add-del-btn">
      <i class="slide-controls fa fa-minus fa-4x" onclick="removeSlide();" title="Remove Slide"></i>
    </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $(".container").removeClass('container');
  $(".navbar").hide();
  $(".footer").hide();
  $('.main').addClass('con');
  $('.main').removeClass('main');
  var w = $('#formSection').width();
  var wp = $('#formSection').parent().width();
  var h = $('#formSection').height();
  var hp = $('#formSection').parent().height();
});
$('.bgRemoveBtn').on('click', function(){
  removeBackground();
});
$('.background-color-settings .colors div').on('click', function(){
  var a = $(this).attr('data-color');
  $('.background-color-settings .colors .active').removeClass('active');
  $(this).addClass('active');
  var id = $(this).parent().parent().attr('data-target');
  changeTheSwatch(id,a);
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

$(document).on('mouseup','.slideshowContent',function(){
  $(this).activeX();
  if($(this).hasClass('textBlock')){
      var a = $('.activeContent .textBack').css('background-color');
      changeSwatch(a); 
      changeFont();
    }
    else{
    }
    if($(this).hasClass('slideshowContent')){
      refreshzIndex();
      addDeleteBox();
    }
    editFocus();
    changeTransition();  
});
var activeId = 0;
var ImageX;
var backgroundColor = '#272727', opacity = 0.4, fontFamily = 'verdana', fontColor = "#000000";
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
    var a = $("#background"+activeId).css("background-image");
    a  = a.match(/\(([^)]+)\)/)[1];
    var x  =a.split('/');
    var d  =x.pop();
    var url = '<?php echo DOCROOT;?>?route=account/deletefile';
    var file;
    $.post(url, {file:d}, function(data){
        return false;
    });
  $("#background"+activeId).css("background-image","");
  backgroundDiv();
}
$('.nav-fonts li').on('click', function(){

  var e = $(this).attr('data-font');
  //editFocus();
  //formatDoc('fontname',e);
  //editFocus();
  $('.activeContent').css('font-family',e);
  $('.nav-fonts .active').removeClass('active');
  $(this).addClass('active');
  //alert(e);
});

function nextSlide(){
  $('.present').removeClass('present');
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
    $('.present').removeClass('present');
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
   $("#background"+activeId).remove();
  var a = countSlides();
  if(a==0){
    activeId = 0;
    addSlide();
  }
  if(activeId == (a+1) && a>0){
    activeId = activeId - 1;
  }
  updateSlides();
  a = countSlides();
  chckArrows(); 
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
  pxToPercentage();
  var slideData = submitSlide();
  $("#background1").css("background-size",'');
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
    $('.saving-progress').removeClass('hidden');
    html2canvas(c3, {
    onrendered: function(canvas) {
    document.body.appendChild(canvas);
    var canvasc = $("canvas");
    canvasc.attr('id','myCanvas');
    var canvasx = document.getElementById("myCanvas");
    var img = canvasx.toDataURL("image/jpeg");
    $.post('<?php echo DOCROOT."index.php?route=account/updateslideshow";?>', {img:img, myDoc: slideData, type: e}, function(data){
      $('.saving-progress').addClass('hidden');
      window.location.href = '<?php echo DOCROOT;?>';
    });
    $("#aqs").remove();
    $("#myCanvas").remove();
  },
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
  updateSlides();
  editFocus();
  chckArrows();
  backgroundDiv();
  insertTextBox();
};
function pxToPercentage(){
  $('section .slideshowContent').each(function(){
    var left = $(this).css('left');
    var a = left.split('px');
    var a = Math.round((parseInt(a[0])/9.60));
    $(this).css('left',a+'%');
    var top = $(this).css('top');
    var a = top.split('px');
    var a = Math.round((parseInt(a[0])/7));
    $(this).css('top',a+'%');
    var height = $(this).css('height');
    var a = height.split('px');
    var a = Math.round((parseInt(a[0])/7));
    $(this).css('height',a+'%');
    var width = $(this).css('width');
    var a = width.split('px');
    var a = Math.round((parseInt(a[0])/9.6));
    $(this).css('width',a+'%');
  });
}
function deleteThis(){
  $(".activeContent").remove();
  refreshzIndex();
  if($('.activeContent').hasClass('imageBox')){
    var a = $('.activeContent').find('img').attr('src');
    var x  =a.split('/');
    var d  =x.pop();
    var url = '<?php echo DOCROOT;?>?route=account/deletefile';
    var file;
    $.post(url, {file:d}, function(data){
        var x = json_decode(data);
        return false;
    });
  }
}
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
    //$(".imgThumbnail").css("background",cc+" "+ci);
    var c = $("#background"+activeId).css('background-image');
    var d = $("#background"+activeId).css('background-size');
    //alert(d);
    $(".imgThumbnail").css("background-image",c);
    $(".imgThumbnail").css("background-size",d);
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
  c.setAttribute('style','background:none;width:700px;height:400px;left:130px;top:100px;position:absolute;');
  var d = document.createElement("div");
  d.setAttribute('class','textBack');
  d.setAttribute('style','background:'+ backgroundColor +'; opacity:'+ opacity +';');
  var e = document.createElement("div");
  e.setAttribute('class','desc');
  e.setAttribute('contenteditable','true');
  e.setAttribute('style','color:'+ fontColor +';');
  //var f = document.createElement("h2");
  //f.setAttribute('style','text-align:center;');
  //var g = document.createTextNode('TITLE');
  //f.appendChild(g);
  //e.appendChild(f);
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
});
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
}
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
      $("#progress").removeClass('hidden');
    },
    uploadProgress: function(event, position, total, percentComplete) 
    {
        $("#progress .progress-bar").width(percentComplete+'%');
        $("#progress .progress-bar").attr('aria-valuenow', percentComplete);
        $("#progress .sr-only").html(percentComplete+'% Complete (success)');
    },
    success: function() 
    {    
        document.getElementById('fileinput').value = null;
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
        $("#progress").addClass('hidden');
        $("#progress .progress-bar").width(0+'%');
        $("#progress .progress-bar").attr('aria-valuenow', 0);
      
    },
    error: function()
    {
    }
  };
  var optionsIMG = { 
    beforeSend: function() 
    { 
      $("#progress").removeClass('hidden');
    },
    uploadProgress: function(event, position, total, percentComplete) 
    {
      $("#progress .progress-bar").width(percentComplete+'%');
      $("#progress .progress-bar").attr('aria-valuenow', percentComplete);
      $("#progress .sr-only").html(percentComplete+'% Complete (success)');
       // $("#bar").width(percentComplete+'%');
       // $("#percent").html(percentComplete+'%');
    },
    success: function() 
    {
        document.getElementById('fileinput2').value = null;
    },
    complete: function(response) 
    {
        var a = response.responseText;
        var xs = a.split("-");
        var sd = '<div class="imageBox slideshowContent" style="position:absolute; left:100px;top:100px;width:460px;height:400px;"><img class="img-responsive" src="<?php echo DOCROOT; ?>'+xs[1]+'"></img></div>';
        var u = $("#slide"+activeId);
        u.append(sd);
        $("#progress").addClass('hidden');
        $("#progress .progress-bar").width(0+'%');
        $("#progress .progress-bar").attr('aria-valuenow', 0);
        imageDragAndResize();
    },
    error: function()
    {
    
    }
  };  
  $("#addPicture").ajaxForm(optionsBG);
  $("#addPicture2").ajaxForm(optionsIMG);
});
$(function(){
  $("#transparencySlider").slider({
    value:0.6,
    min: 0,
    max: 1,
    step: 0.1,
    slide: function( event, ui ) {
      $( "#transparencyValue" ).html( ui.value );
      $("#slide"+activeId+" .textBack").css('opacity',1-ui.value);
    }
  });
  $("#transparencyValue").html($("#transparencySlider").slider("value"));
});
$(function() {
  $( "#transparencySliderTB" ).slider({
    value:0.6,
    min: 0,
    max: 1,
    step: 0.1,
    slide: function( event, ui ) {
    $( "#transparencyValueTB" ).html( ui.value );
    opacity = 1-ui.value;
    }
  });
  $( "#transparencyValueTB" ).html( $( "#transparencySliderTB" ).slider( "value" ) );
});
function hexFromRGB(r, g, b) {
  var hex = [
    r.toString( 16 ),
    g.toString( 16 ),
    b.toString( 16 )
  ];
  $.each( hex, function( nr, val ) {
    if ( val.length === 1 ) {
      hex[ nr ] = "0" + val;
    }
  });
  return hex.join( "" ).toUpperCase();
}
function refreshSwatch() {
  var a = this.parentNode.getAttribute("data-target");
  var b = this.parentNode.getAttribute("id");
  var red = $( "#"+b+" .red" ).slider( "value" ),
      green = $( "#"+b+" .green" ).slider( "value" ),
      blue = $( "#"+b+" .blue" ).slider( "value" ),
      hex = hexFromRGB( red, green, blue );
    if(a=='changeBackGClr'){
      $("#background"+activeId).css('background-color','#'+hex);
    }
    if(a=='changeBGCS'){
      backgroundColor = "#"+hex;
    }
    if(a=='changeFontColor'){
      fontColor = "#"+hex;
    }
    if(a=='fontColor'){
      formatDoc('forecolor',"#" + hex);
      editFocus();
    }
  $( "#"+b+" .swatch" ).css( "background", "#" + hex );
  if(a=='textBack'){
    if($('.activeContent').hasClass('textBlock')){
      $('.activeContent .textBack').css('background',"#" + hex);  
    }
    else{
      $('.activeContent').css('background',"#" + hex);
    }
  }
}
function changeFont(){
  var a = $('.activeContent').css('font-family');
  $('.nav-fonts .active').removeClass('active');
  $('*[data-font="'+a+'"]').addClass('active');
}
function changeTransition(){
  var t = $('.activeContent').attr('data-effect');
  //alert(t);
  $('.nav-effects .active').removeClass('active');
  if(t){
    
    $('*[data-effect="'+t+'"]').addClass('active');
  }
  else{
    $('*[data-effect="null"]').addClass('active');
  }
}
function changeTheSwatch(id, hex){
  var h = hex;
  var r = hexToR(h);
  var g = hexToG(h);
  var b = hexToB(h);
  //$( "#"+id+" .swatch" ).css( "background", hex );
  $( "#"+id+" .red" ).slider( "value", r );
  $( "#"+id+" .green" ).slider( "value", g );
  $( "#"+id+" .blue" ).slider( "value", b );
  $( ".red, .green, .blue" ).slider().refreshSwatch();
  }
$(function(){
  $( ".red, .green, .blue" ).slider({
      orientation: "horizontal",
      range: "min",
      max: 255,
      value: 127,
      slide: refreshSwatch,
      change: refreshSwatch
  });
  $( ".red" ).slider( "value", 200 );
  $( ".green" ).slider( "value", 200 );
  $( ".blue" ).slider( "value", 200 );
  $( "#changeFCS .red" ).slider( "value", 60 );
  $( "#changeFCS .green" ).slider( "value", 60 );
  $( "#changeFCS .blue" ).slider( "value", 60 );
  $( "#changeFC .red" ).slider( "value", 60 );
  $( "#changeFC .green" ).slider( "value", 60 );
  $( "#changeFC .blue" ).slider( "value", 60 );
});
function changeSwatch(rgb){
rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
  $( "#changeTBCX .red" ).slider( "value", rgb[1]);
  $( "#changeTBCX .green" ).slider( "value", rgb[2]);
  $( "#changeTBCX .blue" ).slider( "value", rgb[3]);
}
function hexToR(h) {return parseInt((cutHex(h)).substring(0,2),16)}
function hexToG(h) {return parseInt((cutHex(h)).substring(2,4),16)}
function hexToB(h) {return parseInt((cutHex(h)).substring(4,6),16)}
function cutHex(h) {return (h.charAt(0)=="#") ? h.substring(1,7):h}
$(".animation-direction li").on('click', function(){
  $('.active').removeClass('active');
  var d = $(this).attr('data-effect');
  $(this).addClass('active');
  $(".activeContent").attr('data-effect', d);
});
$('.font-color-settings .colors div').on('click', function(){
  var hex = $(this).attr('data-color');
  var id = $(this).parent().parent().attr('data-target');
  changeTheSwatch(id, hex);
});
function reinitialize(){
  var n = countSlides();
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
}
</script>
<?php if($postdata[0]['content'] || $postdata['images']): ?>
<script type="text/javascript">
    activeId = 1;
    updateSlides();
    backgroundDiv();
    reinitialize();
    var editable_elements = document.querySelectorAll("[contenteditable=false]");
    var e = editable_elements.length;
    for (var i = e - 1; i >= 0; i--) {
        editable_elements[i].setAttribute("contentEditable", true);
    };
</script>
<?php else: ?>
<script type="text/javascript">
    addSlide();
</script>
<?php endif;?>
