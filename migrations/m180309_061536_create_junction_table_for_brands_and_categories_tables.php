<?php

use yii\db\Migration;

/**
 * Handles the creation of table `brands_categories`.
 * Has foreign keys to the tables:
 *
 * - `brands`
 * - `categories`
 */
class m180309_061536_create_junction_table_for_brands_and_categories_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('brands_categories', [
            'brands_id' => $this->integer(),
            'categories_id' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(1),
            'PRIMARY KEY(brands_id, categories_id)',
        ]);

        // creates index for column `brands_id`
        $this->createIndex(
            'idx-brands_categories-brands_id',
            'brands_categories',
            'brands_id'
        );

        // add foreign key for table `brands`
        $this->addForeignKey(
            'fk-brands_categories-brands_id',
            'brands_categories',
            'brands_id',
            'brands',
            'id',
            'CASCADE'
        );

        // creates index for column `categories_id`
        $this->createIndex(
            'idx-brands_categories-categories_id',
            'brands_categories',
            'categories_id'
        );

        // add foreign key for table `categories`
        $this->addForeignKey(
            'fk-brands_categories-categories_id',
            'brands_categories',
            'categories_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `brands`
        $this->dropForeignKey(
            'fk-brands_categories-brands_id',
            'brands_categories'
        );

        // drops index for column `brands_id`
        $this->dropIndex(
            'idx-brands_categories-brands_id',
            'brands_categories'
        );

        // drops foreign key for table `categories`
        $this->dropForeignKey(
            'fk-brands_categories-categories_id',
            'brands_categories'
        );

        // drops index for column `categories_id`
        $this->dropIndex(
            'idx-brands_categories-categories_id',
            'brands_categories'
        );

        $this->dropTable('brands_categories');
    }
}
