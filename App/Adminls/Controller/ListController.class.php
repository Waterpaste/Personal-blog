<?php
namespace Adminls\Controller;
use Think\Controller;
use Think\Page;
class ListController extends Controller{
	public function index(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$listpg = A('Common/Page');
		$list = $listpg->pages('Adminls/Listarticle',6,'date desc');
		$list = str($list,'note',5,'utf-8');
		
		//print_r($list);
		$this->assign('list',$list);
		$this->display('list');
	}
	
	/*
	 * 增加*/
	public function add(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$catesdb = M('Cates');
		$cates = $catesdb->select();
		$this->assign('cates',$cates);
		$this->assign('username',session('adminls'));
		$this->display('listadd');
	}
	
	public function addattr(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$list = D('Posts');
 		//print_r($list->create());
	    if(!$db=$list->create()){
	    	$this->error($list->getError());
	    }else{
	    	$db['date'] =date("Y-m-d H:i:s");
	    	//print_r($db); 
	    	if($list->add($db)){
	    		$this->success('添加成功');
	    	}else {
	    		$this->error('添加失败');
	    	}
	    }
	    
	}
	/*
	 * 修改*/
	public function update(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$id = I('get.id');
		$listdb = D('Adminls/Listarticle');
		$list = $listdb->where('id=%d',array($id))->select();
		$cate_id = I('get.cate_id');
		//print_r($list);
		
		$nav = M('Cates');
		//$childnav = $listdb->relation('childnav')->select();
		if(!!$childnav = $nav->select()){
			
			foreach ($childnav as $_object){
				//print_r($_object);
				if($cate_id == $_object['id']) $_selected = 'selected="selected"';
				$_html .= '<option '.$_selected.' value="'.$_object['id'].'">'.$_object['title'].'</option>'."\r\n";
				$_selected ='';
				
			}
		}
		
		$_html .= '</optgroup>';
		//echo $_html;
		$this->assign('nav',$_html);
		$this->assign('list',$list);
		$this->display('listupdate');	
	}
	
	public function listupdate(){
		if(!(session('adminls') and session('id'))) $this->error('非法操作');
		$list = D('Posts');
		if(!!$db = $list->create()){
			//$db['date'] =date("Y-m-d H:i:s");
			//print_r($db);
			if($list->save($db)){
				$this->success('修改成功',U('Adminls/List/index'));
			}else {
				$this->error('修改失败');
			}
		}else{
			$this->error($list->getError());
		}
	}
	
	/*
	 * 删除*/
	public function delete(){
		$id = I('get.id');
		$listdb = M('Posts');
		if($listdb->where('id=%d',array($id))->delete()){
			$this->success('删除成功');
		}else {
			$this->error('删除失败');
		}
	}
	
	/*
	 * 删除一个页面*/
	public function deletes(){
		if ($_POST['deletes']) {
			$listdb = M('Posts');
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
}