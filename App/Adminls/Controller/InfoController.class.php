<?php
namespace Adminls\Controller;
use Think\Controller;
class InfoController extends Controller{
	public function index(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作','/Adminls/Login/index');
		$infodb = M('Info');
		$info = $infodb->select();
		$this->assign('info',$info);
		$this->display('info');
	}
	
	public function update(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作','/Adminls/Login/index');
		if(IS_POST){
			$infodb = D('Info');
			if(!!$db=$infodb->create()){
				//print_r($db);
				if($infodb->save()){
					$this->success('修改成功',U('Adminls/Info/index'));
				}else {
					$this->error('修改失败');
				}
			}else {
				$this->error($infodb->getError());
			}
		}else {
			$this->error('非法操作');
		}
	}
	
	public function upload(){
		$this->display('upload/upfile');
	}
	
	public function imgupload(){
		$config = array(
				'maxSize'=>3145728,
				'exts'=>array('jpg','jpeg','gif','png','bmp'),
				'rootPath'=>'./Uploads/',
				'autoSub'=>true,
		
		);
		
		$rootpath = substr($config['rootPath'],1);
		
		$upload = new \Think\Upload($config);//实例化上传类
		$info = $upload->upload();
		if (!$info) {
			echo "<script type='text/javascript'>alert('上传失败".$upload->getError()."');</script>";
		} else {
			$savepath =__ROOT__.$rootpath.$info['pic']['savepath'].$info['pic']['savename'];
			echo "<script type='text/javascript'>opener.document.infos.slogo.value='$savepath';</script>";
			echo "<script type='text/javascript'>opener.document.infos.slogo.data-image='$savepath';</script>";
			echo "<script type='text/javascript'>window.close();</script>";
			//print_r( $info);
		}
	}
	
	public function _empty(){
		$this->error('非法操作');
	}
}