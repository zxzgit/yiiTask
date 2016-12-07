<?php
/**
 * Created by PhpStorm.
 * User: zxz
 * Date: 2016/12/6
 * Time: 22:04
 */
namespace app\modules\forum;
use Yii;

class Module extends \yii\base\Module
{
	public function init()
	{
		parent::init();

		$this->params['foo'] = 'bar';
		// ...  other initialization code ...
		Yii::configure($this, require(__DIR__ . '/config/config.php'));
	}
}