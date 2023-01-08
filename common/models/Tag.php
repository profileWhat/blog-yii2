<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property int $id
 * @property string $name
 * @property int|null $frequency
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['frequency'], 'integer'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'frequency' => 'Frequency',
        ];
    }


    public static function string2array($tags)
    {
        return preg_split('/\s*,\s*/', trim($tags), -1, PREG_SPLIT_NO_EMPTY);
    }

    public static function array2string($tags)
    {
        return implode(', ', $tags);
    }

    public static function updateFrequency($oldTags, $newTags)
    {
        $oldTags = self::string2array($oldTags);
        $newTags = self::string2array($newTags);
        self::addTags(array_values(array_diff($newTags, $oldTags)));
        self::removeTags(array_values(array_diff($oldTags, $newTags)));
    }

    public static function addTags($tags)
    {
        $models = self::findAll(['name' => $tags]);
        foreach ($models as $model) {
            $model->updateCounters(['frequency' => 1]);
        }
        foreach ($tags as $name) {
            if (!Tag::find()->where(['name' => $name])->exists()) {
                $tag = new Tag;
                $tag->name = $name;
                $tag->frequency = 1;
                $tag->save();
            }
        }
    }

    public static function removeTags($tags)
    {
        if (empty($tags))
            return;
        $models = self::findAll(['name' => $tags]);
        foreach ($models as $model) {
            $model->updateCounters(['frequency' => -1]);
        }
        self::deleteAll('frequency<=0');
    }

    public static function findTagWeights($limit = 20)
    {
        $models = self::find()
            ->orderBy('frequency DESC')
            ->limit($limit)
            ->all();

        $total = 0;
        foreach ($models as $model)
            $total += $model->frequency;

        $tags = array();
        if ($total > 0) {
            foreach ($models as $model)
                $tags[$model->name] = 8 + (int)(16 * $model->frequency / ($total + 10));
            ksort($tags);
        }
        return $tags;
    }
}