$(function(){
	$(".first-list").mouseover(function(){
		$(this).addClass("active").children("ul").show();
	});
	$(".first-list").mouseout(function(){
		$(this).removeClass("active").children("ul").hide();
	});
})
//轮播
$(function(){
    var i=0;
    var big_banner_pic = $("#big_banner_pic");
    var allimg=$("#big_banner_pic li").length;
    function img_change(){
        var img_i=i*-1200+"px";
        big_banner_pic.animate({opacity:".2"},100,function(){
            big_banner_pic.css("left",img_i );
            big_banner_pic.animate({
                opacity: "1"
            }, 100);
        })
    }
    function automatic(){
        i+=1;
        if(i>=allimg){
            i=0;
        }
        img_change();
    }
    change_self_time = setInterval(automatic, 3000);
    //轮播上一张下一张图标控制
    $("#big_banner_change_wrap").hover(function(){
        clearInterval(change_self_time);
        $("#big_banner_change_wrap").children().show();
    },function(){
        change_self_time = setInterval(automatic, 3000);
        $("#big_banner_change_wrap").children().hide();
    })
    $("#big_banner_change_prev").click(function(){
        i += 1;
        if (i >= allimg) {
            i = 0;
        }
        img_change();
    })
    $("#big_banner_change_next").click(function(){
        i -= 1;
        if (i <=0) {
            i = allimg-1;
        }
        img_change();
    })
    
})
