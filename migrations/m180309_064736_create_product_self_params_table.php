<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_self_params`.
 */
class m180309_064736_create_product_self_params_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_self_params', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'value' => $this->string()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);
    
        // creates index for column `product_id`
        $this->createIndex(
            'idx-product_self_params-product_id',
            'product_self_params',
            'product_id'
        );
    
        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-product_self_params-product_id',
            'product_self_params',
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
            'fk-product_self_params-product_id',
            'product_self_params'
        );
    
        // drops index for column `product_id`
        $this->dropIndex(
            'idx-product_self_params-product_id',
            'product_self_params'
        );
        
        $this->dropTable('product_self_params');
    }
}
