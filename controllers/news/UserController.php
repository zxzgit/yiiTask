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
	public $layout='zxzmain.php';
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
						'actions' => ['logout','index','login'],
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
		$userForm = new UserForm();
		if (($userForm->load(\Yii::$app->request->post()) && $userForm->login()) || !\Yii::$app->user->isGuest) {
			//登录成功
			$redirect=\Yii::$app->request->get('redirect');
			return $this->redirect($redirect?$redirect:['news/user/index']);
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
		return $this->redirect(['news/user/login']);
	}
	
	public function actionSignup() {
		
	}

	public function actionAbout(){
		return $this->render('about');
	}

	public function actionContact(){
		return $this->render('contact');
	}
	
}