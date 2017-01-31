<?php
namespace Adminls\Model;
use Think\Model;
class InfoModel extends Model{
	protected $_validate = array(
			array('stitle','require','网站标题不得为空',0,'regex',3),
			array('surl','require','网址不得为空',0,'regex',3),
			array('s_name','require','昵称不得为空',0,'regex',3),
			array('scopyright','require','昵称不得为空',0,'regex',3),
			array('s_email','email', '邮箱格式不合法！'),
			array('surl', 'url', 'URL 路径不合法！'),
			array('stitle', 'checkLength', '网站标题必须在1-20位之间', 0, 'callback', 3, array(1,20)),
			array('surl', 'checkLength', '网址不得大于30', 0, 'callback', 3, array(1,30)),
			array('s_email', 'checkLen', '邮箱不得大于30', 0, 'callback', 3, array(30)),
			array('scopyright', 'checkLen', 'footer不得大于100', 0, 'callback', 3, array(100)),
			array('s_qq', 'checkLen', 'qq号不得大于20', 0, 'callback', 3, array(20)),
			array('s_name', 'checkLen', '昵称不得大于10', 0, 'callback', 3, array(10)),
			array('sdescription', 'checkLen', '关于本站不得大于100', 0, 'callback', 3, array(100)),
			array('skeywords', 'checkLen', '关于本站不得大于30', 0, 'callback', 3, array(80)),
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
	
	protected function checkLen($str,$max) {
		preg_match_all("/./u", $str, $matches);
		$len = count($matches[0]);
		if ($len > $max) {
			return false;
		} else {
			return true;
		}
	}
}