<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders_products`.
 * Has foreign keys to the tables:
 *
 * - `orders`
 * - `products`
 */
class m180309_091741_create_junction_table_for_orders_and_products_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orders_products', [
            'orders_id' => $this->integer(),
            'products_id' => $this->integer(),
            'quantity' => $this->integer()->defaultValue(1),
            'discount' => $this->smallInteger(),
            'product_price' => $this->integer()->notNull(),
            'delivery_price' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(1),
            'PRIMARY KEY(orders_id, products_id)',
        ]);

        // creates index for column `orders_id`
        $this->createIndex(
            'idx-orders_products-orders_id',
            'orders_products',
            'orders_id'
        );

        // add foreign key for table `orders`
        $this->addForeignKey(
            'fk-orders_products-orders_id',
            'orders_products',
            'orders_id',
            'orders',
            'id',
            'CASCADE'
        );

        // creates index for column `products_id`
        $this->createIndex(
            'idx-orders_products-products_id',
            'orders_products',
            'products_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-orders_products-products_id',
            'orders_products',
            'products_id',
            'products',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `orders`
        $this->dropForeignKey(
            'fk-orders_products-orders_id',
            'orders_products'
        );

        // drops index for column `orders_id`
        $this->dropIndex(
            'idx-orders_products-orders_id',
            'orders_products'
        );

        // drops foreign key for table `products`
        $this->dropForeignKey(
            'fk-orders_products-products_id',
            'orders_products'
        );

        // drops index for column `products_id`
        $this->dropIndex(
            'idx-orders_products-products_id',
            'orders_products'
        );

        $this->dropTable('orders_products');
    }
}
