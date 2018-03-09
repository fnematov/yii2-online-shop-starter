<?php

use yii\db\Migration;

/**
 * Handles the creation of table `photo_gallery`.
 */
class m180309_070454_create_photo_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('photo_gallery', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'img' => $this->string()->notNull(),
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
        $this->dropTable('photo_gallery');
    }
}
