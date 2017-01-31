<?php
// 本类由系统自动生成，仅供测试用途
namespace Adminls\Controller;
use Think\Controller;
class PassController extends Controller {
	//修改密码
	public function index(){
    	if(!(session('adminls') and session('id'))) $this->error('非法操作','/Adminls/Login/index');
    	$this->assign('adminuser',session('admin'));
    	$this->display('pass');
    }
    
    public function passmodify(){
    	if(!(session('adminls') and session('id'))) $this->error('非法操作','/Adminls/Login/index');
    	if(IS_POST){
    		$id = session('id');
    		$mpass = I('post.mpass','',md5);
    		$renewpass = I('post.renewpass','',md5);
    		$user = M('Users');
    		if(!!$value = $user->where("id=%d and password='%s'",array($id,$mpass))->setField('password',$renewpass)){
    			$this->success('修改成功');
    		}else{
    			$this->error('密码修改失败');
    		}
    	}
    	 
    }
    
    public function _empty(){
    	$this->error('非法操作');
    }
    //public function _empty(){
    //echo '非法操作';
    //}
}
