<?php

namespace app\models;

use app\components\UploadBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "widget_carousel".
 *
 * @property int $id
 * @property string $img
 * @property string $url
 * @property string $small_caption
 * @property string $main_caption
 * @property string $content
 * @property int $status
 * @property int $order
 * @property string $key
 * @property int $created_at
 * @property int $updated_at
 */
class WidgetCarousel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName ()
    {
        return 'widget_carousel';
    }
    
    public function behaviors ()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => '\app\components\FileUploadBehaviour'
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return [
            [ [ 'img', 'key' ], 'required', 'on' => 'create' ],
            [ [ 'key' ], 'required', 'on' => 'update' ],
            [ [ 'content' ], 'string' ],
            [ [ 'order', 'created_at', 'updated_at' ], 'integer' ],
            [ [ 'status' ], 'boolean' ],
            [ [ 'url', 'small_caption', 'main_caption' ], 'string', 'max' => 255 ],
            [ [ 'key' ], 'string', 'max' => 55 ],
            [ [ 'img' ], 'file' ]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels ()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'url' => 'Url',
            'small_caption' => 'Small Caption',
            'main_caption' => 'Main Caption',
            'content' => 'Content',
            'status' => 'Status',
            'order' => 'Order',
            'key' => 'Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
