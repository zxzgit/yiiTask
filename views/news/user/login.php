<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/22 17:10
 */

/* @var $model */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

echo "这个是登录页面的view层";
?>


<?php $form = ActiveForm::begin([
	'id'                   => 'login',
	'enableAjaxValidation' => false,
	'options'              => ['enctype' => 'multipart/form-data']
]); ?>

<?= $form->field($model, 'username')->textInput(["placeholder" => "账号"]); ?>
<?= $form->field($model, 'password')->passwordInput(['placeholder' => '密码']); ?>
<!--            --><? //=$form->field($model,'verifyCode')->widget(Captcha::className(),['captchaAction'=>Yii::$app->urlManager->createUrl('image/captcha'),
//                'template'=>'<div class="row"><div class="col-md-3 col-xs-4 mr20">{image}</div><div class="col-md-6 col-xs-6">{input}</div></div>'
//            ])?>
<?= Html::submitButton('登录', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'submit-button']) ?>
<?php ActiveForm::end(); ?>
