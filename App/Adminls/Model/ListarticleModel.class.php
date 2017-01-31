<?php
namespace Adminls\Model;
use Think\Model\RelationModel;
class ListarticleModel extends RelationModel{
	protected $tableName = 'Posts';
	protected $_link= array(
			
			'list'=>array(
					'mapping_type'=>self::BELONGS_TO,// 设置关联模式，比如一对一 self::HAS_ONE
					'class_name'=>'Cates',
					'foreign_key'=>'cate_id',//关联外键的名称，会自动对应当前数据表的 id。
					//'class_name'=>'abc',//关联的模型类名，如果不写，会自动定位相关数据表。
					//'mapping_name'=>'cate_title',//关联映射名称，用于获取数据的数组名。
					'mapping_fields'=>'title',//关联要查询的字段，默认是查询所有。
					'as_fields'=>'title',//关联的字段映射成同级的字段
					
						

			),
			'childnav'=>array(
					'mapping_type'=>self::BELONGS_TO,// 设置关联模式，比如一对一 self::HAS_ONE
					'class_name'=>'Cates',
					'foreign_key'=>'cate_id',//关联外键的名称，会自动对应当前数据表的 id。
					//'class_name'=>'abc',//关联的模型类名，如果不写，会自动定位相关数据表。
					//'mapping_name'=>'cate_title',//关联映射名称，用于获取数据的数组名。
					//'mapping_fields'=>'title',//关联要查询的字段，默认是查询所有。
					//'as_fields'=>'title',//关联的字段映射成同级的字段
						
			
			
			),
	);
	

}