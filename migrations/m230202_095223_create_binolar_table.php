<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%binolar}}`.
 */
class m230202_095223_create_binolar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $table = "{{%binolar}}";

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
            'rasm_id' => $this->integer()->defaultValue(null),
            'ism'  => $this->string()->notNull(),
            'tavsifi' => $this->text()->defaultValue(null),  
        ], $this->tableOptions);

        $this->createIndex('idx-binolar-rasm_id', $this->table, 'rasm_id');
        $this->addForeignKey('fk-binolar-rasm_id', $this->table, 'rasm_id', '{{%rasmlar}}', 'id', 'SET NULL', 'CASCADE');
            
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey('fk-binolar-rasm_id', $this->table);
        $this->dropIndex('idx-binolar-rasm_id', $this->table);

        $this->dropTable($this->table);
    }
}
