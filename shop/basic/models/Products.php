<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $ProductId
 * @property string $ProductName
 * @property string $ProductType
 * @property string $AdditionalInformation
 * @property string $ProductSize
 * @property string $ProductImagePath
 *
 * @property Ordering[] $orderings
 * @property Store[] $stores
 * @property Warehouses[] $warehouses
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductName', 'ProductType'], 'required'],
            [['ProductId'], 'integer'],
            [['ProductName'], 'string', 'max' => 50],
            [['ProductType'], 'string', 'max' => 15],
            [['AdditionalInformation', 'ProductImagePath'], 'string', 'max' => 200],
            [['ProductSize'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ProductId' => 'Product ID',
            'ProductName' => 'Product Name',
            'ProductType' => 'Product Type',
            'AdditionalInformation' => 'Additional Information',
            'ProductSize' => 'Product Size',
            'ProductImagePath' => 'Product Image Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderings()
    {
        return $this->hasMany(Ordering::className(), ['ProductId' => 'ProductId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasMany(Store::className(), ['ProductId' => 'ProductId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouses()
    {
        return $this->hasMany(Warehouses::className(), ['WarehouseId' => 'WarehouseId'])->viaTable('store', ['ProductId' => 'ProductId']);
    }
}
