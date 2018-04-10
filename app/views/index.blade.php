<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=750,user-scalable=no">-->
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" name="viewport">
    <meta http-equiv="x-ua-compatible" content="IE=Edge">
    <title>志邦厨柜，男人下厨节</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jquery.fullPage.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/media.css?v1">
    <script type="text/javascript">
        // $("#vid1")[0].play();

        document.addEventListener("WeixinJSBridgeReady", function () {

            audioAutoPlay();
            //给个全局函数
            audioAutoStop();
            //audio.play();
            LoadingAudioPlay();



        }, false);



        function LoadingAudioPlay(){//加载页音频播放
            var loadingAudio = document.getElementById("mp3Btn1");
            loadingAudio.play();
        }

        function audioAutoPlay(){//全局控制播放}函数
            // $("#videoBox").html('<video class="video-js" autoplay="true" preload="auto" id="video" playsinline webkit-playsinline="true" x5-video-player-type="h5" x5-video-player-fullscreen="false"> <source id="videoSource" src="video/movie30s.mp4" type="video/mp4"> </video>');
            var audio = document.getElementById("video"),
            // document.getElementById("mp3Btn1").pause();
                    play = function(){
                        audio.play();
                    };
            audio.play();
            setTimeout(function(){
				document.getElementById("video").style.display = "block";
			}, 500)

        }
        function audioAutoStop(){//全局控制播放函数
            var audio = document.getElementById("video"),
                    pause = function(){
                        audio.pause();
                    };
            audio.pause();
        }
        //var audio =document.getElementsByTagName("audio")[0];

    </script>
  <!-- <script>
        function audioAutoPlay(id){
            var audio = document.getElementById(id);
            audio.play();
            document.addEventListener("WeixinJSBridgeReady", function () {
                audio.play();
            }, false);
            document.addEventListener('YixinJSBridgeReady', function() {
                audio.play();
            }, false);
        }
        audioAutoPlay('mp3Btn');
    </script>
-->

</head>
<body>
<div style="display:none;"><img src="img/fen.jpg" style="width:310px;height:310px"></div>
<div class="audio" style="background:url(img/music.png) no-repeat center;background-size:cover;">
    <!-- <audio id="mp3Btn" autoplay="autoplay" loop>
        <source src="video/music.mp3" type="audio/mpeg" />
    </audio> -->
</div>
<div id="load" class="load">
        <div class="w100 mail-box">
            <div class="mail">
                <img src="img/mail.png" class="mail1">
                <img src="img/mail.png" class="mail2">
                <img src="img/mail.png" class="mail3">
                <img src="img/mail.png" class="mail4">
            </div>
        </div>
        <div class="bottm-img"><img src="img/bgimg.png"></div>

        <div id="audio1" class="audio1 move1" style="background:url(img/music.png) no-repeat center;background-size:cover;z-index: 1000">
     <audio id="mp3Btn1" autoplay="autoplay" loop>
        <source src="video/music.mp3" type="audio/mpeg" />
     </audio>
   </div>
</div>
<div id="fullpage" style="display:none;">
    <div class="section">
        <div class="home">
            <img src="img/font.png" class="word">
            <div class="play">
                <div id="videoBox" class="video">
                    <!--<video class="video-js" autoplay="true" preload="auto" id="video" playsinline webkit-playsinline="true" x5-video-player-type="h5" x5-video-player-fullscreen="false" x5-playsinline="" playsinline="" webkit-playsinline="" poster=""> <source src="video/movie30s.mp4" type="video/mp4"> </video>-->

 <video style="display:none;" class="video-js" autoplay="true" preload="auto" id="video" playsinline webkit-playsinline="true" x5-playsinline="" playsinline="" webkit-playsinline="" poster=""> <source src="video/movie30s.mp4" type="video/mp4"> </video>
                </div>
            </div>
            <div class="click">
                <img src="img/play.png">
            </div>
            <div class="hover">
                <div>
                    <p>上滑制作老照片</p>
                    <img src="img/more.png">
                </div>
            </div>
        </div>
    </div>
    

