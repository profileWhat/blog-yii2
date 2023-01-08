<?php

namespace common\models\repositories;

use common\models\Post;
use yii\data\ActiveDataProvider;

class PostRepository
{
    public static function findAll() {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find(),
            'pagination' => [
                'pageSize' => 5
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);
        return $dataProvider;
    }

    public static function findAllWithTags($tags) {
        $query = Post::find()->orderBy('update_time DESC');
        $query->andFilterWhere(['like', 'tags', $tags]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ],
        ]);
        return $dataProvider;
    }
}