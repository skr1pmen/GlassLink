<?php

namespace app\repository;

use app\entity\Categories;

class CategoryRepository
{
    public static function createNewCategory($title, $description)
    {
        $category = new Categories();
        $category->title = $title;
        $category->description = $description;
        $category->save();
        return $category->id;
    }

    public static function getAll()
    {
        return Categories::find()->all();
    }
}