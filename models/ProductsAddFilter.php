<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_add_filter".
 *
 * @property int $products_id
 * @property int $add_filter_id
 *
 * @property AddFilter $addFilter
 * @property Products $products
 */
class ProductsAddFilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_add_filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['products_id', 'add_filter_id'], 'required'],
            [['products_id', 'add_filter_id'], 'integer'],
            [['products_id', 'add_filter_id'], 'unique', 'targetAttribute' => ['products_id', 'add_filter_id']],
            [['add_filter_id'], 'exist', 'skipOnError' => true, 'targetClass' => AddFilter::className(), 'targetAttribute' => ['add_filter_id' => 'id']],
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
            'add_filter_id' => 'Add Filter ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddFilter()
    {
        return $this->hasOne(AddFilter::className(), ['id' => 'add_filter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id' => 'products_id']);
    }
}
