<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders_products".
 *
 * @property int $orders_id
 * @property int $products_id
 * @property int $quantity
 * @property int $discount
 * @property int $product_price
 * @property int $delivery_price
 * @property int $status
 *
 * @property Orders $orders
 * @property Products $products
 */
class OrdersProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orders_id', 'products_id', 'product_price'], 'required'],
            [['orders_id', 'products_id', 'quantity', 'discount', 'product_price', 'delivery_price', 'status'], 'integer'],
            [['orders_id', 'products_id'], 'unique', 'targetAttribute' => ['orders_id', 'products_id']],
            [['orders_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orders_id' => 'id']],
            [['products_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['products_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orders_id' => 'Orders ID',
            'products_id' => 'Products ID',
            'quantity' => 'Quantity',
            'discount' => 'Discount',
            'product_price' => 'Product Price',
            'delivery_price' => 'Delivery Price',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Orders::className(), ['id' => 'orders_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id' => 'products_id']);
    }
}
