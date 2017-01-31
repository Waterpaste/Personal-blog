<?php	
use Think\Page;
function str($list,$field,$length,$encoding){
	if($list) {
		foreach ($list as $key=>$value){
			if(mb_strlen($value[$field],$encoding) > $length){//mb_strlen字符串长度函数第二个参数表示编码格式
				$list[$key][$field] = mb_substr($value[$field],0,$length,$encoding).'...';//mb_substr 函数返回字符串的一部分。
			}
		}
	}
	return $list;
}


