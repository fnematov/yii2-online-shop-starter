<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\WidgetCarousel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-carousel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img')->fileInput(['class' => 'dropify', 'data-default-file' => '/uploads/' . $model->img]) ?>
    
    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->widget(MaskedInput::className(), [
        'name' => 'url',
        'clientOptions' => [
            'alias' => 'url'
        ]
    ]) ?>

    <?= $form->field($model, 'small_caption')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_caption')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
