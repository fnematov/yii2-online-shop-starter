<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video_gallery".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property string $meta_keywords
 * @property string $meta_description
 */
class VideoGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['name', 'description', 'url', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'url' => 'Url',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
        ];
    }
}
