<?php
namespace Adminls\Controller;
use Think\Controller;
class FriendController extends Controller{
	public function index(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$friend = A('Common/page');
		$friend->page('Friends',7,'friend','id');
		
		$this->display('friend');
	}
	
	public function add(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$this->display('friendadd');
	}
	
	/*增加*/
	public function addattr(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$frienddb = D('Friends');
		if(!!$user=$frienddb->create()){
			if($frienddb->add()){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}else {
			$this->error($frienddb->getError());
		}
	
	}
	
	public function update(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		if(IS_GET){
			$id = I('get.id');
			$list = M('Friends');
			if(!!$result=$list->where('id=%d',array($id))->select()){
				foreach ($result as $value){
					$this->assign('id',$value['id']);
					$this->assign('f_title',$value['f_title']);
					$this->assign('f_url',$value['f_url']);
				}
			}else{
				$this->error('对不起，此ID不存在');
			}
		}else{
			$this->error('非法操作');
		}
		$this->display('friendupdate');
	}
	
	public function friendupdate(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		if(IS_POST){
			$list = D('Friends');
			$list->create();
			if($list->save()){
				$this->success('修改成功',U('Adminls/Friend/index'));
			}else{
				$this->error('对不起修改失败');
			}
		}else {
			$this->error('非法操作');
		}
	}
	
	public function delete(){
		$id = I('get.id');
		$list = M('Friends');
		if(!!$value = $list->where('id=%d',array($id))->delete()){
			$this->success('删除成功');
		}else {
			$this->error('删除失败');
		}
	}
	
	public function _empty(){
		$this->error('非法操作');
	}
}