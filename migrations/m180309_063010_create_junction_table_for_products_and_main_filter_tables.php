<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products_main_filter`.
 * Has foreign keys to the tables:
 *
 * - `products`
 * - `main_filter`
 */
class m180309_063010_create_junction_table_for_products_and_main_filter_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products_main_filter', [
            'products_id' => $this->integer(),
            'main_filter_id' => $this->integer(),
            'PRIMARY KEY(products_id, main_filter_id)',
        ]);

        // creates index for column `products_id`
        $this->createIndex(
            'idx-products_main_filter-products_id',
            'products_main_filter',
            'products_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-products_main_filter-products_id',
            'products_main_filter',
            'products_id',
            'products',
            'id',
            'CASCADE'
        );

        // creates index for column `main_filter_id`
        $this->createIndex(
            'idx-products_main_filter-main_filter_id',
            'products_main_filter',
            'main_filter_id'
        );

        // add foreign key for table `main_filter`
        $this->addForeignKey(
            'fk-products_main_filter-main_filter_id',
            'products_main_filter',
            'main_filter_id',
            'main_filter',
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
            'fk-products_main_filter-products_id',
            'products_main_filter'
        );

        // drops index for column `products_id`
        $this->dropIndex(
            'idx-products_main_filter-products_id',
            'products_main_filter'
        );

        // drops foreign key for table `main_filter`
        $this->dropForeignKey(
            'fk-products_main_filter-main_filter_id',
            'products_main_filter'
        );

        // drops index for column `main_filter_id`
        $this->dropIndex(
            'idx-products_main_filter-main_filter_id',
            'products_main_filter'
        );

        $this->dropTable('products_main_filter');
    }
}
