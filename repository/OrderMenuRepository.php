<?php

namespace app\repository;

use app\entity\Orders;

class OrderRepository
{
    public static function getOrder($where = [])
    {
        return Orders::find()->where($where)->one();
    }
}