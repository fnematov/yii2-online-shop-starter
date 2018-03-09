<?php

use yii\db\Migration;

/**
 * Handles the creation of table `categories`.
 */
class m180309_060237_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'status' => $this->smallInteger()->defaultValue(1),
            'related_product_id' => $this->integer(),
            'img' => $this->string(255),
            'is_main_page' => $this->smallInteger()->defaultValue(0),
            'meta_keywords' => $this->string(255),
            'meta_description' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categories');
    }
}
