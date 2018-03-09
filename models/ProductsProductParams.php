<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_product_params".
 *
 * @property int $products_id
 * @property int $product_params_id
 * @property string $value
 *
 * @property ProductParams $productParams
 * @property Products $products
 */
class ProductsProductParams extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_product_params';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['products_id', 'product_params_id', 'value'], 'required'],
            [['products_id', 'product_params_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['products_id', 'product_params_id'], 'unique', 'targetAttribute' => ['products_id', 'product_params_id']],
            [['product_params_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductParams::className(), 'targetAttribute' => ['product_params_id' => 'id']],
            [['products_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['products_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'products_id' => 'Products ID',
            'product_params_id' => 'Product Params ID',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductParams()
    {
        return $this->hasOne(ProductParams::className(), ['id' => 'product_params_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id' => 'products_id']);
    }
}
