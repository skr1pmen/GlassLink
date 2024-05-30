<?php

namespace app\entity;

use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{
    public function getMenu(){
        return $this->hasMany(Menu::class, ['id' => 'menu_id'])
            ->viaTable(OrderMenu::tableName(), ['order_id' => 'id']);
    }
}