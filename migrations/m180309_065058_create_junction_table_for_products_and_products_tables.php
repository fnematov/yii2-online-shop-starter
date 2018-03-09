<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products_products`.
 * Has foreign keys to the tables:
 *
 * - `products`
 */
class m180309_065058_create_junction_table_for_products_and_products_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products_relations', [
            'product_id' => $this->integer(),
            'related_product_id' => $this->integer(),
            'PRIMARY KEY(product_id, related_product_id)',
        ]);

        // creates index for column `products_id`
        $this->createIndex(
            'idx-products_relations-product_id',
            'products_relations',
            'product_id'
        );

        // creates index for column `products_id`
        $this->createIndex(
            'idx-products_relations-related_product_id',
            'products_relations',
            'related_product_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-products_relations-product_id',
            'products_relations',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-products_relations-related_product_id',
            'products_relations',
            'related_product_id',
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
        // drops foreign key for table `products`
        $this->dropForeignKey(
            'fk-products_relations-product_id',
            'products_relations'
        );

        // drops foreign key for table `products`
        $this->dropForeignKey(
            'fk-products_relations-related_product_id',
            'products_relations'
        );

        // drops index for column `products_id`
        $this->dropIndex(
            'idx-products_relations-product_id',
            'products_relations'
        );

        // drops index for column `products_id`
        $this->dropIndex(
            'idx-products_relations-related_product_id',
            'products_relations'
        );

        $this->dropTable('products_relations');
    }
}
