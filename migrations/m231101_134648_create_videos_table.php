<?php

/**
 * Handles the creation of table `{{%videos}}`.
 */
class m231101_134648_create_videos_table extends \app\migrations\Migration
{
    public function tableName()
    {
        return '{{%videos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName(), $this->attributes([
            'title' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'description' => $this->text(),
            'photo' => $this->string(),
        ]));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName());
    }
}