<?php
// 本类由系统自动生成，仅供测试用途
namespace Adminls\Controller;
use Think\Controller;
class IndexController extends Controller {
   	public function index(){
   		if(session('adminls') and session('id')){
   			$this->display();
   		}else{
   			$this->display('login');
   		}

   	}
   	
   	
   	//退出
   	public function logout(){
   		session(null);
   		$this->redirect('/Adminls/Login/index');
   	}
   	
   	
   	public function _empty(){
   		$this->error('非法操作');	
   	}
		
    
}