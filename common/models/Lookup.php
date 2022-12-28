<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Lookup model
 *
 * @property integer $id
 * @property string $name
 * @property integer $code
 * @property string $type
 * @property integer $position
 */
class Lookup extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lookup}}';
    }
}