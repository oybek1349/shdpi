<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rasmlar}}`.
 */
class m230202_095222_create_rasmlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $table = '{{%rasmlar}}';
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
            'name' => $this->string()->notNull(),
            'url' => $this->text()->defaultValue(null)
        ], $this->tableOptions);

        
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable($this->table);
    }
}
