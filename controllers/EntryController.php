<?php
/**
 * Created by PhpStorm.
 * User: zxz
 * Date: 2016/12/3
 * Time: 6:01
 */
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;
use app\models\Country;
use yii\data\Pagination;

class EntryController extends Controller {
	public $name;
	public $email;
	public $enableCsrfValidation = false;

	public function actionIndex() {
		$model = new EntryForm();

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			// valid data received in $model

			// do something meaningful here about $model ...

			return $this->render('entry-confirm', ['model' => $model]);
		} else {
			// either the page is initially displayed or there is some validation error
			return $this->render('entry', ['model' => $model]);
		}
	}

	public function actionGetCountry() {
		$query = Country::find();

		$pagination = new Pagination([
				'defaultPageSize' => 5,
				'totalCount' => $query->count(),
		]);

		$countries = $query->orderBy('name')
				->offset($pagination->offset)
				->limit($pagination->limit)
				->all();

		return $this->render('get-country', [
				'countries' => $countries,
				'pagination' => $pagination,
		]);
	}
}