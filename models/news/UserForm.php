<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/21 10:56
 */

namespace app\models\news;


use app\models\common\User;
use yii\db\ActiveRecord;
use yii\db\Query;

class UserForm extends ActiveRecord {
	public $_user = false;
	
	public static function tableName() {
		return '{{%user}}';
	}
	
	public function rules() {
		return [
			[['username', 'password'], 'required'],
			[['sex'], 'integer'],
			['username', 'string', 'max' => 50],
			['sex', 'integer', 'max' => 1],
			['username', 'filter', 'filter' => 'trim'],
			['password', 'validPassword', 'message' => '密码或者用户名错误！']
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'username' => '用户名',
			'password' => '密码',
		];
	}
	
	public function validPassword($attribute,$params) {
		$getUser = User::findOne([
			'username' => $this->username,
			'password' => $this->password,
		]);
		if (!$getUser) {
			$this->addError($attribute, '账号或密码不正确');
			return false;
		}
		$this->_user = $getUser;
		
		return true;
	}
	
	
	public function login() {
		if ($this->validate() && $this->_user) {
			//执行登录
			return \Yii::$app->user->login($this->_user, 30 * 60);
		} else {
			//登录验证失败
			return false;
		}
	}
	
}