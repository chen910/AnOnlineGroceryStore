<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "store".
 *
 * @property integer $ProductId
 * @property integer $WarehouseId
 * @property integer $Quantity
 *
 * @property Products $product
 * @property Warehouses $warehouse
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $WarehouseName;
    public static function tableName()
    {
        return 'store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductId', 'WarehouseId'], 'required'],
            [['ProductId', 'WarehouseId', 'Quantity'], 'integer'],
            [['ProductId'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['ProductId' => 'ProductId']],
            [['WarehouseId'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouses::className(), 'targetAttribute' => ['WarehouseId' => 'WarehouseId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ProductId' => 'Product ID',
            'WarehouseId' => 'Warehouse ID',
            'Quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['ProductId' => 'ProductId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouses::className(), ['WarehouseId' => 'WarehouseId']);
    }
}
