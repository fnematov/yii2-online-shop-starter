<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `user_delivery_address`
 * - `payment_types`
 */
class m180309_073455_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'amount' => $this->float()->notNull(),
            'state' => $this->smallInteger(1)->notNull(),
            'user_id' => $this->integer()->notNull(),
            'address_id' => $this->integer(),
            'start_date' => $this->integer(),
            'updated_date' => $this->integer(),
            'phone' => $this->string(55),
            'payment_type' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-orders-user_id',
            'orders',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-orders-user_id',
            'orders',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `address_id`
        $this->createIndex(
            'idx-orders-address_id',
            'orders',
            'address_id'
        );

        // add foreign key for table `user_delivery_address`
        $this->addForeignKey(
            'fk-orders-address_id',
            'orders',
            'address_id',
            'user_delivery_address',
            'id',
            'CASCADE'
        );

        // creates index for column `payment_type`
        $this->createIndex(
            'idx-orders-payment_type',
            'orders',
            'payment_type'
        );

        // add foreign key for table `payment_types`
        $this->addForeignKey(
            'fk-orders-payment_type',
            'orders',
            'payment_type',
            'payment_types',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-orders-user_id',
            'orders'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-orders-user_id',
            'orders'
        );

        // drops foreign key for table `user_delivery_address`
        $this->dropForeignKey(
            'fk-orders-address_id',
            'orders'
        );

        // drops index for column `address_id`
        $this->dropIndex(
            'idx-orders-address_id',
            'orders'
        );

        // drops foreign key for table `payment_types`
        $this->dropForeignKey(
            'fk-orders-payment_type',
            'orders'
        );

        // drops index for column `payment_type`
        $this->dropIndex(
            'idx-orders-payment_type',
            'orders'
        );

        $this->dropTable('orders');
    }
}
