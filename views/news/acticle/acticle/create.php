<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\news\Acticle */
/* @var $tagList array 标签信息数组 */

$this->title = '新建文章';
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acticle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tagList' => $tagList,
    ]) ?>

</div>
