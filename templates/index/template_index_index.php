<style type="text/css">
.textBox{
    max-width: 100%;
    height: 100%
}
.itemsContainer{
    
}
.homeSlideshow{
    width: 100%;
    height: 600px;
}
.intro-slides{
    width: 100%;
    height: 100%;
    border: none;
}
.strip{
    margin: 0;
}.boxStrip.boxStripAddInfo,.boxStripInfo{}

</style>
<h1 class="main-title color-1">Recently Created</h1>
<div class="related" style="margin-top:20px;">
<ul class="items itemsContainer shadow">
<?php $i=count($TopViewsPosts);?>
        <?php if($TopViewsPosts) : for($col=0; $col < count($TopViewsPosts); $col++) { ?>
            <li class="strip shadow" style="left:0; top:0; position:absolute; width:400px; height:300px;">
                    <div class="boxStrip">
                    <div class="boxStripMedia">

                    <a href="<?php echo DOCROOT; ?>slide/<?php echo $TopViewsPosts[$col]['id'].'/'.$TopViewsPosts[$col]['slug']; ?>">
                    <img src="<?php echo $TopViewsPosts[$col]['image'];?>" width="100%" height="100%">
                    <?php // echo $thisRow['content'];?>
                    </a>
                    </div>
                    <div class="boxStripInfo">
                    <div class="boxStripTitle">
                        <a href="<?php echo DOCROOT; ?>slide/<?php echo $TopViewsPosts[$col]['id'].'/'.$TopViewsPosts[$col]['slug']; ?>"><?php echo $TopViewsPosts[$col]['title']; ?></a>
                    </div>
                    <div class="boxStripAddInfo">
                    <?/*
                    <span class="pull-left"><a href="<?php echo DOCROOT;?>user/<?php echo $TopViewsPosts[$col]['submit_by'] ?>" style="color:#A9A9A9;"><strong><?php echo $TopViewsPosts[$col]['submit_by_user']; ?></strong></a></span>
                    */?>
                    <span class="pull-left"><i class="fa fa-clock-o"></i>&nbsp;<?php echo ago($TopViewsPosts[$col]['created']); ?></span><span class="pull-right"><i class="fa fa-eye"></i>&nbsp;<?php echo $TopViewsPosts[$col]['total_views'];?></span>
                    
                    <?/*
                    <span class="pull-right" style="color:#A9A9A9;"><?php echo $TopViewsPosts[$col]['total_views'].' views ,'.ago($TopViewsPosts[$col]['created']); ?></span>
                    */?>
                    <?php // echo $TopViewsPosts[$col]['total_views'];?>
                    </div>
                    </div>
            </div>
            </li>
            <?php } endif; ?>
</ul>
<div id="lastPostsLoader"></div>
</div>
<script type="text/javascript">
<?php if($i): ?>
var f = <?php echo $i;?>;
<?else: ?>
var f = 0;
<?php endif;?>
$(window).resize(function() {
    Related.initialize();
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
eventHover();
    var page = 2;
    var datax;
    var dataurlx = "<?php echo DOCROOT;?>index.php?page=";
    var didscroll = false;
    $(window).scroll(function(){
        didscroll = true;
    });
    setInterval(function(){
    if(didscroll){
        didscroll = false;
        var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
        var  scrolltrigger = 0.95;
        if  ((wintop/(docheight-winheight)) > scrolltrigger) {
            lastAddedLiveFunc();
        }
    }
},250);
function lastAddedLiveFunc()
    {
        dataurl = dataurlx+page;
        $.get(dataurl, function(data){
        if(datax == data){
        }
        else{
            datax = data;
            if (data!= "") {
                alert(data);
                var a = eval(data);
                var b = JSON.parse(data);
                for (var i = b.length - 1; i >= 0; i--) {
                    var item = '<li class="newItems strip shadow" style="left:0; top:0; position:absolute; width:400px; height:300px;"><div class="boxStrip"><div class="boxStripMedia"><a href="<?php echo DOCROOT; ?>slide/'+b[i]['id']+'/'+b[i]['slug']+'"><img src="'+b[i]['image']+'" width="100%" height="100%"></a></div><div class="boxStripInfo"><div class="boxStripTitle"><a href="<?php echo DOCROOT; ?>slide/'+b[i]['id']+'/'+b[i]['slug']+'">'+b[i]['title']+'</a></div><div class="boxStripAddInfo"><!--span class="pull-left"><a href="<?php echo DOCROOT;?>user/'+b[i]['submit_by']+'" style="color:#A9A9A9;"><strong>'+b[i]['submit_by_user']+'</strong></a></span--><span class="pull-left color-2"><i class="fa fa-clock-o"></i>&nbsp;<span class="slide-time">'+ago(b[i]['created'])+'</span></span><span class="pull-right">&nbsp;'+b[i]['total_views']+'&nbsp;<i class="fa fa-eye"></i></span></div></div></div></li>';
                    $(".items").append(item);
                };
                var e = ".newItems";
                Related.increaseGrid();
                Related.arrangeGrid(e);
                $(".newItems").removeClass('newItems');
                page++;
                eventHover();
            }
        }
    });
};    
function eventHover(){
    $(".boxStrip").hover(function(){
    $(this).find(".boxStripAddInfo").css('visibility','visible');
    var x =  $(this).find(".boxStripAddInfo").css('height');
    $(this).find(".boxStripInfo").css('bottom',x);
    },function()
    {
    $(this).find(".boxStripAddInfo").css('visibility','hidden');
    $(this).find(".boxStripInfo").css('bottom',0);
    });
}
function createLiItem(addr, imgaddr, title){
    var a = document.createElement("li");
    a.setAttribute('class', 'newItems strip shadow');
    a.setAttribute('style','left:0; top:0; position:absolute; width:400px; height:300px;');
    var b = document.createElement('div');
    b.setAttribute('class', 'boxStrip');
    var c = document.createElement('div');
    c.setAttribute('class', 'boxStripMedia');
    var d = document.createElement('a');
    d.setAttribute('href', addr);
    var e = document.createElement('img');
    e.setAttribute('src', imgaddr);
    e.setAttribute('width', '100%');
    e.setAttribute('height', '100%');
    var f = document.createElement('div');
    f.setAttribute('class', 'boxStripInfo');
    var g = document.createElement('div');
    g.setAttribute('class', 'boxStripTitle');
    var h = document.createTextNode(title);
}
function ago(time)
    {
    var periods = ["second", "minute", "hour", "day", "week", "month", "year", "decade"];
    var lengths = ["60","60","24","7","4.35","12","10"];
    var time = Math.round(time);
    var now = Math.round(+new Date()/1000);
    var difference     = now - time;
    var tense         = "ago";
    for(var j = 0; difference >= lengths[j] && j < lengths.length-1; j++) {
       difference /= lengths[j];
    }
    difference = Math.round(difference);
    if(difference != 1) {
       periods[j]+= "s";
    }
    return difference+' '+periods[j];
}
</script>
