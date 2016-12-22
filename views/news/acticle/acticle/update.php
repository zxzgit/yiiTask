<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\news\Acticle */

$this->title = 'Update Acticle: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Acticles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->aid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acticle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
