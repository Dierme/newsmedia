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


        $this->insert($this->tableName, [
            'image' => 'YrqVkHCCmIvLfMaGDHLmhD71ncQoHY34.png',
            'title' => 'How Spotify is finally gaining leverage over record labels',
            'text' => 'The problem with Spotify going public has always been that the record labels own the music. They force Spotify to pay 70 percent or more of its revenue to them for royalties, and could jack up that price if Spotify got too profitable.

That’s why over the past few years, Spotify has been pushing five different paths to putting pressure on the labels to cut it a better royalties deal. They all hinge around the idea of making the labels need Spotify as much as it’s historically needed them.

When Spotify launched in 2008, it had no power in the relationship since it had so few listeners. It needed to raise over $180 million in its first few years and pay the labels a huge upfront advance on royalty payments to convince them to let it launch in the US. Spotify also had to sell the labels equity so even if it succeeded, they’d be financially protected.

But now that Spotify has grown to 50 million paid subscribers and a huge base of free ad-supported listeners, it’s emerging from the streaming pack including YouTube / Google Music, Pandora, Apple Music, and Amazon so rights owners can’t just favor them instead. Spotify has begun to gain some leverage over the labels so that it can make money without them and they need it to have a hit record.',
            'status' => '1',
            'created_at' => '2017-03-19 03:49:30',
            'updated_at' => '2017-03-19 03:49:30',
        ]);

        $this->insert($this->tableName, [
            'image' => 'Qq6zBfrTFDsbyzda_z4OChRvxE0TeBf3.jpg',
            'title' => 'Makeblock raises $30 million for robot-building kits for kids',
            'text' => 'Remember when kids could simply play with their toys? They still can. But parents are increasingly spending on toys that are chockablock with tech components, and that promise to turn their kids into software developers or robotics engineers. The Toy Industry Association, which held its International Toy Fair in New York last month, has even identified robotics-education as a major trend for the market in 2017.

Now, a Shenzhen-based startup called Makeblock has raised $30 million in Series B venture funding to serve all those parents with programmable robots, and robot-building kits for kids and teens. Makeblock claims it has customers in 140 countries and products being used by educators in 20,000 different schools worldwide today.

The startup’s best-known products include programmable rovers in the mBot series, and the Airblock, a modular toy drone that even beginners can assemble. But the company offers a very wide variety of techie toys, including some that are more whimsical. For example, its Music Robot Kit includes a xylophone, and a motorized hammer. If built and programmed successfully, it can play a certain score, or users can bang out notes from a remote PC keyboard.',
            'status' => '1',
            'created_at' => '2017-03-19 03:54:04',
            'updated_at' => '2017-03-19 03:54:04',
        ]);

        $this->insert($this->tableName, [
            'image' => 'f-zC8Y5do4ZpicvMlrHLX-zaaVZcJGKW.png',
            'title' => 'Serial founder and former Slack PM Simon Vallee is starting a personal productivity company',
            'text' => 'Simon Vallee is exactly the kind of person who venture capitalists like to keep on their radar.

He’s Canadian, for one thing. (Everyone knows how nice Canadians are.) He has also co-founded — and sold —  a number of small companies over the last decade. First, there was SiteMasher, a site-creation platform that was purchased a couple of years later, in 2009, to Salesforce for what Vallee describes as a “little bundle.” Vallee then used that money to help bootstrap an online booking company, OpenCal, that became a “nice, little profitable business” and soon after attracted the attention of Groupon, which bought it in 2011. (The price wasn’t disclosed, but Vallee describes it simply as “an offer too good to refuse.”)

It was inside Groupon that Vallee began thinking up his next company, a document collaboration startup called Spaces that provided users with blank space for all their content, from images to tasks to code snippets. In fact, he and former Googler Hans Larsen were raising a seed round for the company when they were introduced to Stewart Butterfield of Slack and, well, you can guess what happened next.

Okay, yes: Those discussions turned into an acquisition.',
            'status' => '1',
            'created_at' => '2017-03-19 03:59:05',
            'updated_at' => '2017-03-19 04:00:12',
        ]);
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
