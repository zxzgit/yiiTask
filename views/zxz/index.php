<?php
/**
 * Created by PhpStorm.
 * Author: zxz
 * Date: 2016/12/8 23:52
 */
//\app\assets\zxzAsset::register($this);
//\app\assets\helloPublishAsset::register($this);
echo "<br>I'm view ZxzController actionIndex()<br>";
$this->registerJsFile(
	'http://libs.baidu.com/jquery/1.9.1/jquery.min.js',
	['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerCssFile("@web/css/themes/black-and-white.css", [
//	'depends' => [\yii\bootstrap\BootstrapAsset::className()],
	'media' => 'print',
], 'css-print-theme');




