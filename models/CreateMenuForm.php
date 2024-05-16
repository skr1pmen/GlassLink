<?php

namespace app\models;

use yii\base\Model;

class CreateMenuForm extends Model
{
    public $title;
    public $description;
    public $compound;
    public $price;
    public $volume;
    public $category_id;

    public function rules()
    {
        return [
            [['title', 'description', 'compound', 'price', 'volume', 'category_id'], 'required'],
            ['description', 'string', 'max' => 200],
            [['price', 'volume'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название блюда',
            'description' => 'Описание блюда',
            'compound' => 'Состав',
            'price' => 'Цена',
            'volume' => 'Вес',
            'category_id' => 'Категория',
        ];
    }
}