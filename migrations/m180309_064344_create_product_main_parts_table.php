<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_main_parts`.
 */
class m180309_064344_create_product_main_parts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_main_parts', [
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
        $this->dropTable('product_main_parts');
    }
}
