<?php

namespace app\controllers\news\acticle;

use Yii;
use app\models\news\Acticle;
use app\models\news\ActicleSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActicleController implements the CRUD actions for Acticle model.
 */
class ActicleController extends Controller
{
    public $layout='zxzmain.php';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Acticle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActicleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$tagList=$this->getTagList();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tagList' => $tagList,
        ]);
    }

    /**
     * Displays a single Acticle model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
			'tagList' => $this->getTagList(),
		]);
    }

    /**
     * Creates a new Acticle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		!Yii::$app->user->getId() && $this->redirect(['news/user/login']);
        $model = new Acticle();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$dateTime=date('Y-m-d H:i:s');
			$model->setAttributes([
				'addtime'=>$dateTime,
				'mtime'=>$dateTime,
				'uid'=>Yii::$app->user->getId(),
				'pv'=>0,
				'uv'=>0,
				'ip'=>0,
			]);
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->aid]);
			}
        } else {
            return $this->render('create', [
                'model' => $model,
				'tagList'=>$this->getTagList()
            ]);
        }
    }

    /**
     * Updates an existing Acticle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$model->mtime=date('Y-m-d H:i:s');
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->aid]);
			}
        } else {
            return $this->render('update', [
                'model' => $model,
				'tagList'=>$this->getTagList()
			]);
        }
    }

    /**
     * Deletes an existing Acticle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Acticle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Acticle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
		$findCondition=['aid'=>$id,'uid'=>Yii::$app->user->getId()];//只可查看、删除、更新自己的文章
        if (($model = Acticle::findOne($findCondition)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	/**
	 * 获取标签
	 * @return array
	 */
    protected function getTagList(){
		return (new Query())->from('{{%tag}}')->indexBy('tid')->all();
	}
}
