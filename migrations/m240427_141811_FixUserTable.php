<?php

use yii\db\Migration;

class m240427_141811_FixUserTable extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('users', 'name', $this->string());
        $this->alterColumn('users', 'surname', $this->string());
        $this->dropColumn('sale_card', 'date');
        $this->addColumn('sale_card', 'date', $this->date()->defaultExpression('CURRENT_DATE'));
    }

    public function safeDown()
    {
        echo "m240427_141811_FixUserTable cannot be reverted.\n";

        return false;
    }
}
