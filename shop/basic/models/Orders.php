<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $OrderId
 * @property integer $CustomerId
 * @property integer $TotalPrice
 * @property string $IssueTime
 * @property integer $Status
 * @property integer $CreditId
 * @property integer $DiliverId
 *
 * @property Ordering[] $orderings
 * @property Creditcard $credit
 * @property Diliveraddress $diliver
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CustomerId'], 'required'],
            [['OrderId', 'CustomerId', 'TotalPrice', 'Status', 'CreditId', 'DiliverId'], 'integer'],
            [['IssueTime'], 'safe'],
            [['CreditId'], 'exist', 'skipOnError' => true, 'targetClass' => Creditcard::className(), 'targetAttribute' => ['CreditId' => 'CreditId']],
            [['DiliverId'], 'exist', 'skipOnError' => true, 'targetClass' => Diliveraddress::className(), 'targetAttribute' => ['DiliverId' => 'DiliverAddressId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'OrderId' => 'Order ID',
            'CustomerId' => 'Customer ID',
            'TotalPrice' => 'Total Price',
            'IssueTime' => 'Issue Time',
            'Status' => 'Status',
            'CreditId' => 'Credit ID',
            'DiliverId' => 'Diliver ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderings()
    {
        return $this->hasMany(Ordering::className(), ['OrderId' => 'OrderId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCredit()
    {
        return $this->hasOne(Creditcard::className(), ['CreditId' => 'CreditId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiliver()
    {
        return $this->hasOne(Diliveraddress::className(), ['DiliverAddressId' => 'DiliverId']);
    }
}
