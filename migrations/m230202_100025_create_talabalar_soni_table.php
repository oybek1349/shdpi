<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%talabalar_soni}}`.
 */
class m230202_100025_create_talabalar_soni_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $table = '{{%talabalar_soni}}';
    public $tableOptions = null;

    public function up()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'kurs_nomeri' => $this->smallInteger()->notNull(),
            'kunduzgi' => $this->smallInteger()->defaultValue(0),
            'sirtqi' => $this->smallInteger()->defaultValue(0),
            'kechki' => $this->smallInteger()->defaultValue(0),
            'ayollar_soni' => $this->integer()->defaultValue(0),
            'erkaklar_soni' => $this->integer()->defaultValue(0)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {        
        $this->dropTable($this->table);
    }
}
