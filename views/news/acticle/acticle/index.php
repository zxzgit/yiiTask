<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\news\ActicleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $tagList array 标签列表 */
Yii::$app->session->setFlash('tagList',$tagList);
$this->title = '文章';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acticle-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'aid',
            [
                'class'=>'yii\grid\DataColumn',
                'value'=>function($data){
                    $tagList=Yii::$app->session->getFlash('tagList');
                    return isset($tagList[$data->tid])?$tagList[$data->tid]['tagname']:'没有tag';
                },
                'label'=>'标签'
            ],
            'title',
            'keyword',
//            'content:ntext',
            // 'addtime',
            // 'mtime',
            // 'uid',
            // 'pv',
            // 'uv',
            // 'ip',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
