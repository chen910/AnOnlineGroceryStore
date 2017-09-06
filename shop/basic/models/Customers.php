<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property integer $CustomerId
 * @property string $UserName
 * @property string $Passport
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property string $BirthYear
 * @property string $BirthMonth
 * @property string $BirthDay
 * @property integer $Balance
 * @property integer $defaultDiliverId
 *
 * @property Creditcard[] $creditcards
 * @property Ordering[] $orderings
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UserName', 'Passport'], 'required'],
            [['CustomerId', 'Balance', 'defaultDiliverId'], 'integer'],
            [['BirthYear', 'BirthMonth', 'BirthDay'], 'number'],
            [['UserName', 'Passport'], 'string', 'max' => 20],
            [['FirstName', 'MiddleName', 'LastName'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CustomerId' => 'Customer ID',
            'UserName' => 'User Name',
            'Passport' => 'Passport',
            'FirstName' => 'First Name',
            'MiddleName' => 'Middle Name',
            'LastName' => 'Last Name',
            'BirthYear' => 'Birth Year',
            'BirthMonth' => 'Birth Month',
            'BirthDay' => 'Birth Day',
            'Balance' => 'Balance',
            'defaultDiliverId' => 'Default Diliver ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreditcards()
    {
        return $this->hasMany(Creditcard::className(), ['CustomerId' => 'CustomerId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderings()
    {
        return $this->hasMany(Ordering::className(), ['CustomerId' => 'CustomerId']);
    }
}
