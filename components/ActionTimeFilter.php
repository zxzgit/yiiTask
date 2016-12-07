<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2016/12/7 10:02
 */

namespace app\components;

use Yii;
use yii\base\ActionFilter;

class ActionTimeFilter extends ActionFilter {
	private $_startTime;
	
	public function beforeAction($action)
	{
		$actionId = $action->id;
		$this->_startTime = microtime(true);
		return parent::beforeAction($action);
	}
	
	public function afterAction($action, $result)
	{
		$time = microtime(true) - $this->_startTime;
		Yii::trace("Action '{$action->uniqueId}' spent $time second.");
		return parent::afterAction($action, $result);
	}
}