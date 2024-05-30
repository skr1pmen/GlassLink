<?php

namespace app\controllers;

use app\entity\Users;
use app\models\AuthForm;
use app\models\RegistrationModel;
use app\repository\OrderRepository;
use app\repository\SaleCardRepository;
use app\repository\UserRepository;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionAuthorization()
    {
        $this->view->title = "Страница авторизации";

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new AuthForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        }
        return $this->render('authorization', ['model' => $model]);
    }
    /** Контрольная точка (18:45 25.05.2024)
     * TO DO: Вывод текущего заказа пользователя (текущей корзины пользователя)
     */
    public function actionOrder(){
        $user_id = Yii::$app->user->id;
        $order = OrderRepository::getOrder(['user_id' => $user_id, 'finally_price' => null]);

    }
}