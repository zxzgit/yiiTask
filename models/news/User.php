<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/21 10:56
 */

namespace app\models\news;


use yii\db\ActiveRecord;
use yii\db\Query;

class User extends ActiveRecord {
	
	public static function tableName() {
		return 'zxz_user';
	}
	
	public function rules()
	{
		return [
			[['id', 'name'], 'required'],
			[['sex'], 'integer'],
			[['name'], 'string', 'max' => 50],
			[['sex'], 'integer', 'max' => 1]
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => '用户id',
			'name' => '用户名',
			'sex' => '性别',
		];
	}
	
	public function fields() {
		return [
			'username'=>'username',
			'密码'=>'password'
		];
	}
	
	public static function getUserInfo(){
		$startTime=-microtime(true);
		$dataList=self::find()->select('uid,username,sex')->all();
		echo $comsumeTime=microtime(true)+$startTime;
		
		echo "<br>";
		
		$startTime=-microtime(true);
//		$dataList=(new Query())->select('uid,username,sex')->from('zxz_user')->all();
		echo $comsumeTime=microtime(true)+$startTime;
		
		return $dataList;
	}
}