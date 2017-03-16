<?php

use yii\db\Migration;

class m170316_094744_news extends Migration
{
    private $tableName = '{{%news}}';
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'image' => $this->string(50),
            'title' => $this->string(255),
            'text' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

    }

    public function down()
    {
        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
