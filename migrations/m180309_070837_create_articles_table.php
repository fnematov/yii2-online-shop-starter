<?php

use yii\db\Migration;

/**
 * Handles the creation of table `articles`.
 */
class m180309_070837_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'key' => $this->string(55)->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'meta_keywords' => $this->string(255),
            'meta_description' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('articles');
    }
}
