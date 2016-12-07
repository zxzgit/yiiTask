<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/7 15:33
 */

namespace app\components;


use yii\base\Action;

class CustomizeAction extends Action {
	public function run()
	{
		return "hello world I'm extends yii base Action for standalone action";
	}
}