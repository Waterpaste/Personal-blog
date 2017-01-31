<?php
namespace Home\Model;
use Think\Model;
class ListModel extends Model{
	protected $_validate = array(
			array('user', 'email', '邮箱格式不合法！'),
		);		
}