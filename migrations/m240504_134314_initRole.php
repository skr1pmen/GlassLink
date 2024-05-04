<?php

use yii\db\Migration;

class m240504_134314_initRole extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $added = $auth->createPermission('creator');
        $added->description = 'Право добавлять новые товары';
        $auth->add($added);

        $edit = $auth->createPermission('editor');
        $edit->description = 'Право изменять товары';
        $auth->add($edit);

        $delete = $auth->createPermission('deleter');
        $delete->description = 'Право удалять товары';
        $auth->add($delete);

        $admin = $auth->createRole('admin');
        $admin->description = "Роль администратора";
        $auth->add($admin);
        $auth->addChild($admin, $added);
        $auth->addChild($admin, $edit);
        $auth->addChild($admin, $delete);

        $user = $auth->createRole('user');
        $user->description = 'Роль обычного пользователя';
        $auth->add($user);

        $auth->assign($admin, 1);
    }

    public function safeDown()
    {
        echo "m240504_134314_initRole cannot be reverted.\n";

        return false;
    }
}
