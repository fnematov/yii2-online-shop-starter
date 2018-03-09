<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "add_filter".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property string $code
 * @property int $main_status
 *
 * @property ProductsAddFilter[] $productsAddFilters
 * @property Products[] $products
 */
class AddFilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'add_filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id', 'main_status'], 'integer'],
            [['name', 'code'], 'string', 'max' => 255],
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
            'parent_id' => 'Parent ID',
            'code' => 'Code',
            'main_status' => 'Main Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAddFilters()
    {
        return $this->hasMany(ProductsAddFilter::className(), ['add_filter_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'products_id'])->viaTable('products_add_filter', ['add_filter_id' => 'id']);
    }
}
