<?php
/**
 * Created by PhpStorm.
 * Author: zxz
 * Date: 2016/12/22 22:25
 */

namespace app\models\news;


use yii\db\ActiveRecord;

class Acticle extends ActiveRecord{


	public static function tableName(){
		return '{{%acticle}}';
	}

	function rules() {
		return [
				[['tid', 'uid', 'pv', 'uv', 'ip'], 'integer'],
				[[ 'tid', 'uid', ],'required', 'on'=>'create'],
				[['title', 'keyword', 'content'], 'safe'],
				[['addtime','mtime'],'default','value'=>date('Y-m-d H:i:s')],
				[['pv', 'uv', 'ip'],'default','value'=>0],
				['uid','default','value'=>\Yii::$app->user->identity->getId()]
		];
	}

	function attributeLabels() {
		return [

		];
	}

	public function fields() {
		return [
			'标题'=>'title',
			'关键字'=>'keyword',
			'内容'=>'content',
		];
	}



}