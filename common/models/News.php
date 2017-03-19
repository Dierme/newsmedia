<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $image
 * @property string $title
 * @property string $text
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property UploadedFile $imageFile
 *
 * @property Comments[] $comments
 */
class News extends \yii\db\ActiveRecord
{
    CONST STATUS_PUBLISHED = 1;
    CONST STATUS_UNPUBLISHED = 2;

    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * All possible statuses
     * @return array
     */
    public function getStatuses()
    {
        return [
            self::STATUS_PUBLISHED => 'Published',
            self::STATUS_UNPUBLISHED => 'Unpublished',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at', 'image'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => date('Y-m-d h:i:s')
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'title' => 'Title',
            'text' => 'Text',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['news_id' => 'id']);
    }

    /**
     * Saves image to server directory
     * @param $imageName
     * @return bool
     */
    public function upload($imageName)
    {
        $path = Yii::getAlias('@frontend') . '/web/images/';

        if ($this->validate()) {
            $this->imageFile->saveAs($path . $imageName);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Calculates and formats time since news were added
     * @return string
     */
    public function calcTimeAgo()
    {
        $timeCreated = strtotime($this->created_at);

        $timeNow = strtotime(date('Y-m-d h:i:s'));

        $diff = $timeNow - $timeCreated;

        if (intval($diff / 60) < 1) {
            //less, than hour ago
            $toDisplay = 'less than a minute ago';
        } elseif (intval($diff / 3600) < 1) {
            //less, than hour ago
            $toDisplay = intval($diff / 60) . ' min ago';
        } elseif (intval($diff / 86400) < 1) {
            //less, than day ago
            $toDisplay = intval($diff / 3600) . 'h ago';
        } elseif (intval($diff / 2592000) < 1) {
            //less, than day ago
            $toDisplay = intval($diff / 86400) . '  days ago';
        } else {
            $toDisplay = 'more, than a month ago';
        }

        return $toDisplay;
    }
}
