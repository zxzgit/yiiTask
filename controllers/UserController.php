<?php
/**
 * Created by PhpStorm.
 * Author: zxz
 * Date: 2016/12/24 19:08
 */

namespace app\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
	public $modelClass = 'app\models\common\User';
}