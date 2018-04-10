<?php
if ( defined('WEB') ) {

function show_tab($pid,$ty, $ids)
{
	$m = M('news')->where(m_gWhere($pid,$ty))->order('disorder desc, isgood desc, id asc')->getField('id,title');
	$ids = explode(',', $ids);
	$tabs =  [];
	foreach ($ids as $id) {
		array_push($tabs, $m[$id]);
	}
	return implode('<em>/</em>', $tabs);
	// return $tabs;
}

function returnJson($status,$msg,$dom=false){
    $arr = [
    	'status' => $status,
    	'msg'    => $msg,
    ];
    $dom && $arr['dom'] = $dom;
    unset($status,$msg,$dom);
    die( json_encode($arr) );
}

function dieJson($error,$message,$redirect=false){
    $arr = [
    	'error' => $error,
    	'message'    => $message,
    ];
    $redirect && $arr['redirect'] = $redirect;
    unset($error,$message,$redirect);
    die( json_encode($arr) );
}
// 用法 <li><a style="background-image: url(__IMG__);" href="@$linkurl@"></a></li>
function v_data($pid,$ty,$field='*',$limit=0)
{
	$m = M('news')->field($field)->where(m_gWhere($pid,$ty))->order(config('other.order'));
	if ($limit) {
	    $m = $m->limit($limit);
	}
	$data = $m->select();
	return $data;
}
function vv($pid,$ty,$tpl,$limit=0)
{
	global $key;
	list($field, $flag) = App\Helpers\V::parse($tpl);
	$m = M('news')->field($field)->where(m_gWhere($pid,$ty))->order(config('other.order'));
	if ($limit) {
	    $m = $m->limit($limit);
	}
	$data = $m->select();

	$list = '';
	foreach ($data as $key => $value) {
		extract($value);
		if ($flag) {
			$URL = U($pid.'/detail', ['id'=>$id]);
		}
		eval(" \$list .= '$tpl';");
	}
	return $list;
}

function vvpro($set,$tpl,$limit=0)
{
	$pid=$ty=$tty = null;
	$where = [];
	list($field) = App\Helpers\V::parse($tpl);

	list($pid, $ty, $tty) = $set;
	if ($pid) $where['pid'] = $pid;
	if ($ty) $where['ty'] = $ty;
	if ($tty) $where['tty'] = $tty;

	$m = M('news')->field($field)->where((array) $where)->order(config('other.order'));
	if ($limit) {
	    $m = $m->limit($limit);
	}
	$data = $m->select();

	$list = '';
	foreach ($data as $key => $value) {
		extract($value);
		eval(" \$list .= '$tpl';");
	}
	return $list;
}

function pc_lefts()
{
	global $q,$pid,$ty;

	if ($q) {
		// echo '<li class="zong"><a href="javascript:;" style="background: url(img/6_03.png)no-repeat right center;line-height: 20px;padding-top: 5px;">搜索页面<br/>SEARCH</a></li><li class="on"><a style="background: url(img/6_03.png)no-repeat right center;">搜索结果</a></li>';
		// return ;
	}
	$tpl = '<li%s><a href="%s" class="s1">%s</a></li>';
	$data = M('news_cats')->field('id as ty,catname')->where(array('pid'=>$pid,'isstate'=>1))->order('disorder desc,id asc')->select();
	$pidURL = m_url($pid);
	$tmp='';
	foreach ($data as $key => $row) {
		$cur = $ty == $row['ty'] ? ' class="on"' : '';
		$url = m_url($pid,$row['ty']);
		// $tmp .= sprintf($tpl,$cur,$url,$row['catname']);
		$tmp .= sprintf($tpl,$cur,$url,$row['catname']);
	}
	UNSET($tpl,$data,$key,$pidURL,$row,$url,$cur);
	return $tmp;
}


function erji_nav()
{
	global $pid,$ty;
	$navs = M('news_cats')->where('pid='.$pid.' and isstate=1')->order('disorder desc,id asc')->getField('id,catname');
	$li = '';
	foreach ($navs as $id=> $catname) {
		$on = $ty == $id ? ' class="on"' : '';
		$url = u('web/index', ['pid' => $pid, 'ty' => $id]);
		$li	.= '<li'.$on.'><a title="'.$catname.'" href="'.$url.'">'.$catname.'</a></li>';
	}
	unset($navs, $id, $catname);
	return $li;
}

function pc_nav()
{
	global $pid,$ty;

	$on = ' on';

	$level1 = M('news_cats')->field('catname,id')->where('pid = 0 and id <=7')->order('disorder desc,id asc')->select();

	$nav = '';

	foreach ($level1 as $row1) {
		$catname1 = $row1['catname'];$id1 = $row1['id'];
		$u1 = u('web/index', ['pid' => $id1]);
		$cur = $pid == $id1 ? $on : '';

		#查询二级
		$nav2 = '';

		$level2 = M('news_cats')->field('id,catname')->where('pid<>0 and pid='.$id1.' and isstate=1')->order('disorder desc,id asc')->select();
		foreach ($level2 as $row2) {
			$catname2 = $row2['catname'];$id2 = $row2['id'];
			$u2 = u('web/index', ['pid' => $id1, 'ty' => $id2]);
			$nav2 .= '<li><a title="'.$catname2.'" href="'.$u2.'">'.$catname2.'</a></li>';
		}

$nav .= <<<NAV
<li class="nav_li$cur">
    <a href="$u1" title="$catname1" class="nav_li_a">$catname1</a>
    <div class="ej clr">
        <ul>
            $nav2
        </ul>
    </div>
</li>
NAV;
	}

	$index = '<li class="nav_li'.(IS_INDEX?$on:'').'"> <a href="/" class="nav_li_a">首页</a></li>';

	unset($pid,$ty,$OnClass,$on,$nav2,$row1,$catname1,$u1,$id1,$row2,$catname2,$u2,$id2,$cur);
	return $index . $nav;
}
function pc_foot()
{
	global $pid,$ty;

	$on = ' on';

	$level1 = M('news_cats')->field('catname,id')->where('pid = 0 and id <=7')->order('disorder desc,id asc')->select();

	$nav = '';

	foreach ($level1 as $row1) {
		$catname1 = $row1['catname'];$id1 = $row1['id'];
		$u1 = u('web/index', ['pid' => $id1]);
		$cur = $pid == $id1 ? $on : '';

		#查询二级
		$nav2 = '';

		$level2 = M('news_cats')->field('id,catname')->where('pid<>0 and pid='.$id1.' and isstate=1')->order('disorder desc,id asc')->select();
		foreach ($level2 as $row2) {
			$catname2 = $row2['catname'];$id2 = $row2['id'];
			$u2 = u('web/index', ['pid' => $id1, 'ty' => $id2]);
			$nav2 .= '<li><a title="'.$catname2.'" href="'.$u2.'">'.$catname2.'</a></li>';
		}

$nav .= <<<NAV
<div class="foot_nav_list fl">
    <ul>
        <li><a href="$u1" title="$catname1">$catname1</a></li>
        $nav2
    </ul>
</div>
NAV;
	}

	unset($pid,$ty,$OnClass,$on,$nav2,$row1,$catname1,$u1,$id1,$row2,$catname2,$u2,$id2,$cur);
	return $nav;
}

function pc_nav2()
{
	global $pid,$ty;

	$OnClass = ' class="nav-selected"';

	$data = M('news_cats')->where('pid = 0 and id <=4')->field('catname,id,pid')->order('disorder desc,id asc')->select();
	$on = IS_INDEX ? $OnClass : '';
	$pid = isset($pid) ? $pid : 0;
	$class=$temp='';//当前停留样式
	$tpl_ul = '<li%s> <a href="%s">%s</a> %s </li>';
    $tmp1='';
	foreach ($data as $row) {
		$tmp2='';
		$thispid = $row['id'];
		$class = $thispid == $pid ? $OnClass : '';
		$yiji_url = U('web/index', ['pid' => $thispid]);
		$yiji_catname = $row['catname'];
		// $yiji_img = src($row['img2']);
		$tmp1 .= '<li'.$class.'><a href="'.$yiji_url.'">'.$yiji_catname.'</a></li>';
	}
	echo '<li'.$on.'><a href="/">首页</a></li>' . $tmp1;
	unset($tmp1,$tmp2,$cur,$navs,$row,$key,$class,$url,$tpl1,$tpl2,$yiji_url,$yiji_catname,$erji_url,$erji_catname,$erjiRow,$template);
}

#常用小函数 统一前缀 m

	function m_url($pid,$ty=0, $route = 'web/index')
	{
		$args = ['pid' => $pid];
		if (!empty($ty)) $args['ty'] = $ty;
		return U($route, $args);
	}//传入pid=>list.php?pid=n

	function htmldecode($html) {return htmlspecialchars_decode($html);}

	function v_url($id)
	{
		return '/web/detail/id/'.$id;
	}//传入pid=>list.php?pid=n

	function pc_bread($sp = ' > ')
	{//面包屑导航
		global $q,$tty,$ty,$pid,$id_title,$id,$pid_catname,$ty_catname,$ty_catname2;
		  //面包屑导航
		  //$bread = $tty ? : $ty ? : $pid ;
		if ($q) {
			// ECHO '搜索"'.$q.'"的结果';
			// echo '搜索';
			return;
		}
		$array = [];
		$breadTemp = '';


		$array[] = ['首页', '/'];
		// $breadTemp = '<a href="/" style="font-style:italic">'.config('translator.home').'</a>' .$sp;
		if($pid){
			$array[] = [$pid_catname, m_url($pid)];
		}
		if($ty && $pid_catname != $ty_catname){
			if (empty($ty)) {$separtor='';}
			$array[] = [$ty_catname, m_url($pid, $ty)];
		}

		if ($id){
			global $id_title;
			$array[] = [$id_title, 'javascript:;'];
			// $breadTempId='<a href="javascript:;" style="color: #4a81c1;">'.$id_title.'</a>';
		}
		$count = count($array)-1;
		foreach ($array as $key => $value) {
			if ($count==$key) {
				$breadTemp .= '<span>'.$value[0].'</span>';
			} else {
				$breadTemp .= sprintf('<a href="%s">%s</a>'.$sp, $value[1], $value[0]);
			}
		}
		unset($url,$catname,$bread);
		return $breadTemp;
	}

} //END WEB