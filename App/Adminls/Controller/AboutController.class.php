<?php
namespace Adminls\Controller;
use Think\Controller;
class AboutController extends Controller{
	public function index(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作','/Adminls/Login/index');
		$Aboutdb = M('About');
		$about = $Aboutdb->select();
		$this->assign('about',$about);
		$this->display('Index/about');
	}
	
	public function update(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$id = I('post.id');
		if(IS_POST){
			$aboutdb = M('About');
				if($aboutdb->where('id=%d',array($id))->save(I())){
					$this->success('修改成功',U('About/index'));
				}else {
					$this->error('修改失败');
				}
		}else {
			$this->error('非法操作');
		}
	}
	public function _empty(){
		$this->error('非法操作');
	}
	
}