<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%faculties}}`.
 */
class m230202_095411_create_faculties_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%faculties}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%faculties}}');
    }
}
