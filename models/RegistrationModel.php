<?php

namespace app\models;

use app\repository\UserRepository;
use yii\base\Model;

class RegistrationModel extends Model
{
    public $phone;
    public $password;
    public $passwordRepeat;

    public function rules()
    {
        return [
            [['phone', 'password', 'passwordRepeat'], 'required'],
            ['phone', 'validatePhone'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password'],
            ['password', 'string', 'length' => [8, 12]]
        ];
    }

    public function attributeLabels()
    {
        return [
            'phone' => 'Номер телефона',
            'password' => 'Пароль',
            'passwordRepeat' => 'Повторённый пароль',
        ];
    }

    public function validatePhone($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = UserRepository::getUserByPhone($this->phone);
            if ($user) {
                $this->addError($attribute, 'Этот номер телефона занят!');
            }
        }
    }
}