<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo_gallery".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $img
 * @property int $created_at
 * @property int $updated_at
 * @property string $meta_keywords
 * @property string $meta_description
 *
 * @property GalleryImages[] $galleryImages
 */
class PhotoGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'description', 'img', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
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
            'img' => 'Img',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryImages()
    {
        return $this->hasMany(GalleryImages::className(), ['gallery_id' => 'id']);
    }
}
