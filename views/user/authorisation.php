<?php
/** @var $model ; */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="form">
    <div class="form__wrapper">
        <h1><?= $this->title ?></h1>
        <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'label'],
                'inputOptions' => ['class' => 'input'],
                'errorOptions' => ['class' => 'error']
            ]
        ]) ?>

        <div>
            <?= $form->field($model, 'phone')->textInput() ?>
        </div>
        <div>
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
        <?= Html::submitButton('Войти', ['class' => 'btn']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
