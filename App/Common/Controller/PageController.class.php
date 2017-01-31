<?php
namespace Common\Controller;
use Adminls\Model\ArticleModel;
use Think\Controller;
use Think\Page;
class PageController extends Controller{
	public function page($db,$size,$name,$order,$value=null){
		$list=D($db);
		$count=$list->where($value)->count();
		$pagesize=$size;
		$page = new Page($count, $pagesize);
		$page->setConfig('first','首页');
		$page->setConfig('prev','上一页');
		$page->setConfig('next', '下一页');
		$page->setConfig('last','尾页');
		$page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li id="total-page"><span style="border:none; background-color:transparent;color: #666;">共-%TOTAL_PAGE%-页 </span></li> ');
		$show = $page->show();
		
		$listpage = $list->where($value)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
		if(!$num = I('get.p')) $num=1;
		$num = ($num-1)*$pagesize;
		$this->assign('num',$num);
		//var_dump($listpage);
		$this->assign($name,$listpage);
		$this->assign('page',$show);
		
	}
	
	public function pages($route,$size,$order,$value=null){
		
		$list= D($route);
 		$count=$list->where($value)->count();
 		$pagesize=$size;
 		$page = new Page($count, $pagesize);
		$page->setConfig('first','首页');
		$page->setConfig('prev','上一页');
		$page->setConfig('next', '下一页');
		$page->setConfig('last','尾页');
		$page->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% <li id="total-page"><span style="border:none; background-color:transparent;color: #666;">共-%TOTAL_PAGE%-页 </span></li> ');
		$show = $page->show();
		
		$listpage = $list->relation(true)->where($value)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
		if(!$num = I('get.p')) $num=1;
		$num = ($num-1)*$pagesize;
		$this->assign('num',$num);
		//print_r($listpage);		
		$this->assign('page',$show);
		return $listpage;

	}
}