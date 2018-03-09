<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "click_transactions".
 *
 * @property int $id
 * @property int $order_id
 * @property int $click_trans_id
 * @property double $amount
 * @property int $click_paydoc_id
 * @property int $service_id
 * @property string $sign_time
 * @property int $status
 * @property int $create_time
 *
 * @property Orders $order
 */
class ClickTransactions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'click_transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'click_trans_id', 'amount', 'click_paydoc_id', 'service_id', 'sign_time', 'status', 'create_time'], 'required'],
            [['order_id', 'click_trans_id', 'click_paydoc_id', 'service_id', 'status', 'create_time'], 'integer'],
            [['amount'], 'number'],
            [['sign_time'], 'string', 'max' => 63],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'click_trans_id' => 'Click Trans ID',
            'amount' => 'Amount',
            'click_paydoc_id' => 'Click Paydoc ID',
            'service_id' => 'Service ID',
            'sign_time' => 'Sign Time',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }
}
