<?php
/**
 * Created by PhpStorm.
 * Author: zxz
 * Date: 2016/12/24 19:08
 */

namespace app\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class UserController extends ActiveController
{
	public $modelClass = 'app\models\common\User';
	
	public function init() {
		parent::init();
		\Yii::$app->user->enableSession = false;
		\Yii::$app->response->formatters=[
			\yii\web\Response::FORMAT_JSON => [
				'class' => 'yii\web\JsonResponseFormatter',
				'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
				'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
				// ...
			]
		];
	}
	
	public function checkAccess($action, $model = null, $params = [])
	{
		//todo something
//		echo $action;
	}
	
	public function behaviors()
	{
		$behaviors = parent::behaviors();
		$behaviors['authenticator'] = [
			'class' => CompositeAuth::className(),
			'authMethods' => [
				HttpBasicAuth::className(),
				HttpBearerAuth::className(),
				QueryParamAuth::className(),
			],
		];
		return $behaviors;
	}

}