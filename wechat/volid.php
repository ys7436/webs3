<?php
/**
 * [CURLSend 使用curl向服务器传输数据]
 * @param [type] $url  [请求的地址]
 * @param array  $data [数据]
 * @param string $type [请求方式GET,POST]
 */

	if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['signature']) ) {//验证
		# code...
		$signature =  $_GET['signature'];//微信加密签名
		$timestamp =  $_GET['timestamp'];//时间戳
		$nonce     =  $_GET['nonce']	;//随机数
		$echostr   =  $_GET['echostr']  ;//随机字符串

		#* 1. 将token、timestamp、nonce三个参数进行字典序排序
		$token = 'rjczng1409286093';
		$tempArr = array( $timestamp, $nonce, $token);
		sort($tempArr);
		#* 2. 将数组拼接成一个字符串进行sha1加密
		$tempStr = implode( $tempArr );
		$tempStr = sha1( $tempStr );


		$result =  $tempStr == $signature ? $echostr : '验证失败';
		#* 3. 加密后的字符串可与signature对比，标识该请求来源于微信

		ECHO $result;
		exit;
	}
 ?>