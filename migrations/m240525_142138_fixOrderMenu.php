<?php

use yii\db\Migration;

/**
 * Class m240525_142138_fixOrderMenu
 */
class m240525_142138_fixOrderMenu extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('orders', 'order_menu_id');
        $this->dropPrimaryKey('order_menu_pkey', 'order_menu');
        $this->dropColumn('order_menu', 'id');
        $this->addColumn('order_menu', 'order_id', 'integer NOT NULL');
        $this->addPrimaryKey('order_menu_pkey', 'order_menu', ['order_id', 'menu_id']);
    }

    public function safeDown()
    {
        $this->dropPrimaryKey('order_menu_pkey', 'order_menu');
        $this->dropColumn('order_menu', 'order_id');
        $this->addColumn('order_menu', 'id', 'serial NOT NULL');
        $this->addPrimaryKey('order_menu_pkey', 'order_menu', 'id');
        $this->addColumn('orders', 'order_menu_id', 'integer NOT NULL');
    }
}
