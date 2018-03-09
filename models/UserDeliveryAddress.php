<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_delivery_address".
 *
 * @property int $id
 * @property int $place_id
 * @property int $user_id
 * @property string $address
 * @property double $lat
 * @property double $lng
 * @property string $phone
 *
 * @property Orders[] $orders
 * @property Places $place
 * @property User $user
 */
class UserDeliveryAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_delivery_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_id', 'user_id', 'address', 'phone'], 'required'],
            [['place_id', 'user_id'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 55],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => Places::className(), 'targetAttribute' => ['place_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place_id' => 'Place ID',
            'user_id' => 'User ID',
            'address' => 'Address',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'phone' => 'Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['address_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Places::className(), ['id' => 'place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
