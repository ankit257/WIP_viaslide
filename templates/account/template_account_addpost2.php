
<style type="text/css">
  .heading3{
    padding-left: 70px;
    padding-top: 40px;
  }
  .title-block{
    margin-bottom: 12px;
    text-align: right;
  }
  .heading3{
    text-align: right;
  }
  #form_uploadPost{
    margin: 12px;
    padding: 12px;
  }
</style>
    

<form id="addpostform" name="compForm" method="post" action="" class="form-horizontal" id="form_uploadPost">
<div class="container-fluid">
<div class="row">
    <div class="col-lg-4 col-xs-4 col-md-4">
        <h1 class="heading3">Create SlideShow</h1>        <!--FORM STARTS-->    
    </div>
</div>
<!--div class="card" style="">
<div class="card-body"-->
<!--SELECT CAT STARTS -->
<?/**/?>
<div class="row" style="display:none;">
    <div class="title-block col-lg-4 col-xs-4 col-md-4">
        <h4>Category<span>*</span></h4>
        <p>Select Category</p>
    </div>
    <div class="form-group col-lg-4 col-xs-4 col-md-4">
            <div class="controls">
            <select  class="form-control solid-bdr" class="span4" id="select-main-cat" name="categories[]">
                <?php if($catList): foreach($catList as $cat) { ?>
                <option value="<?php echo $cat['id']; ?>" <?php echo $cat['id']==$SelectedCatIDs ? 'selected="selected"' : ''; ?>><?php echo $cat['name']; ?></option>
                <?php } endif; ?>
            </select>
            </div>
            </div>
</div>
<?/**/?>

<div class="row">
    <div class="title-block col-lg-4 col-xs-4 col-md-6">
        <h4>Title*</h4>
        <p>Enter Title</p>
    </div>
    <div class="form-group col-lg-4 col-xs-8 col-md-3">
            <label class="control-label" for="post-title"></label>
            <div class="controls">
                <input id="post-title" class="form-control solid-bdr" id ="post-title" name="info[title]" type="text" value="<?php echo isset($dbInfo['main']['title']) ? $dbInfo['main']['title'] : ''; ?>"/>
            </div>
            </div>
</div>
<div class="row">
    <div class="title-block col-lg-4 col-xs-4 col-md-3">
        <h4>Tags</h4>
        <p>Enter tags, Related to the slideshow</p>
    </div>
    <div class="form-group col-lg-4 col-xs-8 col-md-6">
            <!--label class="control-label" for="post-tags">Tags (Seperated by ',')</label-->
            
            <div class="controls">
                <div class="solidEdge inputTags">
                <!--div class="inputHolder"-->
                    <input class="form-control z solid-bdr" id = "post-tags" name="tags" type="text" class="span4" autocomplete="off" value="<?php echo isset($dbInfo['tags']) ? $dbInfo['tags'] : ''; ?>"/>
                    <ul class="srchTagResults" id="srchTagResults">
                        <!--li class="srchTagResultsItems"></li-->
                    </ul>
                <!--/div-->
                </div>
            </div>
            <div class="controls">
                <div class="solidEdge tags"></div>
            </div>
            </div>  
        </div>
        <div class="row">
            <div class="form-group col-lg-8 col-xs-12 col-md-9">
                    <div class="controls">
                        <input name="submit" type="submit" value="Next" class="button pull-right" onclick="fr()" style="margin-left:25px;"/>
                    </div>
            </div>
         </div>
    </div>
</form>
        
<!--FORM ENDS-->
<style>
    .tags{
        height: 34px;
    }
    .inputTags{
        border: none;
        padding: 0;
        position: relative;
        /*display: inline-block;*/
      
    }
    .tags>span{
        display: inline-block;
        float: left;
        width: auto; 
    }
    .inputTags:active{
        border:none;
    }
    .formx{
        border:0;
    }
    .formx:active{border:0;}
    .inputHolder{
        position: relative;
    }
    .srchTagResultsItems{
        list-style: none;
        cursor: pointer;
        background: #fff;
        border: none;
    }
    .srchTagResultsItems:hover{
        background: #9ececc;
    }
    .deleteThis{
        cursor: pointer;
        padding-left: 6px;
    }
    .srchTagResults{
        position:absolute;
        width:100%;
        display:none;
        z-index:300;
        /*top:34px;*/
        padding: 0px;
        border-radius: 2px;
        border: 1px solid #ccc;
    }
    .srchTagResults>li{
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 0 1px 1px rgba(0, 0, 0, .075);
    }
