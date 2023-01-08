<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
/**
* @property string|null $tags
 */
class PostSearch extends Post
{
    public function rules()
    {
        return [
            [['tags'], 'safe'],
            [['tags'], 'match', 'pattern' => '/^[\w\s,]+$/', 'message' => 'В тегах можно использовать только буквы.'],
            ['tags', function($attribute,$params){
                $this->tags=Tag::array2string(array_unique(Tag::string2array($this->tags)));
            }],
        ];
    }

    public function search($params) {

        $this->load($params);

        if (!$this->validate()) {
            Yii::$app->session->set('tags', null);
        }
        Yii::$app->session->set('tags', $this->tags);
    }

    public static function searchByTags($tags) {
        Yii::$app->session->set('tags', $tags);
    }

    public function reset() {
        Yii::$app->session->set('tags', null);
    }
}