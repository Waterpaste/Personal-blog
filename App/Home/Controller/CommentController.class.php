<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller{
	
	public function addcomment(){
		$ip = get_client_ip();
		$commentdb = D('Comments');
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
	
	public function _empty(){
		header("HTTP/1.0 404 Not Found");
		$this->display('Public/404');
	}
}