<?php
namespace App\controller;
use App\helpers\Lister as Lister;
use Core\response\Redirect as Redirect;
class WebController extends Controller
{
    public function __construct()
    {
    	parent::__construct();
    }

	public function into()
	{
		global $pid,$ty,$showtype;

		$lister = new Lister();

		$data = $lister->s2('content,img1,introduce');
		$data['content'] = isset($data['content']) && $data['content'] ? htmlspecialchars_decode($data['content']) : config('other.nocontent');
		return $this->view('danyi', compact('data'));

	}
	public function index()
	{
		global $pid,$ty,$showtype;

		$lister = new Lister();

		if ($pid == 7) {#加入我们
			$data = v_data(7, 15, 'img1,title');
			$job = v_news(7, -30, '*');
			return $this->view('join', compact('data', 'job'));
		} elseif($pid==6) {
			$data = M('news')->field('id,title,img1,ty,content2')->where('pid=6')->select();
			return $this->view('hezuo', compact('data'));
		}

		switch ($showtype) {
			case 1: // 新闻
				$lister->s1(5, 's1');
				$display = $lister->display;
				$paging = $lister->paging;
				return $this->view('news', compact('display', 'paging'));
				break;
			case 2: // 单一内容
				$data = $lister->s2('content,img1,introduce');
				$data['content'] = isset($data['content']) && $data['content'] ? htmlspecialchars_decode($data['content']) : config('other.nocontent');
				return $this->view('danyi', compact('data'));
				break;
			case 7: // 留言模块
				if ($pid==4) {

					return $this->view('medical', compact('data'));
				} elseif($pid==5) {

					return $this->view('booking', compact('data'));
				} elseif($pid==6) {

					return $this->view('hezuo', compact('data'));
				}
				break;
			case 11: // 图文列表
				$data = v_data($pid, $ty, 'img1,img2,title,ftitle,content');
				return $this->view('team', compact('data'));
				break;
			default:
				$this->redirect('index');
				// return $this->view('index');
				break;
		}
	}

	public function index2()
	{
		global $pid,$ty,$showtype;
		echo $showtype;
		$lister = new Lister();
		switch ($pid) {
			case 1: // 公司介绍
				$data = $lister->s2('content,img1,introduce');
				return $this->view('about', compact('data'));
				break;
			case 2: // 机构联盟
				$lister->s1();
				$display = $lister->display();
				return $this->view('hezuo', compact('display'));
				break;
			case 3: // 专家团队
				$lister->s1(1000);
				$display = $lister->display;
				return $this->view('experts', compact('display'));
				break;
			case 4: // 案例资讯
				$lister->s1(6, 's2');
				$display = $lister->display;
				$paging = $lister->paging;
				return $this->view('case', compact('display', 'paging'));
				break;
			default:
				return $this->view('index');
				break;
		}
	}

	public function detail()
	{
		return $this->view('detail');
	}

}