<div id="touch-section2" class="section section2" style="background:url(img/bg3.jpg) no-repeat center;background-size:cover;">
        <div class="logo">
            <img src="img/logo_yellow.png" class="w100">
        </div>
        <div class="content">
            <div class="photo">
                <div id="img-box" class="font clearfix">
                    <div id="targetDiv" style="display:none">
                        <canvas id="target"></canvas>
                        <canvas id="initCanvas"></canvas>
                    </div>
                    <div id="images" style="display:none;">
                    </div>
                    <div id="mengpi" style="display:none;">
                        <img id="mengpi1" src="img/mengpi3/1.png"/>
                        <img id="mengpi2" src="img/mengpi3/2.png"/>
                        <img id="mengpi3" src="img/mengpi3/3.png"/>
                        <img id="mengpi4" src="img/mengpi3/4.png"/>
                        <img id="mengpi5" src="img/mengpi3/5.png"/>
                    </div>
                    <!-- <img src="img/write.png" id="uplos" class="img-box"/> -->
                    <img src="img/man2.png" id="uplos" class="img-box"/>
                    <canvas id="drawConvas1" style="display:none;"></canvas>
                      <div class="pan-img" id="pan-img">
                           <i class="fa-pan"><img src="img/dot.png"></i>
                    </div>
                     <p class="img-title"><img id="sync" src="img/fangt.png"/></p>
                </div>
                <div class="love-lan"><img src="img/img.png"/></div>
            </div>
            <form onsubmit="return false">
                <input type="text" id="write" placeholder="点击输入情话">
                <img src="img/circle.png">
            </form>
            <div id="change" class="change">
                <img src="img/hand1.png">
            </div>
        </div>
        <a href="javascript:;" class="upload">
            <img src="img/upload.png" class="w100">
            <input name="uploadimg" onchange="previewImage(this,'uplos')" class="file-img" type="file"/>
        </a>
        <div class="hover">
            <div>
                <!-- <button id="tabMengpi-button">切换</button> -->
                <p>上滑一键生成</p>
                <img src="img/more.png">
            </div>
        </div>
    </div>


    <div class="section" style="background:url(img/bg3.jpg) no-repeat top center;background-size:cover;">
        <div class="bg_top">
            <div class="print_picture">
                <img src="img/bg_top.png">
            </div>
            <div id="printLastPhotoBox" class="print">
                <img id="printLastPhoto" src="img/print.jpg">
            </div>
        </div>
        <a href="javascript:;" class="upload"><img  src="img/again.png" class="w100 play-agin"></a>
        <div class="hover">
            <div>
                <p>上滑有惊喜</p>
                <img src="img/more.png">
            </div>
        </div>
        <div class="keep">
            <img src="img/keep.png" class="w100">
        </div>
    </div>
    <div class="section form" action="/form" style="background:url(img/bg4.jpg) no-repeat top center;background-size:cover;">
       <!-- <img src="img/picture1.png" class="picture1 w100">-->
        <div class="activity">
            <img src="img/picture2.png" class="w100">
            <img src="img/picture3.png" class="picture2">
        </div>


            <div class="bd">
                <h2>请您填写以下信息便于工作人员与您联系</h2>
                <div>
                    <label>姓名:</label>
                    <input name="realname" type="text">
                </div>
                <div>
                    <label>手机:</label>
                    <input name="phone" type="text">
                </div>
                <div>
                    <label>省份:</label>
                    <select class="province" name="province"></select>
                </div>
                <div>
                    <label>城市:</label>
                    <select class="city" name="city"></select>
                </div>
            </div>
            <!-- <div id="UpAndGet" class="hover">
                <div>
                    <button id="tabMengpi-button">切换</button>
                    <p>上滑领取</p>
                    <img src="img/more.png">
                </div>
            </div> -->
            <div id="UpAndGet" class="get model">
                <img src="img/get.png">
            </div>

        <!-- <div class="bd">
            <h2>请您填写以下信息便于工作人员与您联系</h2>
            <form>
                <div>
                    <label>姓名:</label>
                    <input type="text">
                </div>
                <div>
                    <label>手机:</label>
                    <input type="text">
                </div>
                <div>
                    <label>省份:</label>
                    <select class="province" name="province"></select>
                </div>
                <div>
                    <label>城市:</label>
                    <select class="city" name="city"></select>
                </div>
            </form>
        </div>
        <div class="get">
            <img src="img/get.png">
        </div> -->
        <div class="confirm">
            <img src="img/confirm.png">
        </div>
        <!--活动详情弹框-->
        <div class="rule-box">
            <div class="wrap-box">
                <h3 class="rule-title"><img src="img/txt-logo.png"/></h3>
                <div class="rule-text">
                    <!-- <img class="rule-bg" src="img/txt-bg.png"/> -->
                    <img class="rule-bg" src="img/txt.png"/>
                    <div class="rule-wrap">
                        <div class="rotate-div">
                            <a href="javascript:;" class="rule-close"><img src="img/txt-close.png"/></a>
                            <h4 style="display:none;">规则详情</h4>
                            <div class="txt-content" style="display:none;">
                                <p style="line-height:3;">1、用户填写信息，点击确认即可参与本次活动。</p>
                                <p style="line-height:2.2;">2、参与本次活动的用户在2018年3月30日前签单有效。</p>
                                <p style="line-height:3;">3、促销活动详情请已店面政策为准</p>
                                <p>4、福利设置</p>
                                <p style="font-size:.22rem;color:#0a0d18;">3000元福利券，内容包含：</p>
                                <p style="font-size:.22rem;color:#0a0d18;">A.1000元水槽抵用券</p>
                                <p style="font-size:.22rem;color:#0a0d18;">（可用于正价购买：200201+LG001，SG784804+LT006）</p>
                                <p style="font-size:.22rem;color:#0a0d18;">B.1000元收纳抵用券</p>
                                <p style="font-size:.22rem;color:#0a0d18;">（可用于正价购买：灵便收纳、魔方收纳、Blum百隆阻尼抽屉）</p>
                                <p style="font-size:.22rem;color:#0a0d18;">C.1000元电器抵用券</p>
                                <p style="font-size:.22rem;color:#0a0d18;">（可用于正价购买：彩屏蒸箱DZX-B35L02黑白两色，彩屏烤箱KWS-B32L01黑白两色，保温抽BW-B16101黑白两色）</p>
                                <p style="line-height:3.4;">5、使用时出示福利券截图，用于购买指定款增选设备。</p>
                                <p>6、福利券不叠加，不找零，每个微信账号及手机号仅限领取一次福利。</p>
                                <p style="line-height:3.6;">7、活动时间：2月26日-3月25日</p>
                                <p>8、本次活动最终解释权归志邦厨柜股份有限公司所有。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg"></div>
    </div>
    <div id="touch-section5" class="section" style="background:url(img/bg5.jpg) no-repeat top center;background-size:cover;">
        <div class="top">
            <img src="img/logo_red.png">
            <img src="img/success.png">
        </div>
        <!-- <div class="picture">

        </div> -->
       <div class="operation">
            <div class="clearfix">
                <div class="hover">
                    <div>
                        <!-- <button id="tabMengpi-button">切换</button> -->
                        <p>上滑了解活动详情</p>
                        <img src="img/more.png">
                    </div>
                </div>
                <!--1<img src="img/share.png" class="picture3 fl">-->
                 <!-- 2<a href="http://vip1.zbom.com"><img src="img/detail.png" class="picture4"></a> -->
            </div>
        </div>
        <div class="picture">
               <img src="img/picture7.png" class="picture-bg"/>
           <img id="lastImage" src="img/2017.jpg" class="picture-img"/>
        </div>
       <div class="operation" style="text-align: center;">
            <!-- <a href="http://vip1.zbom.com">-->
                <div class="clearfix">
                    <!-- <img src="img/detail.png" class="picture4">-->
                </div>
            <!--</a>-->
        </div>
        <div class="share">
            <img src="img/picture5.png">
        </div>
        <div class="guide">
            <img src="img/picture6.png">
        </div>
        <div class="bg"></div>
    </div>
    <canvas id="maskcanvas"></canvas>
    <img style="position:absolute;opacity:0;top:0;" id="oldpicmask" src="img/oldpic.png" />
    <img style="position:absolute;opacity:0;top:0;" id="oldguangmask" src="img/louguang.jpg" />

