<?php
namespace Adminls\Model;
use Think\Model;
class FriendsModel extends Model{
	protected $_validate = array(
			array('f_title', 'require', '不得为空！',0,'regex',3),
			array('f_title','','友链名称已存在',2,'unique',1),
			array('f_url','','友链url已存在',2,'unique',1),
			array('f_url','url','友链url格式错误'),
			array('f_title', 'checkLength', '友链必须在1-8位之间', 0, 'callback', 3, array(1,50)),
			array('f_url', 'checkLength', '友链url必须在1-20位之间', 0, 'callback', 3, array(1,50)),
	);
	
	protected function checkLength($str,$min,$max) { 
		preg_match_all("/./u", $str, $matches); 
		$len = count($matches[0]); 
		if ($len < $min || $len > $max) { 
			return false;
		} else { 
			return true; 
		} 
	}
	
	
	
}