<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/21 10:54
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;

//$this->title = 'Countries';
$this->title=Yii::$app->user->identity->getUsername().' 个人主页';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>hello world</h1>



