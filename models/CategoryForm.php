<?php

namespace app\models;

use yii\base\Model;

class CategoryForm extends Model
{
    public $title;
    public $description;

    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            ['description', 'string', 'length' => [10, 200]],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание'
        ];
    }
}