<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Comment model
 *
 * @property integer $id
 * @property string $name
 * @property integer $frequency
 */
class Tag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }
}