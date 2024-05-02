<?php

namespace app\repository;

use app\entity\SaleCard;

class SaleCardRepository
{
    public static function createCard($id)
    {
        $card = new SaleCard();
        $template_number = '000000000000';
        $card->number = implode(str_split($template_number, strlen($id))) . $id;
        $card->user_id = $id;
        $card->save();
    }
}