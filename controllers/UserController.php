<?php

namespace app\controllers;

use app\repository\SaleCardRepository;
use app\repository\UserRepository;
use yii\web\Controller;
use Yii;
use app\entity\Users;

class UserController extends Controller
{
    public function actionRegistration()
    {
        $this->view->title = 'Страница регистрации';

        $model = new RegistrationModel();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $userId = UserRepository::createUser(
                $model->phone,
                $model->password
            );
            if ($userId) {
                SaleCardRepository::createCard($userId);
                Yii::$app->user->login(Users::findIdentity($userId));
                return $this->goHome();
            }
        }
        return $this->render('registration', ['model' => $model]);
    }
}