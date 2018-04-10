<?php
namespace App\controller;

class IndexController extends Controller
{

	public function index()
	{
		$data = v_news(8, -16, '*');
		$this->view('index', compact('data'));
	}

}
