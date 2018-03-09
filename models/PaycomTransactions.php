<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paycom_transactions".
 *
 * @property int $id
 * @property string $paycom_transaction_id
 * @property string $paycom_time
 * @property string $paycom_time_datetime
 * @property string $create_time
 * @property string $perform_time
 * @property string $cancel_time
 * @property int $amount
 * @property int $state
 * @property int $reason
 * @property int $order_id
 *
 * @property Orders $order
 */
class PaycomTransactions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paycom_transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paycom_transaction_id', 'paycom_time_datetime', 'create_time', 'amount', 'state', 'order_id'], 'required'],
            [['paycom_time_datetime', 'create_time', 'perform_time', 'cancel_time'], 'safe'],
            [['amount', 'state', 'reason', 'order_id'], 'integer'],
            [['paycom_transaction_id'], 'string', 'max' => 25],
            [['paycom_time'], 'string', 'max' => 13],
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
            'paycom_transaction_id' => 'Paycom Transaction ID',
            'paycom_time' => 'Paycom Time',
            'paycom_time_datetime' => 'Paycom Time Datetime',
            'create_time' => 'Create Time',
            'perform_time' => 'Perform Time',
            'cancel_time' => 'Cancel Time',
            'amount' => 'Amount',
            'state' => 'State',
            'reason' => 'Reason',
            'order_id' => 'Order ID',
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
