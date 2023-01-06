<?php

namespace common\widgets;

use common\models\Post;
use common\models\repositories\PostRepository;
use yii\base\Widget;

class Blog extends Widget
{
    public $posts;
    public $pages;
    public function init()
    {
        parent::init();
        $dataProvider = PostRepository::findAllAsDataProvider();
        $this->posts = $dataProvider->getModels();
        $this->pages = $dataProvider->getPagination();
    }

    public function run()
    {
        return $this->render('_posts');
    }
}