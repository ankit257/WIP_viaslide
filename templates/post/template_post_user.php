<?//$postList?>
<div class="row">
    <div class="user-info-header col-xs-12 col-md-12 col-lg-12">
    <h5>
    <a class="color-1" href="<?php echo DOCROOT.'user/'.$postdata['main']['submit_by'];?>">
        <?php if($postdata['main']['user_image']):?>
                <span class="user-pic"><img class="" width="50" height="50" src="<?php echo DOCROOT.$userInfo[0]['image'];?>"></span>
        <?php else:?>
                <span class="user-pic-2"><i class="fa fa-user fa-2x"></i></span>
        <?php endif;?>
        <span class="user-info-header-title"><?php echo $userInfo[0]['first_name'];?></span></a>
        </h5>
    </div>
    <div class="clear-1"></div>
    <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="userPosts related">
        <ul class="items itemsContainer shadow">
            <?php if($postList) : for($i=0; $i < count($postList); $i++) { ?>
                <li class="strip shadow" style="width:400px; height:300px; position:absolute;">
                <?php
                    if($_SESSION['LoggedUser']['id']==$postList[$i]['submit_by']){
                        echo '<div class="fa fa-edit edit-this" title="Edit" onclick="edit('.$postList[$i]['id'].')"></div>';
                    }
                ?>
                <div class="boxStrip">
                    <div class="boxStripMedia">
                        <a href="<?php echo DOCROOT; ?>slide/<?php echo $postList[$i]['id'].'/'.$postList[$i]['slug']; ?>">
                            <img src="<?php echo DOCROOT.$postList[$i]['image'];?>" width="100%" height="100%">
                        </a>
                    </div>
                    <div class="boxStripInfo">
                        <div class="boxStripTitle">
                            <a href="<?php echo DOCROOT; ?>slide/<?php echo $postList[$i]['id'].'/'.$postList[$i]['slug']; ?>"><?php echo $postList[$i]['title']; ?></a>
                        </div>
                        <div class="boxStripAddInfo">
                        <span class="pull-left"><i class="fa fa-clock-o"></i>&nbsp;<?php echo ago($postList[$i]['created']); ?></span><span class="pull-right"><i class="fa fa-eye"></i>&nbsp;<?php echo $postList[$i]['total_views'];?></span>
                            <?/*
                            <small class="pull-left"><a href="<?php echo DOCROOT;?>user/<?php echo $postList[$i]['submit_by'] ?>" style="color:#A9A9A9;"><strong><?php echo $postdata['related'][$i]['submit_by_user']; ?></strong></a></small>
                            <small class="pull-right" style="color:#A9A9A9;"><em><?php echo $postList[$i]['total_views'].' views ,'.ago($postList[$i]['created']); ?></em></small>
                            
                            */?>
                        </div>
                    </div>
                </div>
            </li>
            <?php } endif; ?>
        </ul>
    </div>
    </div>
    
</div>
<style type="text/css">
.user-pic-2{
    height: 34px;
    width: 34px;
}
.color-1:hover{
    color: rgba(88,88,88,0.8);
}
    .edit-this{
        color:  rgba(200,200,200,0.8);
        margin: 10px;
        padding: 10px;
        cursor: pointer;
        position: absolute;
        right: 0;
        top: 0;
        background: rgba(34,34,34,0.7);
        padding: 6px;
        font-weight: 300;
        font-size: 16px;
        opacity: 0;
    }
    .edit-this{
        

    }
    .strip:hover .edit-this{
        opacity: 1;
        z-index: 9;
        transition: 0.5s ease-in-out;
    }
</style>
<script>
    //setInterval(function(){alert("Hello")},3000);
</script>

<script type="text/javascript">
<?php if($i): ?>
var f = <?php echo $i;?>;
<?else: ?>
var f = 0;
<?php endif;?>
var f = 1000;
$(window).resize(function() {
    var x = 787;
    Related.initialize(x);
});

