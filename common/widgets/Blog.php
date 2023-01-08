<?php

namespace common\widgets;

use common\models\Post;
use common\models\PostSearch;
use common\models\repositories\PostRepository;
use Yii;
use yii\base\Widget;

class Blog extends Widget
{
    public $posts;
    public $pages;
    public $dataProvider;

    public function init()
    {
        parent::init();
        if (Yii::$app->session->get('tags') == null) $dataProvider = PostRepository::findAll();
        else $dataProvider = PostRepository::findAllWithTags(Yii::$app->session->get('tags'));
        $this->posts = $dataProvider->getModels();
        $this->pages = $dataProvider->getPagination();
    }

    public function run()
    {
        return $this->render('_blog');
    }
}