</div>
</body>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/wow.js"></script>
<script type="text/javascript" src="js/jquery.fullPage.min.js"></script>
<script type="text/javascript" src="js/carts.js"></script>
<script>
    /* 加载loding*/
    $(document).ready(
            function(){
                // var audio = document.getElementById('mp3Btn');
                // $(".audio").addClass("move");
                //audio.play();//播放




                /* $.fn.fullpage.moveSectionDown();*/
            }
    );

    var pic = new Image()
    pic.src = 'img/bg1.jpg'
    pic.onload = pic.onreadystatechange = function(){
        if(!this.readyState||this.readyState=='loaded'||this.readyState=='complete'){
            $(".load").delay(5000).fadeOut(500);
            $(".home").delay(5500).fadeIn(3000);

            // $('#load').css('background-image', 'url(img/bg1.jpg)');
            setTimeout(audioAutoPlay,5000);

            document.getElementById("fullpage").style.display = "block";
            document.getElementById("videoBox").style.display = "block";


        }
    };

    var fullpageCount = 0;
    var fullpageCount2 = 0;
    var fullpageCount3 = 0;

    var sign = false;

    document.getElementById("UpAndGet").onclick = function(){
        sign = true;
    }

    $(document).ready(function() {
        $('#fullpage').fullpage({
            //字体是否随着页面缩放而缩放，默认值为false
            resize:true,
            verticalCentered:false,
            //滚动速度,默认为700  单位ms
            scrollingSpeed:700,
            /*、定义锚链接，默认值为[]。有了锚链接用户可以快速打开定位到某一页面。定义锚链接的时候，值不要和页面中任意的id或name相同，尤其在IE浏览器下。而且定义时不需要加#*/
            anchors:['page1','page2','page3','page4','page5','page6'],
            onLeave: function(index, nextIndex, direction) {


                if(index ==2 && nextIndex==3 && document.getElementsByClassName("file-img")[0].value == ""){
                    fullpageCount++;
                    if (fullpageCount%2==1) {

                        alert("请上传图片");
                    }
                    return false;
                } else if(nextIndex==5) {
                    // if (document.getElementById("UpAndGet").style.display == "block") {
                    if (sign) {
                        return true;
                    } else {
                        return model(document.getElementById("UpAndGet"));
                    }

                } else if(false && nextIndex==5) {
                    if ($(".confirm").css("display") == "block") {
                        fullpageCount2++;
                    }
                    fullpageCount2++;

                    // fullpageCount2 = fullpageCount2-fullpageCount3;
                    if (fullpageCount2%2==1) {

                        $(".bg").show();
                        $(".confirm").show();

                        $('.confirm img').click(function(e){
                            $(".bg").hide();
                            $(".confirm").hide();
                            fullpageCount3++;
                            // $.fn.fullpage.moveSectionDown();
                        })

                        // return model(document.getElementById("UpAndGet"));
                        /*if ($(".confirm").css("display") == "block") {
                            return true;
                        } else {
                            return false;
                        }*/
                        return false;
                    }

                }
            },
            afterLoad: function(anchorLink, index) {

                // $.fn.fullpage.moveTo(3);
                if (index == 1) {
                    // var audio = $("#mp3Btn")[0];
                    var audio1 = $("#mp3Btn1")[0];
                    var video=$("#video")[0];
                    // audio.pause();
                    setTimeout(myFunction1, 5000)
                    function myFunction1() {
                        audio1.pause();
                    }
                    $(".audio").removeClass("move");
                    $(".audio").delay(5000).fadeIn();
                    // $('.audio').css("background","url(播放状态按钮) no-repeat center bottom");
                    $('.audio').css("background-size","cover");
                    //video.delay(5000).play();
                }

                if(index == 2){

                    loadedMusicPlay();

                } else {

                    // loadedMusicPause();
                }
				//last page redirect
				if(index == 5) {

                    //window.location.href = "http://vip1.zbom.com";
                } else {
                    $.fn.fullpage.setAllowScrolling(false, 'up');
                }
				
                if(index == 3){

                    loadedMusicPlay();
                    $(".print").css({
                       /* webkitAnimation: 'mymove 5s linear',
                        animation:'mymove 5s linear'*/
                        "top":"-.5rem" ,
                        "transition": "all 2s linear"
                    })
                } else {
                    // loadedMusicPause();

                    $(".print").css({
                        webkitAnimation: '',
                        animation:''
                    })
                }
            },
        });
    });
