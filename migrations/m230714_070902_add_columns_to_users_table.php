<?php

/**
 * Handles adding columns to table `{{%users}}`.
 */
class m230714_070902_add_columns_to_users_table extends \app\migrations\Migration
{
    public function tableName()
    {
        return '{{%users}}';
    }

    public function columns()
    {
        return [
            'name' => $this->string(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumns($this->tableName(), $this->columns());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumns($this->tableName(), $this->columns());
    }
}
