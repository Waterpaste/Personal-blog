<?php
namespace Adminls\Model;
use Think\Model;
class PostsModel extends Model{
	protected $_validate = array(
			array('p_title', 'require', '标题不得为空！',0,'regex',3),
			array('p_title', 'checkLength', '标题必须在1-30位之间', 0, 'callback', 3, array(1,30)),
			array('cate_id', 'require', '分类选项不得为空！',0,'regex',3),
			array('content', 'require', '文章内容不得为空！',0,'regex',3),
			array('s_title','require','关键字不得为空',0,'regex',3),
			array('s_title', 'checkLength', '关键字必须在1-30位之间', 0, 'callback', 3, array(1,30)),
			array('authour','require','作者不得为空',0,'regex',3),
			array('count','integer','浏览量必须为整数',0,'regex',3),
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