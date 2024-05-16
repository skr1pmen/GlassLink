<?php

namespace app\controllers;

use app\models\CategoryForm;
use app\models\CreateMenuForm;
use app\repository\CategoryRepository;
use app\repository\MenuRepository;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class MenuController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreateMenu()
    {
        $this->view->title = 'Добавление нового блюда';
        $categories = CategoryRepository::getAll();
        $model = new CreateMenuForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $catId = MenuRepository::createNewMenu(
                $model->title,
                $model->description,
                $model->compound,
                $model->price,
                $model->volume,
                $model->category_id
            );
            if ($catId) {
                return $this->redirect('/menu/');
            }
        }
        return $this->render('create-menu', ['model' => $model, 'categories' => $categories]);
    }

    public function actionCreateCategory()
    {
        $this->view->title = 'Создание категории';
        $model = new CategoryForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $catId = CategoryRepository::createNewCategory(
                $model->title,
                $model->description
            );
            if ($catId) {
                return $this->redirect('/menu/');
            }
        }
        return $this->render('create-category', ['model' => $model]);
    }
}