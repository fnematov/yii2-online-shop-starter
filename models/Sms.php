<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sms".
 *
 * @property int $id
 * @property string $phone
 * @property int $sms
 * @property int $try_count
 * @property int $send_at
 */
class Sms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'sms'], 'required'],
            [['sms', 'try_count', 'send_at'], 'integer'],
            [['phone'], 'string', 'max' => 255],
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
            'sms' => 'Sms',
            'try_count' => 'Try Count',
            'send_at' => 'Send At',
        ];
    }
}
