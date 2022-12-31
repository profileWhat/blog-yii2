<?php

namespace common\models;


use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%lookup}}".
 *
 * @property int $id
 * @property string $name
 * @property int $code
 * @property string $type
 * @property int $position
 */
class Lookup extends ActiveRecord
{
    private static $_items = [];

    private static function loadItems($type)
    {
        self::$_items[$type] = [];
        $models=self::find()->where(['type'=>$type])->orderBy('position')->all();
        foreach ($models as $model)
            self::$_items[$type][$model->code]=$model->name;
    }

    public static function item($type, $code)
    {
        if (!isset(self::$_items[$type]))
            self::loadItems($type);
        return self::$_items[$type][$code] ?? false;
    }

    public static function items($type)
    {
        if (!isset(self::$_items[$type]))
            self::loadItems($type);
        return self::$_items[$type];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lookup}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code', 'type', 'position'], 'required'],
            [['code', 'position'], 'integer'],
            [['name', 'type'], 'string', 'max' => 128],
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
            'code' => 'Code',
            'type' => 'Type',
            'position' => 'Position',
        ];
    }

}