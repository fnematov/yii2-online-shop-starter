<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_main_filter".
 *
 * @property int $products_id
 * @property int $main_filter_id
 *
 * @property MainFilter $mainFilter
 * @property Products $products
 */
class ProductsMainFilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_main_filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['products_id', 'main_filter_id'], 'required'],
            [['products_id', 'main_filter_id'], 'integer'],
            [['products_id', 'main_filter_id'], 'unique', 'targetAttribute' => ['products_id', 'main_filter_id']],
            [['main_filter_id'], 'exist', 'skipOnError' => true, 'targetClass' => MainFilter::className(), 'targetAttribute' => ['main_filter_id' => 'id']],
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
            'main_filter_id' => 'Main Filter ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainFilter()
    {
        return $this->hasOne(MainFilter::className(), ['id' => 'main_filter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id' => 'products_id']);
    }
}
