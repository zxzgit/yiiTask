<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/21 10:50
 */

namespace app\controllers\news;


use app\models\news\User;
use app\models\news\UserForm;
use yii\data\Pagination;
use yii\web\Controller;
use yii\filters\AccessControl;

class UserController extends Controller {
	
	public function behaviors() {
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only'  => ['login', 'logout', 'signup', 'index'],
				'rules' => [
					[
						'allow'   => true,
						'actions' => ['login', 'signup'],
						'roles'   => ['?'],
					],
					[
						'allow'   => true,
						'actions' => ['logout','index'],
						'roles'   => ['@'],
					],
				],
			],
		];
	}
	
	function actionIndex() {
		return $this->render('index');
	}
	
	
	public function actionLogin() {
		echo \Yii::$app->response->getCookies()->get('_cstf');
//		echo \Yii::$app->request->getCookies()->getValue('_csrf');exit;
		$userForm = new UserForm();
		if ($userForm->load(\Yii::$app->request->post()) && $userForm->login()) {
			//登录成功
			return $this->redirect(['news/user/index']);
		} else {
			//展示登录页面
			return $this->render('login', ['model' => $userForm]);
		}
	}
	
	public function actionLogout() {
		\Yii::$app->response->getCookies()->removeAll();
		if(\Yii::$app->user->logout()){
			echo "退出成功！";
		}else{
			echo "退出失败";
		}
	}
	
	public function actionSignup() {
		
	}
	
}