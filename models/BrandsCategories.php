<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brands_categories".
 *
 * @property int $brands_id
 * @property int $categories_id
 * @property int $status
 *
 * @property Brands $brands
 * @property Categories $categories
 */
class BrandsCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brands_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brands_id', 'categories_id'], 'required'],
            [['brands_id', 'categories_id', 'status'], 'integer'],
            [['brands_id', 'categories_id'], 'unique', 'targetAttribute' => ['brands_id', 'categories_id']],
            [['brands_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['brands_id' => 'id']],
            [['categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['categories_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'brands_id' => 'Brands ID',
            'categories_id' => 'Categories ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrands()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brands_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(Categories::className(), ['id' => 'categories_id']);
    }
}
