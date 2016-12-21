<?php
/**
 * Created by PhpStorm.
 * Author: zxz
 * Date: 2016/12/8 23:38
 */

namespace app\controllers;


namespace app\controllers;


use app\models\Customer;
use app\models\giicreate\Country;
use yii\data\ArrayDataProvider;
use yii\data\Sort;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\widgets\DetailView;

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
		
		$userQuery = (new Query())->from('country')
			->orderBy([
				'code' => SORT_ASC,
				'name' => SORT_DESC,
			])->indexBy('code')
			->all();
		
//		print_r($userQuery);
		
		
		
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
	
	public function actionCustomer(){
		echo "hello world".__METHOD__;
		$model=new Customer();
//		$model->
	}
	
	public function actionFormated(){
		$data = [
			['id' => 1, 'name' => 'name 1'],
			['id' => 2, 'name' => 'name 2'],
			['id' => 100, 'name' => 'name 100'],
		];
		
		$provider = new ArrayDataProvider([
			'allModels' => $data,
			'pagination' => [
				'pageSize' => 1,
			],
			'sort' => [
				'attributes' => ['id', 'name'],
			],
		]);

// get the rows in the currently requested page
		$rows = $provider->getModels();
		print_r($rows);
		print_r($ids = $provider->getKeys());
	}
	
	public function actionDetailView(){
		$model=Country::findOne(['code'=>'AU']);
		echo DetailView::widget([
			'model' => $model,
			'attributes' => [
				'code',                                           // title attribute (in plain text)
				'description:html',                                // description attribute formatted as HTML
				[                                                  // the owner name of the model
					'label' => 'Owner',
					'value' => $model->owner->name,
					'contentOptions' => ['class' => 'bg-red'],     // to HTML customize attributes of value tag
					'captionOptions' => ['tooltip' => 'Tooltip'],  // to HTML customize attributes of label tag
				],
				'created_at:datetime',                             // creation date formatted as datetime
			],
		]);
	}
}