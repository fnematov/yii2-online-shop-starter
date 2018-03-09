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
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_self_params');
    }
}
