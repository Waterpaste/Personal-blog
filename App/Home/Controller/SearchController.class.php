<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class SearchController extends Controller{
	public function index(){
		$keyword = I('get.');
		//echo $keyword['searchWords'];
		$posts=$this->sql($keyword['searchWords']);
		$this->assign('searchs',$posts);
		
		/*right*/
		$this->right();
		/*footer*/
		
		$this->display('index/Search');
		
	}
	
	protected function right(){
		$public = A('Common/Right');
		$public->about();
		$public->hotpost();
		$public->cate();
		$public->friends();
		$public->footer();
	}
	
	protected function sql($keyword){
		if (!empty($keyword)) {
			$listpg = A('Common/Page');
			$value['s_title'] = array("LIKE","%".$keyword."%");
			$list = $listpg->pages('Home/Postarticle',5,'date desc',$value);
			$commentdb = M('Comments');
			foreach ($list as $key=>$value){
				$comments['post_id']=$value['id'];
				$list[$key]['comment'] = $commentdb->where($comments)->count();
			}
			$posts = str($list, 'content', 180, 'utf-8');
			return $posts;
		}
		
	}
	public function _empty(){
		header("HTTP/1.0 404 Not Found");
		$this->display('Public/404');
	}
}