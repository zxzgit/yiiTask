<?php
/**
 * Created by PhpStorm.
 * Author: zxz
 * Date: 2016/12/8 23:38
 */

namespace app\controllers;


namespace app\controllers;


use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ZxzController extends Controller {
	public $layout='zxzmain';
	
	public function actionIndex(){
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