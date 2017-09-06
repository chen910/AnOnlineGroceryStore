<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordering".
 *
 * @property integer $OrderId
 * @property integer $CustomerId
 * @property integer $ProductId
 * @property integer $Quantity
 *
 * @property Orders $order
 * @property Customers $customer
 * @property Products $product
 */
class Ordering extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ordering';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['OrderId', 'CustomerId', 'ProductId'], 'required'],
            [['OrderId', 'CustomerId', 'ProductId', 'Quantity'], 'integer'],
            [['OrderId'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['OrderId' => 'OrderId']],
            [['CustomerId'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['CustomerId' => 'CustomerId']],
            [['ProductId'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['ProductId' => 'ProductId']],
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
            'ProductId' => 'Product ID',
            'Quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['OrderId' => 'OrderId']);
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
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['ProductId' => 'ProductId']);
    }
}
