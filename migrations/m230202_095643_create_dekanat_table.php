<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dekanat}}`.
 */
class m230202_095643_create_dekanat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $table = '{{%dekanat}}';
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
            'fakultet_id' => $this->integer()->notNull(),
            'nomi' => $this->string()->notNull(),
            'tavsifi' => $this->text()->defaultValue(null)            
        ], $this->tableOptions);

        $this->createIndex('idx-dekanat-fakultet_id', $this->table, 'fakultet_id');
        $this->addForeignKey('fk-dekanat-fakultet_id', $this->table, 'fakultet_id', '{{%fakultetlar}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-dekanat-fakultet_id', $this->table);
        $this->dropIndex('idx-dekanat-fakultet_id', $this->table);

        $this->dropTable($this->table);
    }
}
