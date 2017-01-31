<?php
namespace Adminls\Controller;
use Think\Controller;
use Think\Upload;
class CkeupController extends Controller{
	public function index(){
		  
	}
	
	//图片上传
	public function upload(){
		
		$config = array(
				'maxSize'=>3145728,
				'exts'=>array('jpg','jpeg','gif','png','bmp'),
				'rootPath'=>'./Uploads/',
				'autoSub'=>true,

		);
		
		$rootpath = substr($config['rootPath'],1);
		
		$upload = new Upload($config);//实例化上传类
		$info = $upload->upload();
 		if (!$info) {
			 echo "<script type='text/javascript'>alert('上传失败".$upload->getError()."');</script>";
		} else {					
			$savepath =__ROOT__.$rootpath.$info['upload']['savepath'].$info['upload']['savename'];
			//echo $savepath;
			echo "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(".I('get.CKEditorFuncNum').",'$savepath','上传成功');</script>";
		}
	}
		
	
	
	
}
