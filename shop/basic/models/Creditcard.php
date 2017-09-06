<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "creditcard".
 *
 * @property integer $CreditId
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property integer $CustomerId
 * @property integer $StateId
 * @property string $City
 * @property string $Street
 * @property string $Zipcode
 * @property string $DueTime
 * @property string $SecureNumber
 *
 * @property Customers $customer
 * @property Orders[] $orders
 */
class Creditcard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'creditcard';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CreditId', 'FirstName', 'LastName', 'StateId', 'City', 'Street', 'Zipcode', 'DueTime', 'SecureNumber'], 'required'],
            [['CreditId', 'CustomerId', 'StateId'], 'integer'],
            [['DueTime'], 'safe'],
            [['SecureNumber'], 'number'],
            [['FirstName', 'MiddleName', 'LastName'], 'string', 'max' => 10],
            [['City'], 'string', 'max' => 15],
            [['Street'], 'string', 'max' => 50],
            [['Zipcode'], 'string', 'max' => 12],
            [['CustomerId'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['CustomerId' => 'CustomerId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CreditId' => 'Credit ID',
            'FirstName' => 'First Name',
            'MiddleName' => 'Middle Name',
            'LastName' => 'Last Name',
            'CustomerId' => 'Customer ID',
            'StateId' => 'State ID',
            'City' => 'City',
            'Street' => 'Street',
            'Zipcode' => 'Zipcode',
            'DueTime' => 'Due Time',
            'SecureNumber' => 'Secure Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customers::className(), ['CustomerId' => 'CustomerId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['CreditId' => 'CreditId']);
    }

    public function beforeSave($insert)
    {
        $this->CustomerId = $_COOKIE['id'];
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
