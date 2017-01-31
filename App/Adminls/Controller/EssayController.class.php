<?php
namespace Adminls\Controller;
use Think\Controller;
class EssayController extends Controller{
	public function index(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$this->show();
		$this->display('essay');
	}
	
	protected function show(){
		$show = A('Common/Page');
		$show->page('Essay',6,'show','id desc');
	}
	
	public function add(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$this->assign('admin',session('adminls'));
		$this->display('essayadd');
	}
	public function addattr(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$essaydb = D('Essay');
		if(!!$user=$essaydb->create()){
			$user['pid']=0;
			$user['date'] = date("Y-m-d H:i:s");
			//print_r($user);
			if($essaydb->add($user)){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}else {
			$this->error($essaydb->getError());
		}
	}
	/*修改*/
	public function update(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		if(IS_GET){
			$id = I('get.id');
			$list = M('Essay');
			if(!!$result=$list->where('id=%d',array($id))->select()){
				foreach ($result as $value){
					$this->assign('id',$value['id']);
					$this->assign('author',$value['author']);
					$this->assign('content',$value['content']);
				}
			}else{
				$this->error('对不起，此ID不存在');
			}
		}else{
			$this->error('非法操作');
		}
		$this->display('essayupdate');
	}
	
	public function essayupdate(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		if(IS_POST){
			$list = D('Essay');
			$value = $list->create();
			$value['date']=date("Y-m-d H:i:s");
			if($list->save($value)){
				$this->success('修改成功',U('Adminls/Essay/index'));
			}else{
				$this->error('对不起修改失败');
			}
		}else {
			$this->error('非法操作');
		}
	}
	
	public function delete(){
		$id = I('get.id');
		$list = M('Essay');
		if(!!$value = $list->where('id=%d',array($id))->delete()){
			$this->success('删除成功');
		}else {
			$this->error('删除失败');
		}
	}
}