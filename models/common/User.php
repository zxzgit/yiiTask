<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/22 16:19
 */

namespace app\models\common;

use yii\db\ActiveRecord;
use yii\db\Command;
use yii\helpers\Url;
use yii\web\IdentityInterface;
use yii\web\Link;
use yii\web\Linkable;

class User extends ActiveRecord implements IdentityInterface, Linkable {
	public static function tableName() {
		return 'zxz_user';
	}
	
	/**
	 * Finds an identity by the given ID.
	 * @param string|int $id the ID to be looked for
	 * @return IdentityInterface|null the identity object that matches the given ID.
	 */
	public static function findIdentity($id) {
		return static::findOne($id);
	}
	
	/**
	 * Finds an identity by the given token.
	 * @param string $token the token to be looked for
	 * @return IdentityInterface|null the identity object that matches the given token.
	 */
	public static function findIdentityByAccessToken($token, $type = null) {
		return static::findOne(['access_token' => $token]);
	}
	
	/**
	 * @return int|string current user ID
	 */
	public function getId() {
		return $this->uid;
	}
	/**
	 * @return int|string current username
	 */
	public function getUsername() {
		return $this->username;
	}
	
	/**
	 * @return string current user auth key
	 */
	public function getAuthKey() {
		return $this->auth_key;
	}
	
	/**
	 * @param string $authKey
	 * @return bool if auth key is valid for current user
	 */
	public function validateAuthKey($authKey) {
		return $this->getAuthKey() === $authKey;
	}

	public function fields()
	{
		return ['id'=>'uid', 'name'=>'username'];
	}

	public function extraFields()
	{
		return ['sex','access_token'];
	}

	public function getLinks()
	{
		return [
				Link::REL_SELF => Url::to(['users/', 'id' => $this->id], true),
		];
	}
}