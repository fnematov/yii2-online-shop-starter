<?php

use app\models\Brands;
use app\models\Products;
use unclead\multipleinput\MultipleInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'related_product_id')->dropDownList(ArrayHelper::map(Products::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'img')->fileInput(['class' => 'dropify']) ?>

    <?= $form->field($model, 'is_main_page')->checkbox() ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'schedule')->widget(MultipleInput::className(), [
        'columns' => [
            [
                'name' => 'brands',
                'type' => 'dropDownList',
                'items' => ArrayHelper::map(Brands::find()->all(), 'id', 'name'),
                'options' => [
                    'prompt' => 'Choose brand'
                ]
            ],
        ],
        'addButtonOptions' => ['class' => 'btn btn-success']
    ])->label('Прмкрепить бренд') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
