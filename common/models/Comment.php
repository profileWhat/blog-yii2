<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;


/**
 * This is the model class for table "{{%comment}}".
 *
 * @property int $id
 * @property string $content
 * @property int $status
 * @property int|null $create_time
 * @property string $author
 * @property string $email
 * @property string|null $url
 * @property int $post_id
 *
 * @property Post $post
 */
class Comment extends ActiveRecord
{
    const STATUS_PENDING = 1;
    const STATUS_APPROVED = 2;


    public function behaviors(){
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => ['create_time'],
                ],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'status', 'author', 'email', 'post_id'], 'required'],
            [['content'], 'string'],
            [['email'],'email'],
            [['url'], 'url'],
            [['status', 'create_time', 'post_id'], 'integer'],
            [['author', 'email', 'url'], 'string', 'max' => 128],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::class, 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'content' => 'Comment',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'author' => 'Name',
            'email' => 'Email',
            'url' => 'Website',
            'post_id' => 'Post',
        ];
    }

    /**
     * Gets query for [[Post]].
     *
     * @return ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }

}