</script>
<script>
    var w=$(window).width();
    var h=$(window).height();
    $(".load,.home,.bg").width(w);
    $(".load,.home,.bg").height(h);

    $('.confirm img').click(function(e){
        $(".bg").hide();
        $(".confirm").hide();
        $.fn.fullpage.moveSectionDown();
    })

    /*$(".get").click(function () {
        $(".bg").show();
        $(".confirm").show();
    });*/
    /*$('.confirm img').on('click', function (e) {
        $(".bg").hide();
        $(".confirm").hide();
        $.fn.fullpage.moveSectionDown();
    });*/
    /* $(".operation img").on('click', function () {
     $.fn.fullpage.moveSectionDown();
     });*/
    $(".play-agin").on('click', function () {
        // $.fn.fullpage.moveSectionUp();
        $.fn.fullpage.moveTo(2);
        document.getElementById("uplos").src = "img/theman2.jpg";
        document.getElementById("printLastPhoto").src = "img/print.jpg";
        document.getElementById("printLastPhotoBox").top = "-7.5rem";
        document.getElementsByClassName("file-img")[0].value = "";
        loadingTmp();

    });
    $(".picture3").click(function () {
        $(".bg").show();
        $(".share").show();
        $(".guide").show();
    });
    $(".bg").click(function(){
        $(".bg").hide();
        $(".share").hide();
        $(".guide").hide();
        $(".confirm").hide();
    });
    /*点击活动详情*/
    $(".picture2").click(function(){
        $.fn.fullpage.setAllowScrolling(false, 'down');
        $.fn.fullpage.setAllowScrolling(false, 'up');
        $(".rule-box").show();
    });
    $(".rule-close").click(function(){
        $.fn.fullpage.setAllowScrolling(true, 'down');
        $.fn.fullpage.setAllowScrolling(true, 'up');
        $(".rule-box").hide();
    });
</script>
<script>
    //音乐
    var audio = document.getElementById('mp3Btn1');
    $('.audio').click(function(){
        //防止冒泡
        event.stopPropagation();
        if(audio.paused) //如果当前是暂停状态
        {
            /* $(this).removeClass("move");*/
            $(this).addClass("move");
            // $('.audio').css("background","url(播放状态按钮) no-repeat center bottom");
            $('.audio').css("background-size","cover");
            audio.play();//播放
            return;
        }

        //当前是播放状态
        $(this).addClass("move");
        $(this).removeClass("move");
        /* $('.audio').css("background","url(img/music.png) no-repeat center bottom");*/
        $('.audio').css("background-size","cover");
        audio.pause(); //暂停
    });

</script>
<script>
    //视频
    // var videoSource=document.getElementById("videoSource");//获取video对象
    // var s=document.getElementById("sou")
    /*setTimeout("myFunction()", 5000)
    function myFunction() {
        video.play();
    }*/
    $(".click").click(function () {
        var video=document.getElementById("video");//获取video对象
       // video.src="http://ugc-vliveochy.tc.qq.com/vhot2.qqvideo.tc.qq.com/AKtpPk1HVptutSeEuZ6RZdzxiyzO_ESmVEopGFUDiqNQ/p0563shbj8s.mp4?sdtfrom=v1010&guid=88024b7cc46e715e646b3635e104df41&vkey=0A4166956F86D2359068ACF1B32F3AFC07D621079C4913891ED31D34D77064A56B5B8DA71653570B8D3586476EE2E4B678E6A1FF6CAD92CC2630F079A5A7A02C27A0F45F6030E2EE5F47A64B5147521502FA82A1831C8911770D09843230780F6B8D58E9AEEAC2EAC836FED35CF66A7A9ACF3683C6FDC2E9&ocid=2691963052";
        //video.src="video/38man.mp4";
        video.src="video/all.mp4";
        video.play();
    });

    /*滤镜效果*/
    var imgO = document.getElementById("");
</script>
<script language="javascript" defer>
    new PCAS("province","city");
</script>


<script>
    if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
        new WOW().init();
    };
</script>

