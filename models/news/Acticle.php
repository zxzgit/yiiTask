<?php
/**
 * Created by PhpStorm.
 * Author: zxz
 * Date: 2016/12/22 22:25
 */

namespace app\models\news;


use yii\db\ActiveRecord;

class Acticle extends ActiveRecord {
	
	
	public static function tableName() {
		return '{{%acticle}}';
	}
	
	function rules() {
		return [
			[['tid', 'title', 'keyword', 'content'], 'required'],//在创建新文章的时候必须要有值，不能为空
			[['tid', 'uid', 'pv', 'uv', 'ip'], 'integer'],//注意，这里设置要是 integer,但是如果为空发现也可以
			[['tid', 'uid', 'pv', 'uv', 'ip'],'filter','filter'=>'intval'],//因为为空也可以通过 integer的限制 所以要过滤数据
			[['content','keyword'],'unique']
		];
	}

	public function scenarios()
	{
		$scenarios = parent::scenarios();
		$scenarios['create'] = ['tid', 'title', 'keyword', 'content'];//该场景只接收表单中这几个数据，其他数据不接收
		return $scenarios;
	}

	function attributeLabels() {
		return [
			'aid'     => '文章Id',
			'tid'     => '标签Id',
			'title'   => '标题',
			'keyword' => '关键字',
			'content' => '文章内容',
			'addtime' => '添加时间',
			'mtime'   => '最后修改时间',
			'uid'     => '发布者Id',
			'pv'      => '浏览量',
			'uv'      => '独立访问量',
			'ip'      => '独立Ip访问量',
		];
	}
	
	
}