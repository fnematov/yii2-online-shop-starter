<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products_add_filter`.
 * Has foreign keys to the tables:
 *
 * - `products`
 * - `add_filter`
 */
class m180309_063649_create_junction_table_for_products_and_add_filter_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products_add_filter', [
            'products_id' => $this->integer(),
            'add_filter_id' => $this->integer(),
            'PRIMARY KEY(products_id, add_filter_id)',
        ]);

        // creates index for column `products_id`
        $this->createIndex(
            'idx-products_add_filter-products_id',
            'products_add_filter',
            'products_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-products_add_filter-products_id',
            'products_add_filter',
            'products_id',
            'products',
            'id',
            'CASCADE'
        );

        // creates index for column `add_filter_id`
        $this->createIndex(
            'idx-products_add_filter-add_filter_id',
            'products_add_filter',
            'add_filter_id'
        );

        // add foreign key for table `add_filter`
        $this->addForeignKey(
            'fk-products_add_filter-add_filter_id',
            'products_add_filter',
            'add_filter_id',
            'add_filter',
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
            'fk-products_add_filter-products_id',
            'products_add_filter'
        );

        // drops index for column `products_id`
        $this->dropIndex(
            'idx-products_add_filter-products_id',
            'products_add_filter'
        );

        // drops foreign key for table `add_filter`
        $this->dropForeignKey(
            'fk-products_add_filter-add_filter_id',
            'products_add_filter'
        );

        // drops index for column `add_filter_id`
        $this->dropIndex(
            'idx-products_add_filter-add_filter_id',
            'products_add_filter'
        );

        $this->dropTable('products_add_filter');
    }
}
