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

        $this->insert($this->tableName, [
            'news_id' => '1',
            'text' => 'hi',
            'status' => '1',
            'created_at' => '2017-03-19 03:50:10',
            'updated_at' => '2017-03-19 03:50:10',
        ]);
        $this->insert($this->tableName, [
            'news_id' => '2',
            'text' => 'Slack is a cool app!',
            'status' => '1',
            'created_at' => '2017-03-19 04:01:10',
            'updated_at' => '2017-03-19 04:01:10',
        ]);
        $this->insert($this->tableName, [
            'news_id' => '3',
            'text' => 'That is a nice idea!',
            'status' => '1',
            'created_at' => '2017-03-19 04:01:25',
            'updated_at' => '2017-03-19 04:01:25',
        ]);

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
