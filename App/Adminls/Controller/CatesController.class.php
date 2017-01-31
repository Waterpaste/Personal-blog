<?php
namespace Adminls\Controller;
use Think\Controller;
use Think\Page;
use Common;
class CatesController extends Controller{
	public function index(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$catepage = A('Common/page');
		$catepage->page('Cates',6,'cates','id');
		
		
		$this->display('cates');
	}
	
	public function add(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$this->display('catesadd');
	}
	/*增加*/
	public function addattr(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$list = D('Cates');
		if(!!$user=$list->create()){
			if($list->add()){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}else {
			$this->error($list->getError());
		}
		
	}
	
	/*删除*/
	public function delete(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$id = I('get.id');
		$list = M('Cates');
		if(!!$value = $list->where('id=%d',array($id))->delete()){
			$this->success('删除成功');
		}else {
			$this->error('删除失败');
		}	
	}
	
	/*修改*/
	public function update(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');			
		if(IS_GET){
			$id = I('get.id');
			$list = D('Cates');
			if(!!$result=$list->where('id=%d',array($id))->select()){
				foreach ($result as $value){
					$this->assign('id',$value['id']);
					$this->assign('title',$value['title']);
					$this->assign('s_desc',$value['s_desc']);
				}
			}else{
				$this->error('对不起，此ID不存在');
			}
		}else{
			$this->error('非法操作');
		}
		$this->display('catesupdate');
	}
	
	public function listupdate(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		if(IS_POST){
			$list = D('Cates');
			$list->create();
			if($list->save()){
				$this->success('修改成功',U('Adminls/Cates/index'));
			}else{
				$this->error('对不起修改失败');
			}
		}else {
			$this->error('非法操作');
		}
	}
	
	public function _empty(){
		$this->error('非法操作');
	}
}