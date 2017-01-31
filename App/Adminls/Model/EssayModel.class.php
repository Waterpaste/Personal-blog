<?php
namespace Adminls\Model;
use Think\Model;
class FriendsModel extends Model{
	protected $_validate = array(
			array('author', 'require', '不得为空！',0,'regex',3),
			array('content','require','内容不得为空',0,'regex',3),
		);
	
	 
	
	
	
	
}