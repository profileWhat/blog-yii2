<?php

namespace common\widgets;

use common\models\Comment;
use yii\base\Widget;

class RecentComments extends Widget
{
    public $comments;
    public function init()
    {
        parent::init();
        $this->comments =  Comment::findRecentComments();

    }

    public function run()
    {
        return $this->render('_recent_comments');
    }
}