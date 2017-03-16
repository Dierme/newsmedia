<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
 *
 * @property Comments[] $comments
 */
class News extends \yii\db\ActiveRecord
{
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
            1 => 'Published',
            2 => 'Unpublished',
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
     * @return bool
     */
    public function upload($imageName)
    {
        $path = Yii::getAlias('@common') . '/images/';

        if ($this->validate()) {
            $this->imageFile->saveAs($path . $imageName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
