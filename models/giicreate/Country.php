<?php

namespace app\models\giicreate;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property integer $population
 */
class Country extends \yii\db\ActiveRecord
{
	public $zxz='lekwlekl';
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
        return [
            [['code', 'name'], 'required'],
            [['population'], 'integer'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 52]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code的lable',
            'name' => 'Name的lable',
            'population' => 'Population的lable',
        ];
    }
    
    
	public function fields()
	{
		return [
			// field name is the same as the attribute name
			'code_alias'=>'code',
			
			
		];
	}
}
