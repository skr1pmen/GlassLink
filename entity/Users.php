<?php

namespace app\entity;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use app\repository\UserRepository;

use app\entity\SaleCard;
use app\entity\Reserves;
use app\entity\Orders;

/**
 * @property integer id
 * @property string phone
 * @property string password
 * @property string name
 * @property string surname
 * @property string birthday
 */
class Users extends ActiveRecord implements IdentityInterface
{

    public static function findIdentity($id)
    {
        return new static(UserRepository::getUserById($id));
    }

    public function getId()
    {
        return $this->id;
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function findUserByPhone($phone)
    {
        return new static(UserRepository::getUserByPhone($phone));
    }

    public function getSaleCard()
    {
        return $this->hasOne(SaleCard::class, ['user_id' => 'id']);
    }

    public function getLastReserve()
    {
        return $this->hasOne(Reserves::class, ['user_id' => 'id']);
    }
    public function getReserves()
    {
        return $this->hasMany(Reserves::class, ['user_id' => 'id']);
    }

    public function getLastOrder()
    {
        return $this->hasOne(Orders::class, ['user_id' => 'id']);
    }
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['user_id' => 'id']);
    }

    public static function findIdentityByAccessToken($token, $type = null){}
    public function getAuthKey(){}
    public function validateAuthKey($authKey){}
}