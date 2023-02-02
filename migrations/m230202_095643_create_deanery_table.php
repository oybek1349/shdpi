<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%deanery}}`.
 */
class m230202_095643_create_deanery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%deanery}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%deanery}}');
    }
}
