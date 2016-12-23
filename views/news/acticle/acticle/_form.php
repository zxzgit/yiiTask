<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\news\Acticle */
/* @var $form yii\widgets\ActiveForm */
/* @var $tagList array 标签数组 */
foreach ($tagList as $tagListKey =>&$tagListValue){
    $tagListValue=$tagListValue['tagname'];
}
?>

<div class="acticle-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'aid')->textInput() ?>

    <?= $form->field($model, 'tid')->dropDownList($tagList) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6,'style'=>'width:1140px;']) ?>

<!--    --><?//= $form->field($model, 'addtime')->textInput() ?>

<!--    --><?//= $form->field($model, 'mtime')->textInput() ?>

<!--    --><?//= $form->field($model, 'uid')->textInput() ?>

<!--    --><?//= $form->field($model, 'pv')->textInput() ?>

<!--    --><?//= $form->field($model, 'uv')->textInput() ?>

<!--    --><?//= $form->field($model, 'ip')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton('重置',['class' => 'btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
