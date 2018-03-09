<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 * Has foreign keys to the tables:
 *
 * - `categories`
 * - `brands`
 */
class m180309_061154_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'img' => $this->string(255),
            'price' => $this->integer()->notNull(),
            'discount' => $this->float(),
            'content' => $this->text(),
            'category_id' => $this->integer()->notNull(),
            'rating' => $this->float()->defaultValue(0),
            'brand_id' => $this->integer()->notNull(),
            'short_desc' => $this->text(),
            'main_params_json' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(1),
            'meta_keywords' => $this->string(255),
            'meta_description' => $this->string(255),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-products-category_id',
            'products',
            'category_id'
        );

        // add foreign key for table `categories`
        $this->addForeignKey(
            'fk-products-category_id',
            'products',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );

        // creates index for column `brand_id`
        $this->createIndex(
            'idx-products-brand_id',
            'products',
            'brand_id'
        );

        // add foreign key for table `brands`
        $this->addForeignKey(
            'fk-products-brand_id',
            'products',
            'brand_id',
            'brands',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `categories`
        $this->dropForeignKey(
            'fk-products-category_id',
            'products'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-products-category_id',
            'products'
        );

        // drops foreign key for table `brands`
        $this->dropForeignKey(
            'fk-products-brand_id',
            'products'
        );

        // drops index for column `brand_id`
        $this->dropIndex(
            'idx-products-brand_id',
            'products'
        );

        $this->dropTable('products');
    }
}
