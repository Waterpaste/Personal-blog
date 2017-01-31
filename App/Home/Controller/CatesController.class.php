<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class CatesController extends Controller{
public function index(){
    	//$this->redirect('Home/Public/right');
    	/*header*/
    	//echo "<script type='text/javascript'>opener.document.nav.li.class='active';</script>";
    	$ui['index'] = 'active';
    	$this->assign('ui',$ui);
    	/*posts*/
    	$posts=$this->page();
    	$this->assign('post',$posts);
    	//print_r($posts);
    	
    	/*right*/
    	$this->right();
    	/*footer*/
		$this->display('Index/cate');
    }
    protected function page(){
    	$id = I('get.id');
		$listpg = A('Common/Page');
		$value['cate_id'] = $id;
		$list = $listpg->pages('Home/Postarticle',6,'date desc',$value );
		
		//print_r($list);
		$commentdb = M('Comments');
		//echo $commentdb->where('post_id=26')->count();
		foreach ($list as $key=>$value){
			$comments['post_id']=$value['id'];
			$list[$key]['comment'] = $commentdb->where($comments)->count();
		}		
		$posts = str($list, 'content', 180, 'utf-8');
		
		return $posts;
		
    }
    
    
    protected function right(){
    	$public = A('Common/Right');
    	$public->about();
    	$public->hotpost();
    	$public->cate();
    	$public->friends();
    	$public->footer();
    }
    
	public function _empty(){
		 header("HTTP/1.0 404 Not Found");
		 $this->display('Public/404');
	}
}