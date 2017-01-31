<?php
namespace Home\Controller;
use Think\Controller;
class NewController extends Controller{
	public function index(){
		$newdb = D('Home/Newarticle');
		//print_r( I('get.'));
		$id = I('get.id');
		$new = $newdb->relation(true)->where('id=%d',array($id))->select();
		//print_r($new);
		//echo $new[0]['cate_id'];
		//print_r($this->front());
		$newdb->where("id=%d",array($id))-> setInc('count',1);		
		$this->assign('new',$new);
		$this->next();
		$this->right();
		
		
		/*评论*/
		$comment = $this->CommentList($pid = 0, $commentList = array(), $spac = 0);
		$this->assign('commentList', $comment);
		$counts = $this->page();
		$this->assign('count',$counts);
		$this->assign('user',cookie('user'));
		$this->assign('email',cookie('email'));
		$this->assign('url',cookie('url'));
		/*显示*/
		$this->display('Index/new');
		
		
	}
	
	protected function right(){
		$public = A('Common/Right');
		$public->about();
		$public->hotpost();
		$public->cate();
		$public->friends();
		$public->footer();
		
	}
	
	protected  function next(){
		$id = I('get.id');
		$newdb = M('Posts');
		//上一篇
		if(!!$front = $newdb->field('id,p_title')->where('id < %d',array($id))->order('id desc')->limit('1')->find()){
			$this->assign('front',$front);
		}
		//下一篇
		if(!!$after = $newdb->field('id,p_title')->where('id > %d',array($id))->order('id asc')->limit('1')->find()){
			
			$this->assign('after',$after);
		}
		
				
		//print_r($front);
	}
	
	//评论
	//评论列表
	function CommentList($pid = 0, &$commentList = array(), $spac = 0) {
		static $i = 0;
		$postid=I('get.id');
		$floor=0;
		$spac = $spac + 1; //初始为1级评论
		$List = M('comments')->where(array('pid' => $pid,'post_id'=>$postid))->order("id asc")->select();
		foreach ($List as $k => $v) {
			$commentList[$i]['level'] = $spac; //评论层级
			$commentList[$i]['author'] = $v['author'];
			$commentList[$i]['id'] = $v['id'];
			$commentList[$i]['pid'] = $v['pid']; //此条评论的父id
			$commentList[$i]['content'] = $v['content'];
			$commentList[$i]['time'] = $v['date'];
			// $commentList[$i]['pauthor']=$pautor;
			
			$i++;
			$this->CommentList($v['id'], $commentList, $spac);
		}
		
		return $commentList;
	}
	
	//分页
	protected function page(){
		$postid['post_id']=I('get.id');
		$newdb = A('Common/Page');
		$new = $newdb->page('Comments',15,'commen','id asc',$postid);
		$counts = M('Comments')->where($postid)->count();
		return $counts;
	}
	
	public function _empty(){
		header("HTTP/1.0 404 Not Found");
		$this->display('Public/404');
	}
}