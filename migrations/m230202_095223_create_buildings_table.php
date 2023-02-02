<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%buildings}}`.
 */
class m230202_095223_create_buildings_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public $table = "{{%buildings}}";

    public $tableOptions = null;

    public function up()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'image_id' => $this->integer()->defaultValue(0),
            'name'  => $this->string()->notNull(),
            'descr' => $this->string()->defaultValue(null),  
        ], $this->tableOptions);

            
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%buildings}}');
    }
}
