<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warehouses".
 *
 * @property integer $WarehouseId
 * @property string $WarehouseName
 * @property string $WarehouseState
 * @property string $WarehouseCity
 * @property string $WarehouseAddress
 * @property string $Zipcode
 * @property integer $Capacity
 * @property integer $CurrentStore
 *
 * @property Store[] $stores
 */
class Warehouses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WarehouseId'], 'required'],
            [['WarehouseId', 'Capacity', 'CurrentStore'], 'integer'],
            [['WarehouseName'], 'string', 'max' => 20],
            [['WarehouseState'], 'string', 'max' => 2],
            [['WarehouseCity'], 'string', 'max' => 15],
            [['WarehouseAddress'], 'string', 'max' => 50],
            [['Zipcode'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'WarehouseId' => 'Warehouse ID',
            'WarehouseName' => 'Warehouse Name',
            'WarehouseState' => 'Warehouse State',
            'WarehouseCity' => 'Warehouse City',
            'WarehouseAddress' => 'Warehouse Address',
            'Zipcode' => 'Zipcode',
            'Capacity' => 'Capacity',
            'CurrentStore' => 'Current Store',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasMany(Store::className(), ['WarehouseId' => 'WarehouseId']);
    }
}
