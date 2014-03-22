<?php
// header('Content-type: text/html; charset=utf-8');
// $start = microtime();
	//aPrint($_SESSION['LoggedUser']);
	require_once('model/common/model_common_category.php');
	$catModel = new category_Model();
	$allcategories = $catModel->getTopNavigation();
	//aPrint($allcategories);
	$navigationMenus = buildTreeArray($allcategories);
	
	//echo "<pre>"; print_r($navigationMenus); echo "<pre>";
	
//echo 'session----'.$_SESSION['LoggedUser']['name'].'-----------';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="icon" href="http://viaslide.com/favicon.ico" type="image/x-icon" />
<!--meta http-equiv="Content-Type" content="text/html; charset=utf-8"/-->
<!--meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1; charset=utf-8"/-->
<!--meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9,chrome=1"-->
<meta http-equiv="Content-Type" content="IE=edge,chrome=1;text/html;charset=utf-8" />
<!--meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1;"-->
<meta title = "<?php if ($postdata['main']['title']) {
    echo $postdata['main']['title'].' - ';
    } 
    elseif($heading){
    echo $heading.'&nbsp;Photos, Galleries, Slideshows - ';
    }?>ViaSlide">
<meta keywords="
<?php if($postdata['tags']){ 
             foreach($postdata['tags'] as $tag) 
     echo ucwords($tag['tag_name']); 
 } ?>">
 
<meta description="<?php // echo $postdata['main']['content']; ?>">
<!--meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
<?php if ($postdata['main']['title']) {
    echo $postdata['main']['title'].' - ';
    } 
    elseif($heading){
    // echo $heading.'&nbsp;Photos, Galleries, Slideshows - ';
    }?>ViaSlide</title>

    <!--script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script-->
    <!--style type="text/css" rel="stylesheet" href="header.css"></style-->
    <link rel="stylesheet" type="text/css" href="<?php echo DOCROOT.THEMEPATH; ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOCROOT.THEMEPATH; ?>assets/css/bootstrap-theme.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo DOCROOT.THEMEPATH; ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo DOCROOT.THEMEPATH; ?>header.css">
    <!--link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">normalize.css<-->
    <link rel="stylesheet" href="<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/normalize.css">
    <!--link rel="stylesheet" href="<?php // echo DOCROOT.THEMEPATH; ?>assets/assets2/jquery-ui.css"-->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo DOCROOT.THEMEPATH; ?>assets/dropzone/downloads/css/dropzone.css">
    <!--script src="http://code.jquery.com/jquery-1.9.1.js">jquery-2.1.0.min</script-->
    <script src="<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/jquery-2.1.0.min.js"></script>
    <!--script src="<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/jquery-1.9.1.js"></script-->
    <!--script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js">jquery.mousewheel.js</script-->
    <!--script src="<?php // echo DOCROOT.THEMEPATH; ?>assets/assets2/jquery.mousewheel.js"></script-->
    <!--script src="<?php // echo DOCROOT.THEMEPATH; ?>assets/assets2/jquery-ui.js"></script-->
    <script src="<?php  echo DOCROOT.THEMEPATH; ?>assets/js/jquery.form.js"></script>
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
    <?/*
    <link rel="stylesheet" type="text/css" href="<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/css/default.css" />
    */?>
    <link rel="stylesheet" type="text/css" href="<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/css/component.css" />

    
    <script src="<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/js/modernizr.custom.js"></script>
    <script src="<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/js/classie.js"></script>
    <script src="<?php echo DOCROOT.THEMEPATH; ?>assets/assets2/js/uisearch.js"></script>
        
