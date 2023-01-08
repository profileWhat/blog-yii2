<?php

namespace common\widgets;

use common\models\Tag;
use yii\base\Widget;

class TagCloud extends Widget
{
    public $title = 'Tags';
    public $maxTags = 20;
    public $tags;

    public function init()
    {
        parent::init();
        $this->tags = Tag::findTagWeights($this->maxTags);
    }

    public function run()
    {
        return $this->render('_tag_cloud');
    }

}