<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lavozimlar}}`.
 */
class m230202_095820_create_lavozimlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $table = '{{%lavozimlar}}';
    public $tableOptions = null;

    public function up()
    {
        if ( $this->db->driverName === 'mysql' ) {
            $this->tableOptions = "CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB";    
        } elseif( $this->db->driverName === 'pgsql' ) {
            $this->tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
        }

        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'nomi' => $this->string()->notNull(),
        ], $this->tableOptions);

        $this->batchInsert($this->table, ['nomi'], [
            ["Ilmiy darajali professor o'qituvchilar"],
            ["Katta o'qituvchilar"],
            ["Assistent o'qituvchilar"],
            ["Kabinet mudiri"]
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
