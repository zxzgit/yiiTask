<?php
/**
 * Created by PhpStorm.
 * User: zxz
 * Date: 2016/12/3
 * Time: 6:01
 */
namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
	public $name;
	public $email;

	public function rules()
	{
		return [
			[['name', 'email'], 'required'],
			['email', 'email'],
		];
	}
}