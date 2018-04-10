<?php
require_once __DIR__.'/app/common.incs.php';
if (request()->isMobile()) {
	header('location:'.$system_siteurl_wap);
}
header("X-Powered-By:http://www.semfw.cn");
if (isset($analogUri)) {// 静态页使用
	$requestUri = $analogUri;
} else {
	$requestUri = request()->url();
}
// 路由解析 model或者controller
list($controller, $method) = Core\Config::route($requestUri);

define('IS_INDEX',$controller == 'index');
define('IS_LIST',$method == 'index');
// 引入业务处理代码
require_once __DIR__.'/app/processing.php';


$controller = 'form';
$method = 'index';

$controllerClassName = 'App\\controller\\' . ucfirst($controller).'Controller';
if (class_exists($controllerClassName) && method_exists($controllerClassName, $method)) {
	$octrl = new $controllerClassName();
	call_user_func_array([$octrl,$method], [$GLOBALS]);
} else {
	die(config('r404'));
}

