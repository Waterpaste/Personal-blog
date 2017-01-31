<?php
namespace Adminls\Model;
use Think\Model;
class CatesModel extends Model{
	protected $_validate = array(
			array('title', 'require', '不得为空！',0,'regex',3),
			array('title','','分类名称已存在',2,'unique',1),
			array('title', 'checkLength', '分类必须在1-8位之间', 0, 'callback', 3, array(1,8)),
			array('s_desc', 'checkLength', '分类必须在1-20位之间', 0, 'callback', 3, array(1,20)),
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