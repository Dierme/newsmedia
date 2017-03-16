<?php

use yii\db\Migration;

class m170316_094759_comments extends Migration
{
    private $tableName = '{{%comments}}';
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'news_id' =>$this->integer()->notNull(),
            'text' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

        $this->addForeignKey('#FK_comment_has_news', $this->tableName, 'news_id', 'news', 'id');

    }

    public function down()
    {
        echo "m170316_094759_comments cannot be reverted.\n";

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
