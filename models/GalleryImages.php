<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery_images".
 *
 * @property int $id
 * @property string $img
 * @property int $gallery_id
 *
 * @property PhotoGallery $gallery
 */
class GalleryImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img', 'gallery_id'], 'required'],
            [['gallery_id'], 'integer'],
            [['img'], 'string', 'max' => 255],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => PhotoGallery::className(), 'targetAttribute' => ['gallery_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'gallery_id' => 'Gallery ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(PhotoGallery::className(), ['id' => 'gallery_id']);
    }
}
