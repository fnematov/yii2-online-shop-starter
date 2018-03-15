<?php

use app\models\Categories;
use unclead\multipleinput\MultipleInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Brands */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brands-form">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>
    
    <?= $form->field($model, 'status')->checkbox() ?>
    
    <?= $form->field($model, 'schedule')->widget(MultipleInput::className(), [
        'columns' => [
            [
                'name' => 'categories',
                'type' => 'dropDownList',
                'items' => ArrayHelper::map(Categories::find()->all(), 'id', 'name'),
                'options' => [
                    'prompt' => 'Choose category'
                ]
            ],
        ],
        'addButtonOptions' => ['class' => 'btn btn-success']
    ])->label('Прмкрепить категории') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', [ 'class' => 'btn btn-success' ]) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
