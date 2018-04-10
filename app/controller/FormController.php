<?php
namespace App\controller;
use App\helpers\VerifyForm as VerifyForm;
class FormController extends Controller
{


	public function index()
	{
		$verify = [
			'realname' => ['required', '请填写姓名'],
			'phone' => ['required', '请填写手机号'],
			'province' => ['required', '请选择省份'],
			'city' => ['required', '请选择城市'],
		];

		$form = new VerifyForm($verify, 'post');
		#验证不通过
		if ($form->result()) {
			echo 'qweqw';exit;
			returnJson(-100, $form->error, $form->field);
		}

		$insert = M('message')->insert([
		    'realname' => $form->realname,
			'phone'  => $form->phone,
			'province'  => $form->province,
			'city'  => $form->city,
			'ip' => $form->ip(),
			'sendtime' => $form->time(),
		]);

		if ($insert) {
			returnJson(200, lang('message_success'));
		} else {
			returnJson(-100, lang('message_failed'));
		}

	}

}
