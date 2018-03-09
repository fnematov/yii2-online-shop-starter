<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_images`.
 * Has foreign keys to the tables:
 *
 * - `products`
 */
class m180309_063843_create_product_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_images', [
            'id' => $this->primaryKey(),
            'img' => $this->string()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            'idx-product_images-product_id',
            'product_images',
            'product_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-product_images-product_id',
            'product_images',
            'product_id',
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
            'fk-product_images-product_id',
            'product_images'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-product_images-product_id',
            'product_images'
        );

        $this->dropTable('product_images');
    }
}
