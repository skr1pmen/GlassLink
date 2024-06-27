<?php
/**
 * @var $model ;
 * @var $menu ;
 */

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

        <div class="tables">
            <?php for ($i = 1; $i <= 25; $i++): ?>
                <?=
                $form->field($model, 'table')->
                input('button', ['value' => $i, 'id' => 'tableBtn'])->
                label('')
                ?>
            <?php endfor; ?>
        </div>

        <div>
            <?= $form->field($model, 'start_time')->input('time') ?>
        </div>
        <div>
            <?= $form->field($model, 'end_time')->input('time') ?>
        </div>

        <div>
            <?= $form->field($model, 'not_order')->checkbox(['id' => 'checkOrder']) ?>
        </div>

        <?= Html::submitButton('Создать', ['class' => 'btn']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<script>
    let checkbox = document.querySelector('#checkOrder');
    checkbox.addEventListener('change', () => {
        console.log(checkbox.checked);
    })

</script>