<?php

namespace app\models;

use yii\base\Model;

class ReserveForm extends Model
{
    public $table;
    public $start_time;
    public $end_time;
    public $menu = [];
    public $not_order = false;

    public function rules()
    {
        return [
            [['table', 'start_time'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'table' => 'Номер столика',
            'start_time' => 'Начало резерва',
            'end_time' => 'Конец резерва',
            'menu' => 'Меню',
            'not_order' => 'Закажу потом',
        ];
    }
}