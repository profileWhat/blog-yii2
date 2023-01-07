<?php

namespace common\widgets;

use yii\base\Widget;

class Post extends Widget
{
    public $post;

    public function run()
    {
        return $this->render('_post', ['post' => $this->post]);
    }
}