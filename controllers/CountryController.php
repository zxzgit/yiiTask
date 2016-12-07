<?php

namespace app\controllers;

use Yii;
use app\models\giicreate\Country;
use app\models\giicreate\CountrySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\ActionTimeFilter;


/**
 * CountryController implements the CRUD actions for Country model.
 */
class CountryController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post','delete'],
                ],
            ],
			'actionTime'=>[
				'class'=> ActionTimeFilter::className(),
			]
        ];
    }

    /**
     * Lists all Country models.
     * @return mixed
     */
    public function actionIndex()
    {
		Yii::$app->view->on(\yii\web\View::EVENT_END_BODY, function () {
			echo date('Y-m-d');
		});
//        echo date('Y-m-d H:i:s');
//        print_r(Yii::$app->request->post());
        $searchModel = new CountrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//		print_r($dataProvider->query->all());
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Country model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
		$query=Country::find();
		$result=$query->all();
		foreach ($result as $resultKey => $resultVal) {
			echo "data:".$resultVal['code']."\r\n";
		}
		
		print_r($this->findModel($id)->toArray());
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Country model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Country();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Country model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Country model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	/**
	 * zxz standalone action
	 * @return array
	 */
	public function actions()
	{
		return [
			'customize' => [//@link http://domain.com/country/customize/
				'class' => 'app\components\CustomizeViewAction',
			],
			'myaction' => [//@link http://domain.com/country/myaction/
				'class' => 'app\components\CustomizeAction',
			],
		];
	}
}
