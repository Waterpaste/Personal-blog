<?php
// 本类由系统自动生成，仅供测试用途
namespace Adminls\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller {
    public function index(){
		$this->display('Index/login');
    }

    public function verity () {
		$verify = new Verify();
		$verify->length = 5;
		$verify->useCurve=false;
		$verify->entry();
	}

    public function login(){
    	if(IS_POST){
    		if(check_verify(I('post.code'))){
    			$username = I('post.name');
    			$passwd = I('post.password','','md5');
    			$user = M('Users');
    			if(!!$adminuser=$user->where("username='%s' and password='%s'",array($username,$passwd))->select()){
    				session('adminls', $adminuser[0]['username']);
    				session('id',$adminuser[0]['id']);
    				$this->redirect('/Adminls/Index/index');
    				
    			}else{
    				$this->error('用户名或密码错误',U('Adminls/Login/index'));
    			}
    		}else{
    			$this->error('验证码错误!',U('Adminls/Login/index'));
    		}
    	}else{
    		$this->error('非法访问',U('Adminls/Login/index'));
    	}
    }
    
    public function _empty(){
    	$this->error('非法操作');
    }
}