$(".strip").hover(function(){
        //$(this).find(".edit-this").removeClass('hidden');
        $(this).find(".boxStripAddInfo").css('visibility','visible');
        var x =  $(this).find(".boxStripAddInfo").css('height');
        $(this).find(".boxStripInfo").css('bottom',x);
    },function()
    {   
        //$(this).find(".edit-this").addClass('hidden');
        $(this).find(".boxStripAddInfo").css('visibility','hidden');
        $(this).find(".boxStripInfo").css('bottom',0);
    });
    
    
var Related = (function(){
    var k, fg, fw, fh, grid, gridIn;
    'use strict'
    var l = 2*(f+1);
    function getk(s){
        if(s > 1400){
            k = 8;
        }
        else if( s >= 1000 && s <=1400){
            k=6;
        }
        else if(s<1000 && s>=800){
            k=5;
        }
        else if(s<800 && s>=600){
            k=3;
        }
        else if(s<600 && s>=300){
            k=2;
        }
        else{
            k=1;
        }
        return k;   
    }
    function initialize(){
        var s = $(".related").width();
        k = getk(s);
        fw = (s-((k-1)*8))/k;
        fh = Math.floor(fw*(3/4));
        //grid = makeGrid();
        makeGrid();
        var cx = ".items li";
        arrangeGrid(cx);
    }
    function makeGrid(){
            grid = new Array(k);
            for (i=0; i<l; i++){
                grid[i] = new Array(k); 
            };
            for (i = 0 ; i<l; i++) {
                    for (j = 0; j < k; j++) {
                    grid[i][j] = 0;
                };
            };
    }
    function increaseGrid(){
        var a;
        if(grid.length){
            a = grid.length;
        }else{
            a = 1;
        }
        for (var i = a-1; i < a+50; i++) {
            grid.push([]);
            for (var j = 0; j < k; j++) {
                grid[i].push(0);
            };
        };
    }
    function cssTransform(){    
        var prop = ['WebkitTransform','MozTransform','msTransform','OTransform','transform'];
        for (var i = prop.length - 1; i >= 0; i--) {
            if(prop[i] in document.body.style){
                return prop[i];
            }
        };   
    }
    function countItems(){
        var d = 1;
        $( ".items li" ).each(function(e) {
            d++; 
        });
        return d;
    }
    function arrangeGrid(newItems){
        var newItems = newItems;
        var maxH=0;
        $('.a').removeClass('a');
        $('.b').removeClass('b');
        var cst = cssTransform();
        $(newItems).each(function( index ) {
            var fr = Math.floor((Math.random()*k) + 1);
            if(fr<=3){
                var c = placement(0);
                $(this).css(cst, 'translate3d('+c.x+'px,'+c.y+'px,'+0+'px)');
                //$(this).css("left",c.x);
                //$(this).css("top",c.y);
                $(this).css("height",fh);
                $(this).css("width",fw);
                $(this).addClass('b');
                if(maxH<(c.y+fh)){
                    maxH = c.y+fh;
                }
            }
            else if(fr>3){
                var c = placement(1);
                $(this).css(cst, 'translate3d('+c.x+'px,'+c.y+'px,'+0+'px)');
                //$(this).css("left",c.x);
                //$(this).css("top",c.y);
                $(this).css("height",2*fh+8);
                $(this).css("width",2*fw+8);
                $(this).addClass('a');
                if(maxH<(c.y+2*fh+8)){
                    maxH = c.y+2*fh+8;
                }
                
            }
            maxH = maxH;
            $(".itemsContainer").css('height',maxH);
        });   
    }
    function placement(a){
        var grid_item_h = fh, grid_item_w = fw;
        var gl = grid.length;
        asd:
        switch(a){
            case 0:
            for (i = 0 ; i < gl; i++){
                for (j = 0; j < k; j++) {
                    if(i<gl && j<k){
                        
                     if(grid[i][j] == 0){
                        var x = j*(grid_item_w+8);
                        var y = i*(grid_item_h+8);
                        grid[i][j] = 1;
                        break asd;
                        }
                    }
                };
            };
            break;
            case 1:
            for (i = 0 ; i <gl-1; i++) {
                for (j = 0; j < k-1; j++) {
                    if(i<gl-1 && j<k-1){
                     if(grid[i][j] == 0 && grid[i+1][j] == 0 && grid[i][j+1] == 0 && grid[i+1][j+1] == 0){
                        var x = j*(grid_item_w+8);
                        var y = i*(grid_item_h+8);
                        grid[i][j] = 1;
                        grid[i+1][j] = 1;
                        grid[i][j+1] = 1;
                        grid[i+1][j+1] = 1;
                        break asd;
                        }
                    } 
                };
            };
            break;
            case 2:
            for (i = 0 ; i <gl; i++) {
                for (j = 0; j < k; j++) {
                    if(i<gl && j<k){
                     if(grid[i][j] == 0 && grid[i][j+1] == 0){
                        var y = j*grid_item_h;
                        var x = i*grid_item_w;
                        grid[i][j] = 1;
                        grid[i][j+1] = 1;
                        break asd;
                        } 
                    }
                };
            };
        };
        return({x:x, y:y});
    };
    return{
        initialize:initialize,
        getk: getk,
        placement: placement,
        arrangeGrid: arrangeGrid,
        increaseGrid: increaseGrid,
    };
})();
Related.initialize();
</script>
<script type="text/javascript">
    var page = 2;
    var datax;
    var dataurl = "<?php echo DOCROOT;?>index.php?route=post/userlisting&user_id=<?php echo $_SESSION['LoggedUser']['id'];?>&page="+page;
    //var dataurl = "<?php echo DOCROOT;?>index.php?route=post/getrelatedposts&post=<?php echo $postdata['main']['id'];?>&page="+page;    
    $(window).scroll(function(){
        var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
        var  scrolltrigger = 0.95;
        if  ((wintop/(docheight-winheight)) > scrolltrigger) {
            lastAddedLiveFunc(dataurl);
        }$(".strip").hover(function(){
        $(this).find(".edit-this").removeClass('hidden');
        $(this).find(".boxStripAddInfo").css('visibility','visible');
        var x =  $(this).find(".boxStripAddInfo").css('height');
        $(this).find(".boxStripInfo").css('bottom',x);
    },function()
    {   
        $(this).find(".edit-this").addClass('hidden');
        $(this).find(".boxStripAddInfo").css('visibility','hidden');
        $(this).find(".boxStripInfo").css('bottom',0);
    });
});
function lastAddedLiveFunc(dataurl)
    {
        $.get(dataurl, function(data){
            if(datax == data){
            }
            else{
            datax = data;
            if (data != "") {
                page = page+1;
                var a = eval(data);
                var b = JSON.parse(data);
                for (var i = b.length - 1; i >= 0; i--) {
                    var item = '<li class="newItems strip shadow" style="left:0; top:0; position:absolute; width:400px; height:300px;"><div class="boxStrip"><div class="boxStripMedia"><a href="<?php echo DOCROOT; ?>slide/'+b[i]['id']+'/'+b[i]['slug']+'"><img src="'+b[i]['image']+'" width="100%" height="100%"></a></div><div class="boxStripInfo"><div class="boxStripTitle"><a href="<?php echo DOCROOT; ?>slide/'+b[i]['id']+'/'+b[i]['slug']+'">'+b[i]['title']+'</a></div><div class="boxStripAddInfo"><!--span class="pull-left"><a href="<?php echo DOCROOT;?>user/'+b[i]['submit_by']+'" style="color:#A9A9A9;"><strong>'+b[i]['submit_by_user']+'</strong></a></span--><span class="pull-left" style="color:#A9A9A9;"><i class="fa fa-clock-o"></i>&nbsp;<span class="slide-time">'+b[i]['created']+'</span></span><span class="pull-right">'+b[i]['total_views']+'&nbsp;<i class="fa fa-eye"></i></span></div></div></div></li>';
                    $(".items").append(item);
                };
                var e = ".newItems";
                Related.arrangeGrid(e);
                $(".newItems").removeClass('newItems');
            }
        }
        return false;
    });
};    
function edit(e){
    var url = '<?php echo DOCROOT;?>edit/'+e+'/';
    //alert(url);
    location.href = url;
}
</script>