<script src="js/sdrs.js"></script>
<script src="js/cutimage.js"></script>
<script src="js/fontSi.js?v12"></script>
<script>
    function dom(id){return document.getElementById(id);}
    /*function Qinghua(string){
        var length = string.length;
        if(length<=6){
            dom('font1').innerHTML = string;

            dom('font2').innerHTML= '';
            dom('font3').innerHTML= '';

            // $("#d1").html(string);
        } else if(length<=10){
            var string1 = string.substr(0,6);
            var string2 = string.substr(7,4);
            dom('font1').innerHTML = string1;
            dom('font2').innerHTML = string2;
            dom('font3').innerHTML= '';

        } else {
            var string1 = string.substr(0,6);
            var string2 = string.substr(7,4);
            var string3 = string.substr(11,6);
            dom('font1').innerHTML = string1;

            dom('font2').innerHTML= string2;

            dom('font3').innerHTML= string3;

            // $("#d1").html(string1);
            //$("#d2").html(string2);
            //$("#d3").html(string3);
        }
    }*/
    // 切换情话
    //手动切换
    /*1.爱你这件事
     就像是我的一日三餐

     2.想你的眼，想你的发
     也想你做的菜

     3.早安，午安，晚安都给你
     一辈子都给你

     4.你变老了也很好看
     反正我陪你变老

     5.当初是你
     把我从相亲角拽出来的*/
    var sync = ['','img/sync/sync1.png', 'img/sync/sync2.png', 'img/sync/sync3.png', 'img/sync/sync4.png', 'img/sync/sync5.png'];
    var qinghua = ['爱你这件事 就像是我的一日三餐', '想你的眼，想你的发 也想你做的菜', '早安，午安，晚安都给你 一辈子都给你', '你变老了也很好看 反正我陪你变老', '当初是你 把我从相亲角拽出来的', '你好好过，慢慢来就好 我再快些就是了', '最浪漫的事 就是把你养胖', '你的撒娇 我都承包了', '你喜欢我们的爱情 那我就一直练爱下去', '才不要速食爱情 我给你羹汤', '你过来，好久没摸摸你的头了 乖', '我可能爱上了你的碎碎念 这最不像情话的情话'];
    // var mengpiname = ['', '', '', ''];
    var qhIndex = 0;
    var ljIndex = 1;
    var qhLength = qinghua.length;

    dom('change').onclick = function(){
        dom("write").value = "";

        qhIndex++;
        if (qhIndex == qhLength) {qhIndex=0};

        getImageDrawWord("imageupload-result"+(ljIndex), qinghua[qhIndex])
    }

    //输入切换
    dom("write").onkeyup = function(){
        getImageDrawWord("imageupload-result"+(ljIndex), dom("write").value)
        // Qinghua(dom("write").value);
    }


        //图片上传预览    IE是用了滤镜。
        function previewImage(file,id){
            var img = document.getElementById(id);

            if (file.files && file.files[0]){
                var exts ="jpg,jpeg,gif,png,bmp,JPG,JPEG,GIF,PNG,BMP";
                if (exts.indexOf(lastname(file.value)) < 0) {
                    dialog(3,["请上传JPG、BMP、PNG、GIF格式", "上传格式不正确"],{cancel:"取消"});
                    return;
                };

                var reader = new FileReader();
                reader.onloadend = function(evt){
                    src = evt.target.result


                    var images = document.getElementById("images");

                    images.innerHTML = "";
                    if (document.getElementById("uploadImage")) {
                        document.getElementById("uploadImage").remove();
                    }



            var imageupload = new Image;
            imageupload.src = src;
            imageupload.id = 'uploadImage';
            imageupload.style.opacity = '0';
            imageupload.style.position = 'absolute';
            imageupload.style.top = '0';
            imageupload.style.zIndex="-999";
            document.getElementById("img-box").appendChild(imageupload);




            imageupload.onload = function(){
                $.fn.fullpage.setAllowScrolling(true, 'down');
                // document.getElementById("uplos").src = src;
                //$("#img-box").find('img').remove()

                // setTimeout(function(){


                // var naturalW = uploadImage.naturalWidth;
                // var naturalH = uploadImage.naturalHeight;


                var source = document.getElementById("uploadImage");
                var canvas = document.getElementById("target");

                var images = document.getElementById("images");


                var imgout = new Array(4);
                getimgsize(source.naturalWidth,source.naturalHeight,750,1165,imgout);

                canvas.width = 750;
                canvas.height = 1165;
                /*canvas.width = imgout[2];
                canvas.height = imgout[3];*/

                tempContext = canvas.getContext("2d");


                tempContext.drawImage(source, imgout[0], imgout[1], imgout[2], imgout[3],0,0, canvas.width, canvas.height);
                adjustColor1();
                tempContext.drawImage(document.getElementById("mengpi1"),0,0, canvas.width, canvas.height);
                var image1 = new Image;
                image1.src = canvas.toDataURL('image/jpeg');
                image1.id='imageupload-result1';
                images.appendChild(image1);

                // 初始第一张图
                image1.onload = function(){

                    getImageDrawWord("imageupload-result1", getCurrentQh())

                }
                // 初始第一张图end

                tempContext.drawImage(source, imgout[0], imgout[1], imgout[2], imgout[3],0,0, canvas.width, canvas.height);
                adjustColor2();
                tempContext.drawImage(document.getElementById("mengpi2"),0,0, canvas.width, canvas.height);
                var image2 = new Image;
                image2.src = canvas.toDataURL('image/jpeg');
                image2.id='imageupload-result2';
                images.appendChild(image2);

                tempContext.drawImage(source, imgout[0], imgout[1], imgout[2], imgout[3],0,0, canvas.width, canvas.height);
                adjustColor3();
                tempContext.drawImage(document.getElementById("mengpi3"),0,0, canvas.width, canvas.height);
                var image3 = new Image;
                image3.src = canvas.toDataURL('image/jpeg');
                image3.id='imageupload-result3';
                images.appendChild(image3);

                tempContext.drawImage(source, imgout[0], imgout[1], imgout[2], imgout[3],0,0, canvas.width, canvas.height);
                adjustColor4();
                tempContext.drawImage(document.getElementById("mengpi4"),0,0, canvas.width, canvas.height);
                var image4 = new Image;
                image4.src = canvas.toDataURL('image/jpeg');
                image4.id='imageupload-result4';
                images.appendChild(image4);

                tempContext.drawImage(source, imgout[0], imgout[1], imgout[2], imgout[3],0,0, canvas.width, canvas.height);
                adjustColor5();
                tempContext.drawImage(document.getElementById("mengpi5"),0,0, canvas.width, canvas.height);
                var image5 = new Image;
                image5.src = canvas.toDataURL('image/jpeg');
                image5.id='imageupload-result5';
                images.appendChild(image5);

                // $("#targetDiv").show();

/*
                var drawCanvas1 = document.getElementById("drawConvas1");

                drawCanvas1.width = 750;drawCanvas1.height = 1165;

                drawContext1 = drawCanvas1.getContext("2d");

                var printLastPhotoBox = document.getElementById("printLastPhotoBox");
                printLastPhotoBox.innerHTML = "";

                setTimeout(function(){

                    // 1
                    drawContext1.drawImage(image1,0,0, drawCanvas1.width, drawCanvas1.height);
                    xiezi(drawContext1, qinghua[0]);
                    var printLastPhoto1 = new Image;
                    printLastPhoto1.src = document.getElementById("drawConvas1").toDataURL('image/jpeg');
                    printLastPhotoBox.appendChild(printLastPhoto1);

                    // canvas.height=canvas.height;

                }, 5000)
*/

            }


                }
                reader.readAsDataURL(file.files[0]);

                //添加标签
                var div = document.createElement("div");
                var divattr = document.createAttribute("id");
                divattr.value = "test";
                div.setAttributeNode(divattr);
                document.getElementsByClassName("font").item(0).appendChild(div);

            }
        }
        function lastname(filename) {
            var index = filename.lastIndexOf(".");
            var ext = filename.substr(index+1);
            return ext;
        }



        var tempContext = null; // global variable 2d context


        //第二个canvas 解决画字bug
        var drawCanvas1 = document.getElementById("drawConvas1");
        drawCanvas1.width = 750;drawCanvas1.height = 1165;
        var drawContext1 = drawCanvas1.getContext("2d");


        window.onload = function () {
            loadingTmp();

/*            var source = $("#img-box").find('img').get(0);
            var canvas = document.getElementById("target");
            canvas.width = source.clientWidth;
            canvas.height = source.clientHeight;
            tempContext = canvas.getContext("2d");
            tempContext.drawImage(source, 0, 0, canvas.width, canvas.height);*/

        }

        function bindButtonEvent(element, type, handler)
        {
            if(element.addEventListener) {
                element.addEventListener(type, handler, false);
            } else {
                element.attachEvent('on'+type, handler); // for IE6,7,8
            }
        }

