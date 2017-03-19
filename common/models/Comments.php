<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $news_id
 * @property string $text
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property News $news
 */
class Comments extends \yii\db\ActiveRecord
{
    CONST STATUS_PUBLISHED = 1;
    CONST STATUS_UNPUBLISHED = 2;
    CONST STATUS_DELETED = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    public function getStatuses()
    {
        return [
            1 => 'Published',
            2 => 'Unpublished', //deleted by admin
            3 => 'Deleted'  //deleted by user
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id'], 'required'],
            [['news_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['text'], 'string'],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => date('Y-m-d h:i:s'),
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
            'news_id' => 'News',
            'text' => 'Text',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'news_id']);
    }
}
