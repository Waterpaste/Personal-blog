<?php
namespace Home\Controller;
use Think\Controller;
class AboutController extends Controller{
	public function index(){
		/*header*/
		$ui['about'] = 'active';
		$this->assign('ui',$ui);
		$this->assign('show',$this->left());
		$this->assign('img',$this->img());
		$this->right();
		$this->display('Index/About');
	}
	
	protected function right(){
		$public = A('Common/Right');
		$public->about();
		$public->hotpost();
		$public->cate();
		$public->friends();
		$public->footer();
	}
	
	protected function left(){
		$showdb = M('About');
		$show = $showdb->field('about,only')->select();
		return $show;
	}
	protected function img(){
		$imgdb = M('Info');
		$img=$imgdb->field('slogo')->select();
		return $img[0]['slogo'];
	}
	public function _empty(){
		 header("HTTP/1.0 404 Not Found");
		 $this->display('Public/404');
	}
}