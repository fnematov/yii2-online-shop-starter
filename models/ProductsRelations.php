<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_relations".
 *
 * @property int $product_id
 * @property int $related_product_id
 *
 * @property Products $product
 * @property Products $relatedProduct
 */
class ProductsRelations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_relations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'related_product_id'], 'required'],
            [['product_id', 'related_product_id'], 'integer'],
            [['product_id', 'related_product_id'], 'unique', 'targetAttribute' => ['product_id', 'related_product_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['related_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['related_product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'related_product_id' => 'Related Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelatedProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'related_product_id']);
    }
}
