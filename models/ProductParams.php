<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_params".
 *
 * @property int $id
 * @property string $name
 *
 * @property ProductsProductParams[] $productsProductParams
 * @property Products[] $products
 */
class ProductParams extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_params';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsProductParams()
    {
        return $this->hasMany(ProductsProductParams::className(), ['product_params_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'products_id'])->viaTable('products_product_params', ['product_params_id' => 'id']);
    }
}
