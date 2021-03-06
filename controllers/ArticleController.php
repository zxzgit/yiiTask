<?php
/**
 * Created by PhpStorm.
 * Author: zxz
 * Date: 2016/12/25 16:11
 */

namespace app\controllers;

use yii\rest\Controller;
use yii\data\ActiveDataProvider;
use app\models\news\Acticle;

class ArticleController extends Controller
{
	public function actionIndex()
	{
		return new ActiveDataProvider([
			'query' => Acticle::find()
		]);
	}

	public function actionView($id=false)
	{
		return Acticle::findOne($id);
	}
}