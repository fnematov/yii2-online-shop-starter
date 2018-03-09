<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products_product_params`.
 * Has foreign keys to the tables:
 *
 * - `products`
 * - `product_params`
 */
class m180309_064614_create_junction_table_for_products_and_product_params_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products_product_params', [
            'products_id' => $this->integer(),
            'product_params_id' => $this->integer(),
            'value' => $this->string()->notNull(),
            'PRIMARY KEY(products_id, product_params_id)',
        ]);

        // creates index for column `products_id`
        $this->createIndex(
            'idx-products_product_params-products_id',
            'products_product_params',
            'products_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-products_product_params-products_id',
            'products_product_params',
            'products_id',
            'products',
            'id',
            'CASCADE'
        );

        // creates index for column `product_params_id`
        $this->createIndex(
            'idx-products_product_params-product_params_id',
            'products_product_params',
            'product_params_id'
        );

        // add foreign key for table `product_params`
        $this->addForeignKey(
            'fk-products_product_params-product_params_id',
            'products_product_params',
            'product_params_id',
            'product_params',
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
            'fk-products_product_params-products_id',
            'products_product_params'
        );

        // drops index for column `products_id`
        $this->dropIndex(
            'idx-products_product_params-products_id',
            'products_product_params'
        );

        // drops foreign key for table `product_params`
        $this->dropForeignKey(
            'fk-products_product_params-product_params_id',
            'products_product_params'
        );

        // drops index for column `product_params_id`
        $this->dropIndex(
            'idx-products_product_params-product_params_id',
            'products_product_params'
        );

        $this->dropTable('products_product_params');
    }
}
