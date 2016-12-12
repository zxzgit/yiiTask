<?php
/**
 * Created by PhpStorm.
 * Author: zxz
 * Date: 2016/12/8 23:38
 */

namespace app\controllers;


namespace app\controllers;


use yii\web\Controller;

class ZxzController extends Controller {
	public $layout='zxzmain';
	
	public function actionIndex(){
		return $this->render('index');
	}

	public function actionError(){
		echo "this is zxz error action for error";
	}

	public function actionHello(){
		echo __METHOD__;
	}

	public function actionHelloWorld(){
		echo __METHOD__;
	}
}