$(function() {

    //导航菜单
    $(".button-collapse").sideNav();

    //按钮点击给body赋id
    $('body').attr('atr', 'momo');

    $('#sitemapBtn').click(function() {
        if($('body').attr('id') != 'open') {
            $('body').attr('id', 'open');
            $('#gnav .anchor').css({
                color: '#fff'
            })
            $('#logo_head').attr('src', '/img/logo-white.png');
        } else {
            var $href = window.location.hash;
            $('body').removeAttr('id');
            if($href.indexOf('page1') != 1) {
                $('#gnav .anchor').each(function(index, el) {
                    if($('#gnav .anchor').eq(index).attr('active') != 'anchor') {
                        $(this).css({
                            color: '#fff'
                        })
                    }

                });
                $('#logo_head').attr('src', '/img/logo.png');
            }
        }
    });

});
$(function() {
    var loc_currenturl = window.location.href;
    var currenturl = loc_currenturl.substring(loc_currenturl.lastIndexOf('/') + 1);
    $(".gnav>ul>li>a").each(function() {
        var link_b = $(this).attr("href");
        var link_sb = link_b.substring(link_b.lastIndexOf('/') + 1);
        if(currenturl == link_sb) {
            $(this).addClass("hover");
            $(this).parent().addClass("hover");
        }
    });

    $(".tab>ul>li>a").each(function() {
        var link_a = $(this).attr("href");
        var link_sa = link_a.substring(link_a.lastIndexOf('/') + 1);
        if(currenturl == link_sa) {
            $(this).parent().addClass("hover");
        }
    });

    $("#mobile-demo>li>a").each(function() {
        var link_a = $(this).attr("href");
        var link_sa = link_a.substring(link_a.lastIndexOf('/') + 1);
        if(currenturl == link_sa) {
            $(this).parent().addClass("hover");
        }
    });
})

//内页宽度
$(function() {
    var ww = $(window).width();
    var menu = $("#header").width();
    var box= ww - menu - 30;
    if(ww>992){
        $(".box").width(box);
    }
})

//语言切换
$(function () {
    $(".select_show").click(function(){
        $(this).find("i").toggleClass("jt");
        $(".select_hide").slideToggle();
    })
})

//手机端导航
$(function(){
    $(".button-collapse").click(function(){
        $(this).toggleClass("active");
    })
    $(".drag-target").click(function(){
        $("body").find(".ph_menu").children("a").removeClass("active");
    })
    $("#mobile-demo li").click(function(){
        $(this).find(".ph_xl").addClass("xx").parent().siblings().find(".ph_xl").removeClass("xx");
        $(this).children(".menuList").slideToggle().parent().siblings().children(".menuList").slideUp();
    })
})

$(function() {
    $(".sitelink2 li").click(function() {
        $(this).addClass("action").siblings().removeClass("action");
        var index = $(this).index();
        $(".sitelink1 li").eq(index).css("display", "block").siblings().css("display", "none");
    });
});

//让菜单的宽度根据子类撑开
var $nav = $('.list');

//导航滑过滑出事件
$nav.mouseover(function(event) {
    var $navLis = $(this).find('.menuList');
    var $navClass = $navLis.find('li');
    var $navLisw = $navClass.outerWidth() * $navClass.length + 10;
    $(this).find('.menuList').width($navLisw);

    for(var i = 0; i < $navClass.length; i++) {
        $navClass.eq(0).stop().animate({
            right: 0
        }, 100)
        $navClass.eq(1).stop().animate({
            right: 150
        }, 100)
        $navClass.eq(2).stop().animate({
            right: 0,
            top:150
        }, 100)
        $navClass.eq(3).stop().animate({
            right: 150,
            top:150
        }, 100)
        $navClass.eq(4).stop().animate({
            right: 0,
            top:300
        }, 100)
        $navClass.find('.content').css({
            opacity: 1
        })
    }
});
$nav.mouseout(function(event) {
    var $navLis = $(this).find('.menuList');
    var $navClass = $navLis.find('li');
    $(this).find('.menuList').width(0);
    $navClass.css({
        right: 0
    })
    $navClass.find('.content').css({
        opacity: 0
    })
});

$(function() {
    $("#wx").hover(function() {
        $(".index8_ewmhide").toggle();
    });
    $("#con_wx").hover(function() {
        $(".ewmhide").toggle();
    });
});
$(function() {
    $('.nextpage').on('click', function () {
        $.fn.fullpage.moveSectionDown();
    });
    $('.index_return').on('click', function () {
        $.fn.fullpage.moveTo(1,1)
    });
});
$(function() {
    $(".aside_phone").hover(function(){
        $(this).addClass("w200");
        $(this).children("span").stop().animate({
            left:50
        },1000)
    },function(){
        $(this).removeClass("w200");
        $(this).children("span").stop().animate({
            left:-200
        },1000)
    })
    $(".aside_qq").hover(function(){
        $(this).addClass("w200");
        $(this).children("span").stop().animate({
            left:50
        },1000)
    },function(){
        $(this).removeClass("w200");
        $(this).children("span").stop().animate({
            left:-200
        },1000)
    })
    $(".aside_ewm").hover(function(){
        $(".aside_hide").stop().animate({
            left:70
        },1000)
    },function(){
        $(".aside_hide").stop().animate({
            left:-200
        },1000)
    });
});
function b(){
    h = $(window).height();
    t = $(document).scrollTop();
    if(t > h){
        $(".return").fadeIn(1000);
    }else{
        $(".return").fadeOut(1000);
    }
}
$(document).ready(function(e) {
    b();
    $(".return").click(function(){
        $('html,body').animate({scrollTop: '0px'}, 1000);
    });
});
$(window).scroll(function(e){
    b();
});