<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kafedralar}}`.
 */
class m230202_095819_create_kafedralar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $table = '{{%kafedralar}}';
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
            'tavsifi' => $this->text()->defaultValue(null),
            'dekanat_id' => $this->integer()->notNull()
        ], $this->tableOptions);

        $this->createIndex('idx-kafedralar-dekanat_id', $this->table, 'dekanat_id');
        $this->addForeignKey('fk-kafedralar-dekanat_id', $this->table, 'dekanat_id', '{{%dekanat}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey('fk-kafedralar-dekanat_id', $this->table);
        $this->dropIndex('idx-kafedralar-dekanat_id', $this->table);

        $this->dropTable($this->table);
    }
}
