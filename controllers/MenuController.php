<?php

namespace app\controllers;

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

    public function actionCreate()
    {
        $this->view->title = 'Добавление нового блюда';
        var_dump("длыовиалво");
    }
}