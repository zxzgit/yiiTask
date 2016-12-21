<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/21 10:50
 */

namespace app\controllers\news;


use app\models\news\User;
use yii\data\Pagination;
use yii\web\Controller;
use yii\filters\AccessControl;

class UserController extends Controller {
	function actionIndex() {
		echo "hello world" . __METHOD__;
		$query = User::find();
		
		$pagination = new Pagination([
			'defaultPageSize' => 1,
			'totalCount'      => $query->count(),
		]);
		
		$countries = $query->orderBy('uid')
			->offset($pagination->offset)
			->limit($pagination->limit)
			->all();
		
		return $this->render('index', [
			'countries'  => $countries,
			'pagination' => $pagination,
		]);
	}
	
	
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['login', 'logout', 'signup'],
				'rules' => [
					[
						'allow' => true,
						'actions' => ['login', 'signup'],
						'matchCallback' => function ($rule, $action) {
							return date('d-m') === '21-12';
						}
					],
					[
						'allow' => true,
						'actions' => ['logout'],
						'roles' => ['@'],
					],
				],
			],
		];
	}
	
	public function actionLogin(){
		echo "this is login";
	}
	public function actionLogout(){
		echo "this is logout";
	}
	
}