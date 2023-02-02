<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%xodimlar}}`.
 */
class m230202_095932_create_xodimlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $table = '{{%xodimlar}}';
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
            'ism' => $this->string()->notNull(),
            'malumot' => $this->text()->defaultValue(null),
            'kafedra_id' => $this->integer()->defaultValue(null),
            'lavozim_id' => $this->integer()->notNull(),            
            'rasm_id' => $this->integer()->defaultValue(null),
            
        ], $this->tableOptions);

        $this->createIndex('idx-xodimlar-kafedra_id', $this->table, 'kafedra_id');
        $this->addForeignKey('fk-xodimlar-kafedra_id', $this->table, 'kafedra_id', '{{%kafedralar}}', 'id', 'SET NULL', 'CASCADE');

        $this->createIndex('idx-xodimlar-lavozim_id', $this->table, 'lavozim_id');
        $this->addForeignKey('fk-xodimlar-lavozim_id', $this->table, 'lavozim_id', '{{%lavozimlar}}', 'id', 'RESTRICT', 'CASCADE');
   
        $this->createIndex('idx-xodimlar-rasm_id', $this->table, 'rasm_id');
        $this->addForeignKey('fk-xodimlar-rasm_id', $this->table, 'rasm_id', '{{%rasmlar}}', 'id', 'SET NULL', 'CASCADE');   
   
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey('fk-xodimlar-kafedra_id', $this->table);
        $this->dropIndex('idx-xodimlar-kafedra_id', $this->table);   

        $this->dropForeignKey('fk-xodimlar-lavozim_id', $this->table);
        $this->dropIndex('idx-xodimlar-lavozim_id', $this->table);   

        $this->dropForeignKey('fk-xodimlar-rasm_id', $this->table);
        $this->dropIndex('idx-xodimlar-rasm_id', $this->table);   

        $this->dropTable($this->table);
    }
}
