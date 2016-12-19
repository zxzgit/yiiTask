<?php $this->beginContent('@app/views/layouts/zxzbase.php'); ?>

<?php $this->beginBlock('block1'); ?>

<br>...content of block1 hello world...<br>

<?php $this->endBlock(); ?>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\HelloWidget;
use app\assets\zxzAsset;
zxzAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel app\models\giicreate\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                // you may configure additional properties here
            ],
            ['class' => 'yii\grid\SerialColumn'],

            'code',
            'name',
            'population',

            ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'value' => function ($data) {
                    return $data->code.'-'.$data->name; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
                'label'=>'自定义组合行'
            ],
        ],
    ]); ?>

</div>

<?php HelloWidget::begin(); yii\grid\CheckboxColumn::className()?>

<!--content that may contain <tag>'s-->

<?php HelloWidget::end(); ?>

<?php $this->endContent(); ?>


