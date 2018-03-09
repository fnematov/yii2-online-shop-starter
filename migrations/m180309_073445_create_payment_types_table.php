<?php

use yii\db\Migration;

/**
 * Handles the creation of table `payment_types`.
 */
class m180309_073445_create_payment_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('payment_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),
            'logo' => $this->string()->notNull(),
            'status' => $this->smallInteger()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('payment_types');
    }
}
