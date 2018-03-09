<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "main_filter".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 *
 * @property ProductsMainFilter[] $productsMainFilters
 * @property Products[] $products
 */
class MainFilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
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
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsMainFilters()
    {
        return $this->hasMany(ProductsMainFilter::className(), ['main_filter_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'products_id'])->viaTable('products_main_filter', ['main_filter_id' => 'id']);
    }
}
