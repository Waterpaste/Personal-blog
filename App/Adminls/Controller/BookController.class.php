<?php
namespace Adminls\Controller;
use Think\Controller;
class BookController extends Controller{
	public function index(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$this->show();
		$this->display('Index/book');
	}
	
	protected function show(){
		$showdb = A('Common/Page');
		$showdb->page('Comments',6,'show','date desc');
	}
	
	public function delete(){
		$id = I('get.id');
		$list = M('Comments');
		if(!!$value = $list->where('id=%d',array($id))->delete()){
			$this->success('删除成功');
		}else {
			$this->error('删除失败');
		}
	}
	
	/*
	 * 删除一个页面*/
	public function deletes(){
		if ($_POST['deletes']) {
			$listdb = M('Comments');
			//print_r(I('post.id'));
			$id = I('post.id');
			$where['id']=array('in',$id);
			//print_r($where);
			if($listdb->where($where)->delete()){
				$this->success('nice');
			}else{
				$this->error('pass');
			}
		}else {
			$this->error('你特么的又非法操作');
		}
	
	}
	public function _empty(){
		$this->error('非法操作');
	}
}