<?php
namespace Home\Model;
use Think\Model;
class CommentsModel extends Model{
	protected $_validate = array(
			array('author' ,'require','昵称不得为空'),
			array('content','require','内容不得为空'),
			array('email', 'email', '邮箱格式不合法！',2),
			array('comment_url','url','网址格式为http|s://....',2),
			array('author', 'checkLength', '昵称不得大于十位', 0, 'callback', 3, array(1,10)),
			array('email','checkLength','邮箱不得大于五十位',0,'callback',3,array(0,50)),
		);		
	protected function checkLength($str,$min,$max){
		preg_match_all('/./u',$str,$matches);
		$len = count($matches[0]);
		if ($len < $min || $len > $max) {
			return false;
		} else {
			return true;
		}
	}
}