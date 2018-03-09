<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_sort_attrs`.
 */
class m180309_064145_create_product_sort_attrs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_sort_attrs', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'status' => $this->smallInteger()->defaultValue(1),
            'sort_data' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_sort_attrs');
    }
}
