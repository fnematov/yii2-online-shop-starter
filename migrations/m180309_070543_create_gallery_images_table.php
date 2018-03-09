<?php

use yii\db\Migration;

/**
 * Handles the creation of table `gallery_images`.
 * Has foreign keys to the tables:
 *
 * - `photo_gallery`
 */
class m180309_070543_create_gallery_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('gallery_images', [
            'id' => $this->primaryKey(),
            'img' => $this->string()->notNull(),
            'gallery_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `gallery_id`
        $this->createIndex(
            'idx-gallery_images-gallery_id',
            'gallery_images',
            'gallery_id'
        );

        // add foreign key for table `photo_gallery`
        $this->addForeignKey(
            'fk-gallery_images-gallery_id',
            'gallery_images',
            'gallery_id',
            'photo_gallery',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `photo_gallery`
        $this->dropForeignKey(
            'fk-gallery_images-gallery_id',
            'gallery_images'
        );

        // drops index for column `gallery_id`
        $this->dropIndex(
            'idx-gallery_images-gallery_id',
            'gallery_images'
        );

        $this->dropTable('gallery_images');
    }
}
