<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property integer $population
 */
class Customer extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return parent::rules();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
		return parent::attributes();
	}
}
