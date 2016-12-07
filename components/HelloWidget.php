<?php
/**
 * Created by PhpStorm.
 * Author: zxz
 * Date: 2016/12/7 21:57
 */

namespace app\components;


use yii\base\Widget;
use yii\helpers\Html;

class HelloWidget extends Widget {
	public function init()
	{
		parent::init();
//		ob_start();
	}

	public function run()
	{
//		$content = ob_get_clean();
//		return Html::encode($content);
		return $this->render('hello');
	}
}