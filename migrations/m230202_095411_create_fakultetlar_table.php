<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fakultetlar}}`.
 */
class m230202_095411_create_fakultetlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $table = '{{%fakultetlar}}';
    public $tableOptions = null;

    public function up()
    {
        if ($this->db->driverName === 'mysql') {
            $this->tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        } elseif( $this->db->driverName === 'pgsql') {
            $this->tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
        }

        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'nomi' => $this->string()->notNull(),
            'tavsifi' => $this->text()->defaultValue(null)
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
