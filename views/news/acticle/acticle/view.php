<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\news\Acticle */
/* @var $tagList array */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Acticles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acticle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->aid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->aid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'aid',
            [
                'label' => '标签',
                'value' => $tagList[$model->tid]?$tagList[$model->tid]['tagname']:'',
            ],
            'title',
            'keyword',
            'addtime',
            'mtime',
            'uid',
            'pv',
            'uv',
            'ip',
            'content:ntext',
            [
                'label' => '文章内容ee',
                'value' => $model->content,
                'format'=> 'ntext'
            ]
        ],
    ]) ?>
    
    <div>
        <?php
        echo $model->content;
        ?>
    </div>

</div>
