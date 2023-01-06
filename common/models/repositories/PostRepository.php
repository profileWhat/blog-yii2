<?php

namespace common\models\repositories;

use common\models\Post;
use yii\data\ActiveDataProvider;

class PostRepository
{
    public static function findAllAsDataProvider() {
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
}