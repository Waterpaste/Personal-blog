<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//$this->redirect('Home/Public/right');
    	/*header*/
    	//echo "<script type='text/javascript'>opener.document.nav.li.class='active';</script>";
    	$ui['index'] = 'active';
    	$this->assign('ui',$ui);
    	/*posts*/
    	$posts=$this->page();
    	$this->assign('post',$posts);
    	/*right*/
    	$this->right();
    	/*footer*/
    	
		$this->display();
    }
    protected function page(){
    	$post = A('Common/Page');
    	$postdb = $post->pages('Home/Postarticle',5,'date desc');
    	$commentdb = M('Comments');
    	foreach ($postdb as $key=>$value){
    		$comments['post_id']=$value['id'];
    		$postdb[$key]['comment'] = $commentdb->where($comments)->count();
    	}
    	$posts = str($postdb, 'content', 180, 'utf-8');
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