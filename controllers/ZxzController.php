<?php
/**
 * Created by PhpStorm.
 * Author: zxz
 * Date: 2016/12/8 23:38
 */

namespace app\controllers;


namespace app\controllers;


use app\models\giicreate\Country;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ZxzController extends Controller {
	public $layout='zxzmain';
	
	public function actionIndex(){
		$start=-microtime(true);
		$countries = Country::find()->orderBy('name')->all();
		echo $comsumeTime=microtime(true)+$start;echo "<br>";
		
		$start=-microtime(true);
		$posts = \Yii::$app->db->createCommand('SELECT * FROM country')->queryAll();
		echo $comsumeTime=microtime(true)+$start;echo "<br>";
		
		//上面两种插叙方式，第一种耗时是第二种的四十几倍？
		
		return $this->render('index');
	}
	
	public function actionError()
	{
		$exception = \Yii::$app->errorHandler->exception;
		
		if ($exception !== null) {
			return $this->render('error', ['exception' => $exception]);
		}
	}

	public function actionHello(){
		throw new NotFoundHttpException();
		echo __METHOD__;
	}

	public function actionHelloWorld(){
		\Yii::$app->on();
		echo __METHOD__;
	}
	
	public function actionAnotherFormat(){
		$response = \Yii::$app->response;
		$response->format = \yii\web\Response::FORMAT_JSON;
		$response->data = ['message' => 'hello world','status'=>1];
//		$response->send();
	}
}