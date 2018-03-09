<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property double $amount
 * @property int $state
 * @property int $user_id
 * @property int $address_id
 * @property int $start_date
 * @property int $updated_date
 * @property string $phone
 * @property int $payment_type
 *
 * @property ClickTransactions[] $clickTransactions
 * @property UserDeliveryAddress $address
 * @property PaymentTypes $paymentType
 * @property User $user
 * @property OrdersProducts[] $ordersProducts
 * @property Products[] $products
 * @property PaycomTransactions[] $paycomTransactions
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'state', 'user_id'], 'required'],
            [['amount'], 'number'],
            [['state', 'user_id', 'address_id', 'start_date', 'updated_date', 'payment_type'], 'integer'],
            [['phone'], 'string', 'max' => 55],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserDeliveryAddress::className(), 'targetAttribute' => ['address_id' => 'id']],
            [['payment_type'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentTypes::className(), 'targetAttribute' => ['payment_type' => 'id']],
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
            'amount' => 'Amount',
            'state' => 'State',
            'user_id' => 'User ID',
            'address_id' => 'Address ID',
            'start_date' => 'Start Date',
            'updated_date' => 'Updated Date',
            'phone' => 'Phone',
            'payment_type' => 'Payment Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClickTransactions()
    {
        return $this->hasMany(ClickTransactions::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(UserDeliveryAddress::className(), ['id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentType()
    {
        return $this->hasOne(PaymentTypes::className(), ['id' => 'payment_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersProducts()
    {
        return $this->hasMany(OrdersProducts::className(), ['orders_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'products_id'])->viaTable('orders_products', ['orders_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaycomTransactions()
    {
        return $this->hasMany(PaycomTransactions::className(), ['order_id' => 'id']);
    }
}
