<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $phone
 * @property string $working_days
 * @property string $working_times
 * @property string $info
 * @property string $map
 * @property string $address
 * @property string $meta_keywords
 * @property string $meta_description
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['info', 'map'], 'string'],
            [['phone'], 'string', 'max' => 55],
            [['working_days', 'working_times', 'address', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'working_days' => 'Working Days',
            'working_times' => 'Working Times',
            'info' => 'Info',
            'map' => 'Map',
            'address' => 'Address',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
        ];
    }
}