<!--script src="<?php //  echo DOCROOT.THEMEPATH; ?>assets/js/dropzone.js"></script-->

    <!--script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script-->
    <!--script type="text/javascript" src="bs/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bs/js/bootstrap.js"></script-->
    <!--style type="text/css">
        @font-face {
        font-family: 'Glyphicons Halflings';
        src: url('<?php //echo DOCROOT.THEMEPATH; ?>assets/fonts/glyphicons-halflings-regular.eot');
        src: url('<?php //echo DOCROOT.THEMEPATH; ?>assets/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), 
        url('<?php //echo DOCROOT.THEMEPATH; ?>assets/fonts/glyphicons-halflings-regular.woff') format('woff'), 
        url('<?php //echo DOCROOT.THEMEPATH; ?>assets/fonts/glyphicons-halflings-regular.ttf') format('truetype'), 
        url('<?php //echo DOCROOT.THEMEPATH; ?>assets/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
    }
</style-->

<!--search script ends-->
<div id="fb-root"></div>  
<script>
(function(w, d, s) {
  function go(){
  var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
  if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.src = url; js.id = id;
    fjs.parentNode.insertBefore(js, fjs);
  };
  load('//connect.facebook.net/en_US/all.js#xfbml=1&appId=121771584602003', 'fbjssdk');
  load('//apis.google.com/js/plusone.js', 'gplus1js');
  load('//platform.twitter.com/widgets.js', 'tweetjs');
  load('//platform.linkedin.com/in.js', 'lnkdjs');
  load('//assets.pinterest.com/js/pinit.js', 'pinitjs');
 }
 if (w.addEventListener) { w.addEventListener("load", go, false); }
  else if (w.attachEvent) { w.attachEvent("onload",go); }
 }(window, document, 'script'));
</script>
<script type="text/javascript">
 var _gaq = _gaq || [];
 var pluginUrl = 
 '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
    _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
  _gaq.push(['_setAccount', 'UA-44049472-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<script type="text/javascript">
<?php if(isLoggedIn()):?>
var loggedIn = true;
<?php else: ?>
var loggedIn = false;
 var redirectURI = null;
<?php endif; ?>
</script>
</head>

<body>


<div class="overlay" id="overlay" style="display:none;">
    <div class="overlay-exit pull-right cancel-btn fa fa-times"></div>
</div>
<div class="overlay-preview" id="overlay-preview" style="display:none;">
    <div class="overlay-exit pull-right cancel-btn fa fa-times"></div>
</div>


<section id = "loginOverlay" class="lightbox">
    <h2 class="overlay-header">Log In</h2>
    <!--div class="overlay-half overlay-social-section">
    <a href=""><img class="img-responsive" src="images/fbconnect.png" style="position:absolute; top:25%;"></img></a>
    </div-->
    <!--div class="overlay-half"-->
    <div class="form-group col-lg-12 col-xs-12 col-md-12">
            <div class="loginFormIcon">
                <i class="fa fa-user"></i>
            </div>
    </div>
    
    <form id="loginForm" action="" class="form-horizontal">
    <div class="form-group col-lg-12 col-xs-12 col-md-12 has-feedback">
    <div class="controls">
        <input id="inputSigninEmail" type="text" class="form-control solid-bdr overlay-input" name="inputSigninEmail" placeholder="Username"></input>
        <span class="fa fa-user form-control-feedback"></span>
    </div>
    </div>
    <div class="form-group col-lg-12 col-xs-12 col-md-12 has-feedback">
        <div class="controls">
        <input id="inputSigninPwd" type="password" class="form-control solid-bdr overlay-input" name="inputSigninPwd" placeholder="Password"></input>
        <span class="fa fa-key form-control-feedback"></span>
    </div>
    </div>
    <div class="form-group col-lg-12 col-xs-12 col-md-12 color-2">
        <a  href="#forgotPwd" title="Forgot Password" data-toggle="overlay" class="login-link color-2" data-id="ForgotPwdOverlay">Forgot Password ?</a>
    </div>
    <div class="form-group col-lg-12 col-xs-12 col-md-12x">
        Don't have account?<a href="#singup"  title="Sign Up" data-toggle="overlay" class="sign-up-link color-2" data-id="SignUpOverlay">&nbsp;Create an Account</a>
    </div>
    
    
    <div class="form-group col-lg-12 col-xs-12 col-md-12">
        <div class="controls">
            <button class="button loginFormBtn solid-bdr overlay-input pull-right" type="submit">Log In</button>
            <button class="button cancel-btn loginFormBtn solid-bdr overlay-input pull-right" onclick="cancelForm()">Cancel</button>
        </div>
    </div>

    <div class="clearfix"></div>
    <br>
    <br>


    </form> 
    <!--/div-->
</section>


<section id = "SignUpOverlay" class="lightbox">
    <h2 class="overlay-header">Sign Up</h2>
    <div class="form-group col-lg-12 col-xs-12 col-md-12">
            <div class="loginFormIcon">
                <i class="fa fa-user"></i>
            </div>
    </div>
    <form id="SignUpForm" action="" class="form-horizontal">

    <div class="form-group col-lg-12 col-xs-12 col-md-12 has-feedback">
        <div class="controls">
            <input id="inputSignUpUser" name="inputSignUpUser" type="text" class="form-control solid-bdr overlay-input" placeholder="Username"></input>
            <span class="fa fa-user form-control-feedback"></span>
        </div>
    </div>

    <div class="form-group col-lg-12 col-xs-12 col-md-12 has-feedback">
        <div class="controls">
            <input id="inputSignUpEmail" name="inputSignUpEmail" type="text" class="form-control solid-bdr overlay-input" placeholder="Email"></input>
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>
    </div>
    
    <div class="form-group col-lg-12 col-xs-12 col-md-12 has-feedback">
        <div class="controls">
            <input id="inputSignUpPwd" name="inputSignUpPwd" type="password" class="form-control overlay-input" placeholder="Password"></input>
            <span class="fa fa-key form-control-feedback"></span>
        </div>
    </div>
    
    <div class="form-group col-lg-12 col-xs-12 col-md-12">
        <div class="controls">
            
        </div>
    </div>
    <div class="form-group col-lg-12 col-xs-12 col-md-12">
        <div class="controls">
            <button class="button pull-right" type="submit" value="Sign Up">Sign Up</button>
            <button class="button cancel-btn pull-right" onclick="cancelForm()">Cancel</button>    
        </div>
    </div>
    <br>
    <br>
  </form> 
</section>

<section id = "ForgotPwdOverlay" class="lightbox">
    <h2 class="overlay-header">Forgot Password ?</h2>
    <h4 class="text-center color-2">Submit Email Id used for registration to recover lost Password.</h4>
    <div class="form-group col-lg-12 col-xs-12 col-md-12">
            <div class="loginFormIcon">
                <i class="fa fa-lock"></i>
            </div>
    </div>
    
    <!--div class="overlay-half overlay-social-section">
    </div>
    <div class="overlay-half"-->
    <form id="ForgotPwdForm" action="" method="post" class="form-horizontal">
    <div class="form-group col-lg-12 col-xs-12 col-md-12 has-feedback">
        <div class="controls">
            <input id="inputForgotPwdEmail" name="inputForgotPwdEmail" type="name" class="form-control overlay-input" placeholder="Email"></input>
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>
    </div>
    
    <div class="form-group col-lg-12 col-xs-12 col-md-12">
        <div class="controls">
            
        </div>
        
    </div>
    <div class="form-group col-lg-12 col-xs-12 col-md-12">
        <div class="controls">
            <button class="button pull-right" type="submit" value="Submit">Submit</button>
            <button class="button cancel-btn pull-right" onclick="cancelForm()">Cancel</button>    
        </div>
    </div>
    </form>
    <br>
    <br>
    <!--/div-->
</section>
<section id="progress" class="section-loading hidden">
<div class="section-progress">
    <div class="progress progress-striped">
      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
        <span class="sr-only">40% Complete (success)</span>
      </div>
    </div>
    <h3 class="text-center">Please, Be Patient</h3>
</div>
</section>
<section id = "submitFeedback" class="lightbox">
    <h2 class="overlay-header">Submit Feedback</h2>
    <div class="form-group col-lg-12 col-xs-12 col-md-12">
            <div class="loginFormIcon">
                <i class="fa fa-user"></i>
            </div>
    </div>
    <form id="submitFeedbackForm" action="" class="form-horizontal">
    <div class="form-group col-lg-12 col-xs-12 col-md-12 has-feedback">
        <div class="controls">
            <input id="inputfeedbackUser" name="first_name" type="text" class="form-control solid-bdr overlay-input" placeholder="Name"></input>
            <span class="fa fa-user form-control-feedback"></span>
        </div>
    </div>
    <div class="form-group col-lg-12 col-xs-12 col-md-12 has-feedback">
        <div class="controls">
            <input id="inputfeedbackEmail" name="email" type="text" class="form-control solid-bdr overlay-input" placeholder="Email"></input>
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>
    </div>
    <div class="form-group col-lg-12 col-xs-12 col-md-12">
        <div class="controls">
            <textarea id="inputfeedbackDesc" name="feedback" type="password" class="form-control overlay-input" placeholder=""></textarea>
        </div>
    </div>
    
    <div class="form-group col-lg-12 col-xs-12 col-md-12">
        <div class="controls">
            
        </div>
    </div>
    <div class="form-group col-lg-12 col-xs-12 col-md-12">
        <div class="controls">
            <button class="button pull-right" type="submit" value="Submit">Submit</button>
            <button class="button cancel-btn pull-right" onclick="cancelForm()">Cancel</button>    
        </div>
    </div>
    <br>
    <br>
  </form> 
</section>

<!-- Image DIV -->
<!-- Image DIV End Here -->
<?php
    $dbInfo = $_SESSION['LoggedUser'];
?>
<style type="text/css">
    .profileIcon{
        background: #AAA;
        border-radius: 2px;
        padding-right: 12px;
        padding-left: 12px;
    }
    .text-left{
        text-align: left;
    }
    .navbar-custom{
        border: none;
    }
    .section-loading{
        width: 100%;
        height: 100%;
        position: fixed;
        background: rgba(34,34,34,0.9);
        z-index: 999;
    }
.section-loading .section-progress{
  text-align: center;
  width: 800px;
  height: 50px;
  position: absolute;
  margin: auto;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;  
}
.loading {
  text-align: center;
  width: 100px;
  height: 50px;
  position: absolute;
  margin: auto;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}

.loading div {
  border-radius:50%;
  height:10px; 
  width:10px;
  display: inline-block;
  box-sizing: border-box;
  /*background: #0ea6fd;*/
  background: #7fc04c;
}
.loading h3{
    color: rgba(200,200,200,0.9);
}
.loading div:nth-of-type(4) {
  -webkit-animation:flash 0.8s 0.1s ease-in-out infinite;
  animation:flash 0.8s 0.1s ease-in-out infinite;
}
.loading div:nth-of-type(3) {
  -webkit-animation:flash 0.8s ease-in-out infinite;
  animation:flash 0.8s ease-in-out infinite;
}
.loading div:nth-of-type(2) {
  -webkit-animation:flash 0.8s -0.1s ease-in-out infinite;
  animation:flash 0.8s -0.1s ease-in-out infinite;
}
.loading div:nth-of-type(1) {
  -webkit-animation:flash 0.8s -0.2s ease-in-out infinite;
  animation:flash 0.8s -0.2s ease-in-out infinite;
}

@keyframes flash {
  0% { opacity: 0; }
  50% { opacity: 0.5 }
  100% { opacity: 1.0 }
}
@-webkit-keyframes flash {
  0% { opacity: 0; }
  50% { opacity: 0.5 }
  100% { opacity: 1.0 }
}
.form-group{
    font-size: 1.2em;
}
.color-2{
    color: rgba(100,100,100,0.8);
}
.lightbox{
    left: 100%;
    transition:0.5s ease-in-out;
    opacity: 0;
}
.lightbox-show{
    left: 0%;
    opacity: 1;
}
</style>
<section class="section-loading saving-progress hidden">
<div class="loading">
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <h3>Saving</h3>
</div>
</section>
<section id = "addDetailsOverlay" class="lightbox">
    <h2 class="overlay-header">Update Details</h2>
    <div class="form-group col-lg-12 col-xs-12 col-md-12" style="font-size:120%;">
        <div class="row">
            <div class="col-lg-4 col-xs-4 col-md-4">
                <div id="inputProfilePicture">
                        <form id="addProfilePicture" action="<?php echo DOCROOT;?>?route=account/adduserimage" method="post" enctype="multipart/form-data">   
                            <input class="form-control solid-bdr file-browse-input hidden" type="file" class="file" id="profileinput" name="myfile" onchange="document.getElementById('submitProfilePictureForm').click();" style="width:100%;height:100%; z-index:-99; opacity:0; cursor:pointer;"/>
                            <input type="submit" id="submitProfilePictureForm" class="btn btn-default pull-right" style="display:none;">                        
                        </form>
                        <div class="profileImg">
                            <div class="profileImage">
                                <?php if($dbInfo['image'] && ($dbInfo['image']!='undefined')): { ?>
                                <img class="img-responsive" src="<?php echo DOCROOT.$dbInfo['image']; ?>">
                                <div class="bgThumb" onclick="document.getElementById('profileinput').click();">
                                    <div class="chngProfilePic btnCenter" style="top:80%; text-align:center; cursor:pointer;">Change Picture</div>
                                </div>
                            <?php } endif; ?>    
                            </div>
                            <div class="profileImageIcon">
                                <?php if(!$dbInfo['image'] || ($dbInfo['image']=='undefined')): { ?>
                                <div class="fa fa-user profileIcon" onclick="document.getElementById('profileinput').click();" style="font-size:1000%;text-align:center; z-index:99; cursor:pointer;"></div>
                                    <div class="bgThumb" onclick="document.getElementById('profileinput').click();">
                                        <div class="chngProfilePic btnCenter" style="top:80%; text-align:center; cursor:pointer;">Add Picture</div>
                                    </div>
                                <?php } endif; ?>   
                            </div>
                            
                        </div> 
                </div>
            </div>  
            <div class="col-lg-8 col-xs-8 col-md-8">
                <form id="userdetailsForm" action="" method="post" onsubmit="this.image.value = getProfileURL();">
                    <div class="row">
                        <div class="col-lg-4 col-xs-4 col-md-4 text-left">Username:</div>
                        <div class="col-lg-8 col-xs-8 col-md-8"><div class="pull-left"><?php echo $dbInfo['user_name'];?></div></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xs-4 col-md-4 text-left">Email:</div>
                        <div class="col-lg-8 col-xs-8 col-md-8"><div class="pull-left"><?php echo $dbInfo['email'];?></div></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xs-4 col-md-4 text-left">Name:</div>
                        <div class="col-lg-8 col-xs-8 col-md-8">
                            <div class="form-group col-lg-12 col-xs-12 col-md-12" style="padding:0;">
                            <div class="controls">
                                <input id="inputFName" type="text" class="form-control solid-bdr overlay-input" name="info[first_name]" placeholder="First Name" value="<?php echo $dbInfo['first_name'];?>"></input>
                            </div>
                        </div>    
                        </div>
                    </div>
                    <div class="row">
            <div class="col-lg-12 col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-lg-4 col-xs-4 col-md-4 text-left">About:</div>
                        <div class="col-lg-8 col-xs-8 col-md-8">
                            <div class="form-group col-lg-12 col-xs-12 col-md-12" style="padding:0;">
                            <div class="controls">
                                <textarea id="inputAbout" type="text" class="form-control solid-bdr overlay-input" name="info[last_name]" placeholder="<?php echo $dbInfo['last_name'];?>" value="<?php echo $dbInfo['last_name'];?>"></textarea>
                            </div>
                        </div>    
                        </div>
                </div>
            </div>
        </div>
                    <div class="form-group row">
                        <div class="controls">
                            <button class="button pull-right loginFormBtn solid-bdr overlay-input" type="submit">Update</button>
                            <button class="button pull-right cancel-btn loginFormBtn solid-bdr overlay-input" onclick="cancelForm()">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>    
</section>


<!-- Add Link Div -->
<section id="addLinkOverlay" class="lightbox">
    <form id="addLinkForm" class="card image-card" method="post" enctype="multipart/form-data">
        <!--Slide Image URL Starts Here-->
            <div class="form-group" id="addURLLabel">
            <label class="control-label" for="addURLLabel">Add URL</label>
            <div class="controls">
                <input class="form-control solid-bdr" class="span4" id ="addurl" placeholder="http://myhost.com/" name="image" type="text" value=""/>
            </div>
            <div class="textfield">
                <div class="alert alert-danger"><?php echo isset($error['fileurl'][$i]) ? $error['fileurl'][$i] : ''; ?> </div>
            </div>
            </div>
        <!--Slide Image URL ends here-->
        
        <!--Slide title starts here-->
            <div class="form-group">
            <label class="control-label" for="link-title">Title</label>
            <div class="controls">
                <input class="form-control solid-bdr" class="span4" id ="link" name="link" type="text" value="" placeholder="Myhost"/>
                <span class="button pull-right">Cancel</span>
            </div>
            </div>
        <!--Slide title ends here-->    
            <div class="form-group">
            <div class="form-group">
            <label class="control-label" for="video-descr"></label>
            <div class="controls">
            <span class="span4">
                <input name="submit" type="submit" value="Add Link" class="button pull-right" onclick="addLink()" style="margin-left:25px;"/>
            </span>
            </div>
    </div>
 </div>
</form>
</section>
<!-- Add Link Div End Here -->

<div id="wrapper">
<nav class="navbar navbar-custom" role="navigation">
<div class="navbar-inner">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo DOCROOT;?>" title="ViaSlide">
            <span>viaslide</span>
        </a>
    </div>
    <div class="collapse navbar-collapse">  
    <ul class="nav navbar-left">
        <li><span class="button xcd" style="margin:0; margin-left:10em;padding:1.5em 2em 1.45em 2em;border-radius:0;font-size:18px;">Create Slideshow</span></li>
    </ul>
    <ul class="nav navbar-right">
    <li>
    <span id="sb-search" class="sb-search nav navbar-right">
                        <form id="srch-form">
                            <input class="sb-search-input" autocomplete="off" placeholder="Explore..." type="text" value="" name="search" id="search">
                            <input class="sb-search-submit" type="submit" value="">
                            <span class="sb-icon-search"></span>
                        </form>
                    </span>
    </li>
    <?php if( isset($_SESSION["LoggedUser"]) ) : ?>
        <li class="login-link" id="dropDownSignin">
            <a class="button" role="button" href="" style="margin:0; padding:0.5em; border-radius:0; font-size:20px; background:none; ">
            <?php if($_SESSION['LoggedUser']['image'] && ($_SESSION['LoggedUser']['image']!='undefined')): ?>
                <img src="<?php echo DOCROOT.$_SESSION['LoggedUser']['image']; ?>" width="34" height="34"/>
            <?php else: ?>
                <i class="fa fa-user" style="color:#fff; padding:0.35em;"></i>
            <?php endif; ?>
                <?php echo $_SESSION["LoggedUser"]['user_name']; ?>&nbsp;<span class="fa fa-angle-down"></span>
            </a>
            
           <ul id="menu3" class="dropdown-menu offset9" role="menu">
              <li role="presentation"><a class="login-link" role="menuitem" tabindex="-1" href="<?php echo DOCROOT.'user/'.$_SESSION['LoggedUser']['id'];?>">My Slides</a></li>  
              <li role="presentation"><a data-toggle="overlay" class="login-link" data-id="addDetailsOverlay" href="#"role="menuitem" tabindex="-1" href="<?php echo DOCROOT;?>account">Manage Account</a></li>
              <li role="presentation" class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo DOCROOT;?>signout">Sign Out</a></li>
            </ul>
        </li>
        <?php else : ?>
            <li><a title="Log In" id="loginLink" data-toggle="overlay" class="login-link" data-id="loginOverlay" href="#singin" style="margin:0; padding:0.75em; border-radius:0; font-size:22px; height:54px;">
                <i class="fa fa-user" style="color:#fff;"></i>
            </a></li>
        <?php endif; ?>
    </ul>
</div>
</div>
</nav>
<div class="container main">
<script type="text/javascript">
$("#srch-form").submit(function(){
    var srchTxt = $(".sb-search-input").val();
        if(srchTxt!==''){
        var url = '<?php echo DOCROOT;?>'+'search/'+srchTxt;
        location.href = url;
        }
        return false;
});
</script>



<? /*
<div id = "category-menu">

    <?php if($navigationMenus): $i=0;?>
    <ul>
            <?php foreach($navigationMenus as $mainMenu) { $i++; ?>
            <li>
                <?php if($mainMenu['childs']) : ?>
                <li><a href="<?php echo DOCROOT;?>category/<?php echo $mainMenu['id']; ?>"><?php echo $mainMenu['name']; ?></a>
                <ul>
                <?php foreach($mainMenu['childs'] as $level1Childs) { ?>
                <li><a href="<?php echo DOCROOT;?>category/<?php echo $level1Childs['id']; ?>"><?php echo $level1Childs['name']; ?></a></li>
                <?php } ?>
                </ul></li>
                
                <?php else : ?>
                <a href="<?php echo DOCROOT;?>category/<?php echo $mainMenu['id']; ?>" <?php echo $i==count($navigationMenus) ? 'style="margin-right:0"' :''; ?>><?php echo $mainMenu['name']; ?></a>
                <?php endif; ?>
                
        </li>
            <?php } ?>
       </ul>
    <?php endif; ?>
    
    
</div>
*/?>

    
<!--/div>
this section went to page section

</div>
</div-->


<!--Main Menu Starts-->
<!--end header-->


<style type="text/css">
    .main{
        padding-bottom: 84px;
        padding-top: 60px;
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
    $("a[data-toggle='overlay']").click(function(e){
      var z = document.querySelectorAll(".alert");
      if(z.length>0){
          for (var i = z.length - 1; i >= 0; i--) {
            z[i].remove;
          };
      }
      $(".lightbox-show").removeClass("lightbox-show");
      var ref =  $(this).attr('data-id');
      $(".overlay").show();
      $("#"+ref).addClass("lightbox-show");
  });  
});
$(".cancel-btn").click(function(e){
    $(".overlay").hide();
    $(".lightbox-show").removeClass("lightbox-show");
    var a = $(this).parent().attr('id');
    if(a=='overlay-preview'){
        location.reload();
    }
});
$("#loginForm").submit(function(event){
    var nameReg = /^[A-Za-z]+$/;
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email = $('#inputSigninEmail').val();
    var password = $('#inputSigninPwd').val();
    var inputVal = new Array(email, password);
    var inputMessage = new Array("Username/Email","Password");
    if(event.preventDefault){
        event.preventDefault();    
    }
    else{
        event.returnValue = false;
    }
    $('.alert').hide();
    $('.has-error').removeClass('has-error');
    if(inputVal){
        if(inputVal[0] == ""){
            $('#inputSigninEmail').after('<div class="alert alert-danger"> Please enter your ' + inputMessage[0] + '</div>');
            $('#inputSigninEmail').parent().parent().addClass('has-error');
            return false;
        } 
        if(inputVal[1] == ""){
            $('#inputSigninPwd').after('<div class="alert alert-danger"> Please enter your ' + inputMessage[1] + '</div>');
            $('#inputSigninPwd').parent().parent().addClass('has-error');
            return false;
        }   
    }
    $.post("<?php echo DOCROOT;?>?route=account/loginchk", $( "#loginForm" ).serialize(), function(data){
        var b = JSON.parse(data);
        if(b['error']){
            $('#inputSigninPwd').after('<br><div class="alert alert-danger">'+b['error']);
            return false;
        }
        var title = data;
        if(redirectURI){
            location.href = redirectURI;
        }
        else{
            location.reload();    
        }
        return false;
    }); 
});
$("#SignUpForm").submit(function(event){
    var nameReg = /^[A-Za-z0-9]+$/;
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var username = $('#inputSignUpUser').val();
    var email = $('#inputSignUpEmail').val();
    var password = $('#inputSignUpPwd').val();
    var inputVal = new Array(username, email, password);
    var inputMessage = new Array("Username", "Email","Password");
    if(event.preventDefault){
        event.preventDefault();    
    }
    else{
        event.returnValue = false;
    }
    $(".alert").hide();
    $('.has-error').removeClass('has-error');
    if(inputVal){
        if(inputVal[0] == ""){
            $('#inputSignUpUser').after('<div class="alert alert-danger"> Please enter your ' + inputMessage[0] + '</div>');
            $('#inputSignUpUser').parent().parent().addClass('has-error');
            return false;
        }
        if(inputVal[0].length < 6){
            $('#inputSignUpUser').after('<div class="alert alert-danger">Username must be at least 6 characters long.</div>');
            $('#inputSignUpUser').parent().parent().addClass('has-error');
            return false;
        }
        if(!nameReg.test(inputVal[0])){
            $('#inputSignUpUser').after('<div class="alert alert-danger">Username should be only alpha numeric');
            $('#inputSignUpUser').parent().parent().addClass('has-error');
            return false;
        }
        if(inputVal[1] == ""){
            $('#inputSignUpEmail').after('<div class="alert alert-danger"> Please enter your ' + inputMessage[1] + '</div>');
            $('#inputSignUpEmail').parent().parent().addClass('has-error');
            return false;
        }
         
        if(!emailReg.test(email)){
            $('#inputSignUpEmail').after('<div class="alert alert-danger"> Please enter a valid email address</div>');
            $('#inputSignUpEmail').parent().parent().addClass('has-error');
            return false;
        }
        if(inputVal[2] == ""){
            $('#inputSignUpPwd').after('<div class="alert alert-danger"> Please enter your ' + inputMessage[2] + '</div>');
            $('#inputSignUpPwd').parent().parent().addClass('has-error');
            return false;
        }
        if(inputVal[2].length < 6){
            $('#inputSignUpPwd').after('<div class="alert alert-danger">Password must be at least 6 characters long.</div>');
            $('#inputSignUpPwd').parent().parent().addClass('has-error');
            return false;
        }
    }
    $.post("<?php echo DOCROOT;?>?route=account/signup", $("#SignUpForm").serialize(), function(data){
        var a = JSON.parse(data);
        if(a['error']){
            if(a['error']['username']){
                $('#inputSignUpUser').after('<div class="alert alert-danger">Username already in Use.</div>');
            }
            if(a['error']['email']){
                $('#inputSignUpEmail').after('<div class="alert alert-danger">Email already in Use. </div>');
            }
        }
        else if(a['success']){
            location.reload();
        } 
    });
});
$('#submitFeedbackForm').submit(function(event){
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email = $('#inputfeedbackEmail').val();
    var name = $('#inputfeedbackUser').val();
    var desc = $('#inputfeedbackDesc').val();
    if(event.preventDefault){
        event.preventDefault();    
    }
    else{
        event.returnValue = false;
    }
    if(name==''){
        $('#inputfeedbackUser').parent().parent().addClass('has-error');
        $('#inputfeedbackUser').after('<div class="alert alert-danger"> Please enter your Name</div>');
        return false;
    }
    if(email == ""){
        $('#inputfeedbackEmail').parent().parent().addClass('has-error');
        $('#inputfeedbackEmail').after('<div class="alert alert-danger"> Please enter your Email</div>');
        return false;
    } 
    if(!emailReg.test(email)){
        $('#inputfeedbackEmail').after('<div class="alert alert-danger"> Please enter a valid Email address</div>');
        return false;
    }
    if(desc==''){
        $('#inputfeedbackDesc').parent().parent().addClass('has-error');
        $('#inputfeedbackDesc').after('<div class="alert alert-danger"> Please enter Description</div>');
        return false;
    }
    $.post("<?php echo DOCROOT;?>feedback", $("#submitFeedbackForm").serialize(), function(){

    });
});
$("#ForgotPwdForm").submit(function(event){
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email = $('#inputForgotPwdEmail').val();
    var inputVal = email;
    var inputMessage = "Email";
    if(event.preventDefault){
        event.preventDefault();    
    }
    else{
        event.returnValue = false;
    }
    $(".alert").hide();
    $('.has-error').removeClass('has-error');
        if(inputVal == ""){
            $('#inputForgotPwdEmail').parent().parent().addClass('has-error');
            $('#inputForgotPwdEmail').after('<div class="alert alert-danger"> Please enter your ' + inputMessage + '</div>');
        } 
        if(!emailReg.test(email)){
            $('#inputForgotPwdEmail').after('<div class="alert alert-danger"> Please enter a valid Email address</div>');
        }
    $.post("<?php echo DOCROOT;?>?route=account/forgotpwd", function(data){
        var a = JSON.parse(data);
        if(a['success']){

        }
        if(a['warning']){

        }
    });
});

$("#userdetailsForm").submit(function(){
    event.preventDefault();
    $.post("<?php echo DOCROOT;?>?route=account/updateuserdetails",$("#userdetailsForm").serialize(),  function(data){
        alert(data);
        cancelForm();
       return false;
    });
});
$("#navSearchInput").on('keyup',function(e){
    var inputStr = document.getElementById("navSearchInput").value;
        if(inputStr.length > 1){
        var srchData = '<li style="display:none;"></li>';
        $.post("<?php echo DOCROOT;?>?route=post/searchresults",{search:inputStr}, function(data){
            if(data){
            var count=0;
            var a = eval(data);
            var b = JSON.parse(data);
            var c = b.length;
            for (var i = b.length - 1; i >= 0; i--) {
                srchData+='<li><a class="srchResultsLi" href="'+a[i].id+'">'+a[i].title+'</li>'; 
            };
            document.getElementById("srchResults").innerHTML = srchData;
            document.getElementById("srchResults").style.display = "inline-block";   
            }
            return false;
        });
    }
    else{
        document.getElementById("srchResults").style.display = "none";
   }
});
$(".xcd").on('click', function(){
    loginCheck();
});
function cancelForm(event){
    //event.preventDefault();
    $('.alert').remove();
    $('.has-error').removeClass('has-error');
    $(".lightbox-show").removeClass("lightbox-show");
    $(".overlay").css('display', 'none');
    return false;
}
function validateImage(){
    //  var a = document.getElementById("#inputImageFile").value;
       // alert(909);
        //return false;
}
function loginCheck(){
    $.get("<?php echo DOCROOT;?>?route=account/signinchk", function(data){
        var a = JSON.parse(data);
        if(a=='success'){
           location.href = '<?php echo DOCROOT;?>create';
        }
        else{
            redirectURI = '<?php echo DOCROOT;?>create';
            document.getElementById("loginLink").click();
            return false;
        }
    });
}

var optionsProfPic = { 
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
         // $("#bar").width('100%');
          // $("#percent").html('100%');
         //$(".overlay").hide();
         //$(".lightbox-show").removeClass("lightbox-show");
    },
    complete: function(response) 
    {
        var a = response.responseText;
        var xs = a.split("-");
        var sd = '<img class="img-responsive profile-pic" src="<?php echo DOCROOT;?>data/user/'+xs[1]+'"></img>';
        var xc = "document.getElementById('profileinput').click()";
        sd+='<div class="bgThumb" onclick="'+xc+'"><div class="chngProfilePic btnCenter" style="top:80%; text-align:center; cursor:pointer;">Change Picture</div></div>'
        var u = $(".profileImage");
        u.html(sd);
        $(".profileImageIcon").addClass("hidden");
    },
    error: function()
    {
        // $("#message").html("<font color='red'> ERROR: unable to upload files</font>");
    }
};  
$("#addProfilePicture").ajaxForm(optionsProfPic);
function getProfileURL(){
    var z =  $(".profile-pic").attr("src");
    //alert(98);
    return z;

}
$('#wrapper').on('mousewheel', function(event) {
    var element = document.getElementById('wrapper');
    var position = element.getBoundingClientRect();
});

$(document).ready(function(){
    var w = $(window).width();
    var x = (w-600)/2;
    if(w<=800){
        $(".lightbox").css('width',0.8*w);
        $(".lightbox").css('margin-right',0.1*w);
        $(".lightbox").css('margin-left',0.1*w);
    }
    else{
        $(".lightbox").css('width',600);
        $(".lightbox").css('margin-right',x);
        $(".lightbox").css('margin-left',x);   
    }
});
</script>
<script>
    new UISearch( document.getElementById( 'sb-search' ) );
</script>