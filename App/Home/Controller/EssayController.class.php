<?php
namespace Home\Controller;
use Think\Controller;
class EssayController extends Controller{
	public function index(){
		$this->assign('commen',$this->show());
		$comment = $this->CommentList($pid = 0, $commentList = array(), $spac = 0);
		//var_dump($comment);
		$this->assign('commentList', $comment);
		
		/*right*/
		$public = A('Common/Right');
		$public->about();
		$public->hotpost();
		$public->cate();
		$public->friends();
		$public->footer();
		$this->display('Index/Essay');
	}
	protected function show(){
		$show = M('Essay');
		$commen = $show->order('date asc')->select();
		return $commen;
	}
	
	public function add(){
		$ip = get_client_ip();
		$commentdb = D('Essay');
		if(!!$comment = $commentdb->create()){
			$comment['ip'] = $ip;
			$comment['date'] = date("Y-m-d H:i:s");
			if($commentdb->add($comment)){
				cookie('user', $comment['author']);
				cookie('email',$comment['email']);
				cookie('url',$comment['comment_url']);
				$this->success('评论成功');
			}else {
				$this->error('评论失败');
			}
		}else {
			$this->error($commentdb->getError());
		}
		
	}
	//评论列表
	function CommentList($pid = 0, &$commentList = array(), $spac = 0) {
		static $i = 0;
		$floor=0;
		$spac = $spac + 1; //初始为1级评论
		$List = M('Essay')->where(array('pid' => $pid))->order("id asc")->select();
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
	public function _empty(){
		header("HTTP/1.0 404 Not Found");
		$this->display('Public/404');
	}
}