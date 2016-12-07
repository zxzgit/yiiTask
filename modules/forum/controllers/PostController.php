<?php
/**
 * Created by PhpStorm.
 * User: zxz
 * Date: 2016/12/6
 * Time: 22:07
 */
namespace app\modules\forum\controllers;

use yii\web\Controller;
use Yii;

class PostController extends Controller
{
	public function actionIndex(){
		echo "hello world".Yii::$app->controller->module->id;
	}
	public function actionHello(){
		echo "I'm PostController actionHello();";
	}
}