/*        var canvas = document.getElementById("target");*/
        // 滤镜切换事件
        function tabMengpi(index){
        }

        var index = 1;
        // var mainCtx = document.getElementById("drawContext").getContext("2d");
        // mainCtx.drawImage(imagetodraw,0,0,mainCtx.width,mainCtx.height);


       /* $("#uplos").on("touchmove", function(e) {
            alert();
        });*/

        var startX, startY;
        var moveEndX, moveEndY;
        var X, Y;

        $("#uplos").on("touchstart", function(e) {

            e.preventDefault();

            startX = e.originalEvent.changedTouches[0].pageX,
            startY = e.originalEvent.changedTouches[0].pageY;

        });

        $("#uplos").on("touchmove", function(e){


            e.preventDefault();
            moveEndX = e.originalEvent.changedTouches[0].pageX,

            moveEndY = e.originalEvent.changedTouches[0].pageY,

            X = moveEndX - startX,

            Y = moveEndY - startY;

        });

        $("#uplos").on("touchend", function(e){
            e.preventDefault();


            if ( X > 0 ) {//朝左

                ljIndex--; if (ljIndex==0) {ljIndex=5};
                getImageDrawWord("imageupload-result"+(ljIndex), getCurrentQh())

            } else if ( X < 0 ) {//朝右

                ljIndex++; if (ljIndex==5) {ljIndex=0};
                getImageDrawWord("imageupload-result"+(ljIndex), getCurrentQh())

            }
        })

        var body_startX, body_startY;
        var body_moveEndX, body_moveEndY;
        var body_X, body_Y;

        $("#touch-section5").on("touchstart", function(e) {
            // e.preventDefault();
            body_startX = e.originalEvent.changedTouches[0].pageX,
            body_startY = e.originalEvent.changedTouches[0].pageY;

        });

        $("#touch-section5").on("touchmove", function(e){
            // e.preventDefault();
            body_moveEndX = e.originalEvent.changedTouches[0].pageX,
            body_moveEndY = e.originalEvent.changedTouches[0].pageY,
            body_X = body_moveEndX - body_startX,
            body_Y = body_moveEndY - body_startY;
        });

        $("#touch-section5").on("touchend", function(e){
            // e.preventDefault();

            if ( body_Y > 0) {//下滑



           } else if ( body_Y < 0 ) {//上滑
				window.location.href = "http://vip1.zbom.com";
               /* if (document.getElementsByClassName("file-img")[0].value == "") {
                    alert("请上传图片");
                    $.fn.fullpage.onSlideLeave()
                }
*/
            // alert(body_Y);


            // $.fn.fullpage.setAllowScrolling(true, 'up');

            // if (document.getElementsByClassName("file-img")[0].value == "") {alert("请上传图片")};



               // document.getElementById('printLastPhoto').src = document.getElementById("uplos").src;
               // alert("bottom 2 top");

           }
        })

