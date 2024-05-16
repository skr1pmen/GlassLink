<?php
/**
 * @var $model ;
 * @var $categories ;
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$cat = [];
foreach ($categories as $category) {
    $cat[$category->id] = $category->title;
}

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
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        <div>
            <?= $form->field($model, 'description')->textarea() ?>
        </div>
        <div>
            <?= $form->field($model, 'compound')->textarea() ?>
        </div>
        <div>
            <?= $form->field($model, 'price')->input('number') ?>
        </div>
        <div>
            <?= $form->field($model, 'volume')->input('number') ?>
        </div>
        <div>
            <?= $form->field($model, 'category_id')->dropDownList($cat) ?>
        </div>
        <?= Html::submitButton('Создать', ['class' => 'btn']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
