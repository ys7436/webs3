<?php
$temp = strtoupper(urldecode(urldecode($_SERVER['REQUEST_URI'])));
if(strpos($temp, '<') !== false || strpos($temp, '"') !== false || strpos($temp, 'CONTENT-TRANSFER-ENCODING') !== false)
{
  exit('非法操作');
}
unset($temp);

if($system_isstate==1)exit($system_showinfo);

{
  $q  = I('get.q', '', 'trim');
  sql_filter($q);
  $q = cutstr($q, 20);//关键字
}
$id  = I('get.id' , 0, 'intval');
$pid = I('get.pid', 0, 'intval');
$ty  = I('get.ty' , 0, 'intval');
$category_id_1  = I('get.category_id_1' , 0, 'intval');$category_id_1 && $ty=$category_id_1;
$tty = I('get.tty', 0, 'intval');

$table = 'news';

//排除辅助栏目
// if($pid === NavSet::fuzhuId()) header('location:/');

//SEO友好
$showtype = 0;
if($id && $view = \App\helpers\View::dispatch($id, $table)) {

  $pid = $view->pid;
  $ty = $view->ty;
  $id_title = $view->title;
  $system_seotitle     = isset($view->seotitle) ? $view->seotitle : $view->title;
  $system_keywords     = isset($view->keywords) ? $view->keywords : '';
  $system_description  = isset($view->description) ? $view->description : '';
} elseif($pid || $ty) {
  if(!$ty) $ty=getNextId($pid);
  $pid_find = M('news_cats')->field('keywords,img1,description,seotitle,catname,showtype')->find($pid);
  $pid_img1 = $pid_find['img1'];
  $pid_find = M('news_cats')->field('keywords,img1,description,seotitle,catname,showtype')->find($ty);
  $showtype = $pid_find['showtype'];
  $system_seotitle     = $pid_find['seotitle'] ? $pid_find['seotitle'] : $pid_find['catname'];
  $system_keywords     = $pid_find['keywords'];
  $system_description  = $pid_find['description'];
  // unset($pid_find);
}
$TmpPidNewsCats = M('news_cats')->find($pid);
$TmpTyNewsCats  = M('news_cats')->find($ty);
$TmpTyNews      = M('news')->where("pid=$pid and ty=$ty")->find();
$TmpPidNewsCats && extract($TmpPidNewsCats,EXTR_PREFIX_ALL,'pid');
$TmpTyNewsCats  && extract($TmpTyNewsCats,EXTR_PREFIX_ALL,'ty');
if ($q && isset($ty_catname)) {$ty_catname='搜索"'.$q.'"的结果';}
$TmpTyNews      && extract($TmpTyNews,EXTR_PREFIX_ALL,'news_ty');
unset($bd,$TmpPidNewsCats,$TmpTyNewsCats,$TmpTyNews);

$system_keywords    = isset($id_keywords)    ? $id_keywords    : $system_keywords;
$system_description = isset($id_description) ? $id_description : $system_description;
$system_seotitle    = trim("$system_seotitle | $system_sitename", ' | ');

// 内页banner图
$pid_img1 = isset($pid_img1) && $pid_img1 ? src($pid_img1) : '/images/page_banner.jpg';
$qq_online = 'http://wpa.qq.com/msgrd?v=3&uin='.$system_webqq.'&site=qq&menu=yes';