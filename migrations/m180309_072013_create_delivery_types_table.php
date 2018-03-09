<?php

use yii\db\Migration;

/**
 * Handles the creation of table `delivery_types`.
 */
class m180309_072013_create_delivery_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('delivery_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'price' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('delivery_types');
    }
}
