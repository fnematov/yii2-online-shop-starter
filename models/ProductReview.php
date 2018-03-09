<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_review".
 *
 * @property int $id
 * @property string $name
 * @property string $review
 * @property int $rate
 * @property int $created_at
 */
class ProductReview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['review'], 'string'],
            [['rate', 'created_at'], 'integer'],
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
            'review' => 'Review',
            'rate' => 'Rate',
            'created_at' => 'Created At',
        ];
    }
}
