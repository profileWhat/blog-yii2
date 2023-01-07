<?php

namespace common\widgets;

use yii\base\Widget;

class Comment extends Widget
{
    public $comment;

    public function run()
    {
        return $this->render('_comment', ['comment' => $this->comment]);
    }
}