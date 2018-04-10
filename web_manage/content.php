<?php
namespace Admin;
require './include/common.inc.php';
define('TABLE_NEWS',true);
require WEB_ROOT.'./include/chkuser.inc.php';
$table = 'content';
$showname = 'content';

$find = M('news')->where(array('pid'=>$pid,'ty'=>-$ty,'tty'=>$tty))->find();
@extract($find);
$ty < 0 and $ty = abs($ty);
$opt = new Output;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>单一内容</title>
	<?php define('IN_PRO',1);include('js/head'); ?>
</head>

<body>

	<div class="content clr">
		<div class="weizhi">
			<p>位置：
				<a href="mains.php">首页</a>
				<span>></span>
				<?=$classname?>
			</p>
		</div>
		<div class="right clr">
			<div class="zhengwen clr">
				<div class="miaoshu clr">
					<div id="tab1" class="tabson">
						<div class="formtext">Hi，<b><?=$_SESSION['Admin_UserName']?></b>，欢迎您使用信息发布功能！</div>
						<!-- 表单提交 --><form id="dataForm" class="layui-form" method="post" enctype="multipart/form-data">
						<?php Style::output() ?>
						<input type="hidden" name="pid" value="<?=$pid?>" />
						<input type="hidden" name="ty"  value="<?=$ty?>"  />
						<input type="hidden" name="tty" value="<?=$tty?>" />
						<?php
							// ->img(v_news_cats(8,'catname'), 'img2', '480*320')
							// ->img('配图', 'img1', '772X270')
							$opt
							->ifs($pid==6)
							->img('配图', 'img1', '213*342')
							->textarea('简介', 'content2')
							->editor('手机详情', 'content3')
							->endifs()
							->ifs($ty==16)
							->img('关于我们', 'img1', '688*490')
							->img('预约中心', 'img2', '860*488')
							->img('近期活动', 'img3', '471*244')
							// ->echoString('<br><li><b>近期活动</b></li>')
							->endifs()
							->ifs($ty==30)
							->img('地图', 'img1', '890*282')
							->endifs()
							->ifs(false)
							->editor('关于我们','content','90%')
							->input('关于我们配文', 'introduce')
							->img('关于我们配图', 'img1', '1200*165')
							->endifs()
							->ifs($pid==3)
							->editor('手机详情', 'content2')
							->endifs()
							->editor('信息内容')
						;
							define('DEL_TIME_SORT',1);include('js/foot');
						?>