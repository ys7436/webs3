<header class="head wd clr">
    <div class="logo fl"><a href="/"><img src="/images/logo.jpg" width="258" height="70"></a></div>
    <div class="slogan fl">无我利他 启迪众生<br>  让天下人 健康幸福</div>
    <div class="fr tell clr">
        <img src="/images/tel.png" width="60" height="52" class="fl">
        <div class="tell_num fl">
            健康热线<span>{{$system_phone}}</span>
        </div>
    </div>
</header>

<div class="menu clr">
    <div class="wd clr">
        <nav class="fl navigation">
            <ul>
                {!! pc_nav() !!}
            </ul>
        </nav>
        <form action="{{u('web/index')}}">
            <div class="index_sear fr">
                <input name="q" value="{{$q}}" type="text" class="sear_txt" placeholder="请输入关键字">
                <input type="hidden" name="pid" value="3">
                <input type="hidden" name="ty" value="38">
                <input type="submit" class="index_sub" value="">
            </div>
        </form>
    </div>
</div>
@if(IS_INDEX)
<!-- banner轮播 -->
<div class="banner">
     <div class="flexslider">
        <ul class="slides">
            {!! vv(8, 17, '<li><a title="@$title@" href="@$linkurl@" target="_blank"><img src="__IMG__"></a></li>'); !!}
        </ul>
    </div>
</div>
<!-- banner轮播结束 -->
@else
<div class="page_banner"><img src="{{$pid_img1}}"></div>
<div class="bg_e1">
    <div class="wd addr_nav">当前位置:{!! pc_bread() !!} </div>
</div>
@endif