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
			[['tid', 'title', 'keyword', 'content'], 'required'],//在创建新文章的时候必须输入的字段
			[['tid', 'uid', 'pv', 'uv', 'ip'], 'integer'],
			[['tid', 'title', 'keyword', 'content', 'addtime', 'mtime', 'uid', 'pv', 'uv', 'ip'], 'safe'],//可以通过model对象赋值
		];
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