</style>
<script type="text/javascript">
$("#addpostform").submit(function(){
    $('.alert').remove();
    $('.has-error').removeClass('has-error');
    var inputTitle = $("#post-title").val();
    if(inputTitle == ""){
        $("#post-title").after('<div class="alert alert-danger">Please enter Title</div>');
        $("#post-title").parent().parent().addClass('has-error');
        return false;
    }
}

    );
function fr(){
    document.getElementById("post-tags").value = tags;
}
if(!Array.prototype.filterx){
    Array.prototype.filterx = function(fun /*, thisp*/){
            var len = this.length;
            if(typeof fun!= "function"){
                throw new TypeError();
            }
            var res = new Array();
            var thisp = arguements[1];
            for (var i = this.length - 1; i >= 0; i--) {
                if(i in this){
                    var val = this[i];
                    if(fun.call(thisp, val, i, this)){
                        res.push(val);
                    }
                }
            };
        return res;
    }
}
(function(){
   // refreshWidth();
})();
var tags = new Array();
$("#post-tags").on('keyup',function(e){
    var inputStr = document.getElementById("post-tags").value;
        if(inputStr.length > 1){
        $('.alert').remove();
        $('.has-error').removeClass('has-error');
        var tagReg = /^[A-Za-z0-9]+$/;

        if(!tagReg.test(inputStr)){
            $('.inputTags').after('<div class="alert alert-danger">Tags can be only alpha numeric');
            $('#post-tags').parent().parent().addClass('has-error');
            document.getElementById("srchTagResults").innerHTML = '';
            return false;
        }
        var srchData = '';
        $.post("<?php echo DOCROOT;?>?route=post/searchtagresults",{search:inputStr}, function(data){
            //event.preventDefault();
            var count=0;
            var a = eval(data);
            var b = JSON.parse(data);
            var c = b.length;
            var zx = new Array();
            for (var i = b.length - 1; i >= 0; i--) {
                zx.push(a[i].tag_name);
            };
            var cx = zx.filter(sortTags);
            function sortTags(element){
                var x =0;
                for (var i = tags.length - 1; i >= 0; i--) {
                    if(element==tags[i]){
                        x = 1;
                    }
                };
                if(x==0){
                    return element;
                }
            }
            for (var i = cx.length - 1; i >= 0; i--) {
                srchData+='<li class="srchTagResultsItems form-control solid-bdr" onclick="asdf(this.innerHTML)">'+cx[i]+'</li>'; 
            };
            var cc = $.inArray(inputStr, cx);
            if(cc==-1){
                //alert(90);
                var cd = "'"+inputStr+"'";
                var cv = '<li class="srchTagResultsItems form-control solid-bdr" onclick="asdf('+cd+')">Add "'+inputStr+'"</li>';
                srchData = cv+srchData;
            }
            else{
                //alert(8);
            }
            document.getElementById("srchTagResults").innerHTML = srchData;
            document.getElementById("srchTagResults").style.display = "inline-block";
            return false;
        });
    }
    else{
        document.getElementById("srchTagResults").style.display = "none";
   }
});
function asdf(x){
    var s = '<span class="form-control z">'+x+'<span class="fa fa-times deleteThis" title="Remove Tag" onclick="tagsPop(this.parentNode.innerText);this.parentNode.remove();"></span></span>';
    $('.tags').append(s);
        tags.push(x);
        //refreshWidth();
        document.getElementById("post-tags").value = '';
        document.getElementById("srchTagResults").innerHTML = '';
        document.getElementById("srchTagResults").style.display = "none";
}
function deleteTag(){
    alert('lol');
}
function refreshWidth(){
     var w = $(".tags").width();
        $("#post-tags").css('width',670-w-0.06);
        $("#srchTagResults").css('width',670-w-0.06);
        $("#srchTagResults").css('left',w);
        $("#post-tags").focus();
}
function tagsPop(z){
    tags.pop(z);
}
</script>
