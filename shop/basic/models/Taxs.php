<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "taxs".
 *
 * @property integer $StateId
 * @property integer $Tax
 */
class Taxs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taxs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StateId', 'Tax'], 'required'],
            [['StateId', 'Tax'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'StateId' => 'State ID',
            'Tax' => 'Tax',
        ];
    }
}
