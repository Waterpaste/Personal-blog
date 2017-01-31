<?php
namespace Common\Controller;
use Think\Controller;
class RightController extends Controller{
	Public function about(){
		$aboutdb = M('Info');
		$about = $aboutdb->field('id,skeywords,slogo,sdescription,s_name')->select();
		$this->assign('about',$about);
	}
	
	public function hotpost(){
		$hotpostdb = M('Posts'); 
		$hotpost = $hotpostdb->field('id,p_title,count')->order('count desc')->limit(5)->select();
		$this->assign('hotpost',$hotpost);
	}
	
	Public function cate(){
		$cates = M('Cates');
		$value = $cates->select();
		$this->assign('cates',$value);
	}
	
	public function friends(){
		$frienddb = M('Friends');
		$friend = $frienddb->order('id')->select();
		$friend = str($friend, 'f_title', 20, 'utf-8');
		$this->assign('friend',$friend);
	}
	
	public function footer(){
		$footerdb = M('Info');
		$footer = $footerdb->field('scopyright')->select();
		$this->assign('footer',$footer);
	}
	
}