/*-----------------------------------------------------------------------------------------*/
/*
        document.getElementById("tabMengpi-button").onclick = function(){
            var currentIndex = index;
            tabMengpi(currentIndex);

            usedImage = "imageupload-result"+index;

            drawContext1.drawImage(document.getElementById(usedImage),0,0, drawConvas1.width, drawConvas1.height);
            xiezi(drawContext1, qinghua[qhIndex]);
            document.getElementById("uplos").src = document.getElementById("drawConvas1").toDataURL('image/jpeg');

*/

          /*  drawContext1.drawImage(usedImage,0,0, drawCanvas1.width, drawCanvas1.height);
            xiezi(drawContext1, qinghua[0]);
            var printLastPhoto1 = new Image;
            printLastPhoto1.src = document.getElementById("drawConvas1").toDataURL('image/jpeg');
            printLastPhotoBox.appendChild(printLastPhoto1);

            var uplos = new Image;
            uplos.src = document.getElementById("target").toDataURL();
            uplos.id = 'uplos';
            document.getElementById("img-box").appendChild(uplos);
*/
            // canvas.height=canvas.height;
/*
            ++index;
            if (index == 6) {index=1};*/

            // document.getElementById("target").width = 750;
            // document.getElementById("target").height = 1165;

            // xiezi("drawContext", document.getElementById(usedImage), qinghua[0]);
            // xiezi("target", document.getElementById(usedImage), qinghua[0]);

            // document.getElementById("target").toDataURL();
/*            var uplos = new Image;
            uplos.src = document.getElementById("target").toDataURL();
            uplos.id='uplos';
            document.getElementById("img-box").appendChild(uplos);*/
        // }
