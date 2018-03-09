<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_sort_attrs".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string $sort_data
 */
class ProductSortAttrs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_sort_attrs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sort_data'], 'required'],
            [['status'], 'integer'],
            [['name', 'sort_data'], 'string', 'max' => 255],
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
            'sort_data' => 'Sort Data',
        ];
    }
}
