<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/7 15:33
 */

namespace app\components;


use yii\web\ViewAction;

class CustomizeViewAction extends ViewAction {
	public function run()
	{
		return $this->render('customize');
	}
}