/*-----------------------------------------------------------------------------------------*/


        function getImageDrawWord(imageid, word)
        {
            drawContext1.drawImage(document.getElementById(imageid),0,0, drawConvas1.width, drawConvas1.height);

            document.getElementById("sync").src = sync[ljIndex];

            xiezi(drawContext1, word);
            document.getElementById("lastImage").src = document.getElementById("printLastPhoto").src = document.getElementById("uplos").src = document.getElementById("drawConvas1").toDataURL('image/jpeg');
        }

        function getCurrentQh()
        {
            //获取情话
            var currentWord = dom("write").value == "" ? qinghua[qhIndex] : dom("write").value;;
            return currentWord;
        }




        function loadingTmp(){
            var source = document.getElementById("uplos");
            var initCanvas = document.getElementById("initCanvas");
            var images = document.getElementById("images");

            var initCanvasContext;

            var imgout = new Array(4);
            getimgsize(source.naturalWidth,source.naturalHeight,750,1165,imgout);

            initCanvas.width = 750;
            initCanvas.height = 1165;
            /*initCanvas.width = imgout[2];
            initCanvas.height = imgout[3];*/

            initCanvasContext = initCanvas.getContext("2d");

            /*initCanvasContext.drawImage(source, imgout[0], imgout[1], imgout[2], imgout[3],0,0, initCanvas.width, initCanvas.height);
            adjustColor1();
            initCanvasContext.drawImage(document.getElementById("mengpi1"),0,0, initCanvas.width, initCanvas.height);
            source.src = initCanvas.toDataURL('image/jpeg');*/


            initCanvasContext.drawImage(source, imgout[0], imgout[1], imgout[2], imgout[3],0,0, initCanvas.width, initCanvas.height);
            adjustColor1("initCanvas");
            initCanvasContext.drawImage(document.getElementById("mengpi1"),0,0, initCanvas.width, initCanvas.height);
            var image1 = new Image;
            image1.src = initCanvas.toDataURL('image/jpeg');
            image1.id='imageupload-result1';
            images.appendChild(image1);

            // 初始第一张图
            image1.onload = function(){

                getImageDrawWord("imageupload-result1", getCurrentQh())

            }
            // 初始第一张图end

            initCanvasContext.drawImage(source, imgout[0], imgout[1], imgout[2], imgout[3],0,0, initCanvas.width, initCanvas.height);
            adjustColor2("initCanvas");
            initCanvasContext.drawImage(document.getElementById("mengpi2"),0,0, initCanvas.width, initCanvas.height);
            var image2 = new Image;
            image2.src = initCanvas.toDataURL('image/jpeg');
            image2.id='imageupload-result2';
            images.appendChild(image2);

            initCanvasContext.drawImage(source, imgout[0], imgout[1], imgout[2], imgout[3],0,0, initCanvas.width, initCanvas.height);
            adjustColor3("initCanvas");
            initCanvasContext.drawImage(document.getElementById("mengpi3"),0,0, initCanvas.width, initCanvas.height);
            var image3 = new Image;
            image3.src = initCanvas.toDataURL('image/jpeg');
            image3.id='imageupload-result3';
            images.appendChild(image3);

            initCanvasContext.drawImage(source, imgout[0], imgout[1], imgout[2], imgout[3],0,0, initCanvas.width, initCanvas.height);
            adjustColor4("initCanvas");
            initCanvasContext.drawImage(document.getElementById("mengpi4"),0,0, initCanvas.width, initCanvas.height);
            var image4 = new Image;
            image4.src = initCanvas.toDataURL('image/jpeg');
            image4.id='imageupload-result4';
            images.appendChild(image4);

            initCanvasContext.drawImage(source, imgout[0], imgout[1], imgout[2], imgout[3],0,0, initCanvas.width, initCanvas.height);
            adjustColor5("initCanvas");
            initCanvasContext.drawImage(document.getElementById("mengpi5"),0,0, initCanvas.width, initCanvas.height);
            var image5 = new Image;
            image5.src = initCanvas.toDataURL('image/jpeg');
            image5.id='imageupload-result5';
            images.appendChild(image5);

        }

        function loadedMusicPlay()
        {
            document.getElementById("mp3Btn1").play();
            $(".audio").addClass("gry move");
            $('.gry').css({"background":"url(img/music_gry.png) no-repeat center bottom","background-size":"cover"});


        }
        function loadedMusicPause()
        {
            $(".audio").removeClass("gry");
            $('.gry').css({"background":"url(img/music.png) no-repeat center bottom","background-size":"cover"});
        }
    </script>
<script>
    $(document).ready(function () {
        $('body').height($('body')[0].clientHeight);

    });
</script>

<!-- 微信分享  -->

<?php
  require_once "wechat/jssdk.php";
  $jssdk = new JSSDK('wxe76eddbdfe44031c', '5fc44a090dcc2e2c2ea617bdc3925bf4');
  
  $signPackage = $jssdk->GetSignPackage();
  $share_title = '志邦厨柜，男人下厨节';
  $share_title2 = '我不怎么会说爱，岁月知道我爱你，可今天我想对你说句情话！';
  $share_description = '我不怎么会说爱，岁月知道我爱你，可今天我想对你说句情话！';
  //$share_image = 'http://vip.zbom.com/img/share_image2.jpg';
  $share_image = 'http://vip.zbom.com/img/share_image3.jpg';

?>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script>
console.log=function(){};
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
   //debug: true,
    appId: '<?=$signPackage["appId"];?>',
    timestamp: <?=$signPackage["timestamp"];?>,
    nonceStr: '<?=$signPackage["nonceStr"];?>',
    signature: '<?=$signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'checkJsApi',
      'hideOptionMenu',
      'onMenuShareTimeline', //分享给好友
      'onMenuShareAppMessage', //分享到朋友圈
    ]
  });
    var shareData = {
       title: '<?=$share_title?>',
       desc: '<?=$share_description?>',
       link: window.location.href,
       imgUrl: '<?=$share_image?>',
     };
     wx.onMenuShareAppMessage();
     wx.onMenuShareTimeline();


  // 2. 分享接口
   // 2.1 监听“分享给朋友”，按钮点击、自定义分享内容及分享结果接口
   wx.ready(function(){
		   
     wx.onMenuShareAppMessage({
       title: '<?=$share_title?>',
       desc: '<?=$share_description?>',
       link: window.location.href,
       imgUrl: '<?=$share_image?>',
       trigger: function (res) {
		 
         //alert('用户点击发送给朋友');
       },
       success: function (res) {
         //alert("调用分享接口");
       },
       cancel: function (res) {
          //alert('已取消');
       },
       fail: function (res) {
         //alert(JSON.stringify(res));
       }
     });
   // 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
     // document.querySelector('#onMenuShareTimeline').onclick = function() {
       wx.onMenuShareTimeline({
		
         title: '<?=$share_title2?>',
         desc: '<?=$share_description?>',
         link: window.location.href,
         imgUrl: '<?=$share_image?>',
         trigger: function (res) {
           //alert('用户点击分享到朋友圈');
         },
         success: function (res) {
           //alert("调用分享接口");
         },
         cancel: function (res) {
           //alert('已取消');
         },
         fail: function (res) {
           //alert(JSON.stringify(res));
         }
       });
       // alert('提示：请点击右上角列表按钮，点击分享到朋友圈或好友，邀请好友帮忙砍价！');
     // };
   })

</script>



<script src="js/form.js"></script>
</html>
