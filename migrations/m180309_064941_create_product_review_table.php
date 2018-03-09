<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_review`.
 */
class m180309_064941_create_product_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_review', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'review' => $this->text(),
            'rate' => $this->smallInteger()->defaultValue(5),
            'created_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_review');
    }
}
