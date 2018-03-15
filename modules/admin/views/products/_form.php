<?php

use app\models\AddFilter;
use app\models\Categories;
use app\models\MainFilter;
use app\models\ProductParams;
use app\models\Products;
use kartik\depdrop\DepDrop;
use trntv\filekit\widget\Upload;
use unclead\multipleinput\MultipleInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model) ?>
    
    <?= $form->field($model, 'name')->textInput([ 'maxlength' => true ]) ?>
    
    <?php echo $form->field($model, 'slug')
        ->hint(Yii::t('app', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'file')->widget(
        Upload::className(),
        [
            'url' => ['/admin/file-storage/upload'],
            'maxFileSize' => 5000000, // 5 MiB
        ]);
    ?>
    
    <?php echo $form->field($model, 'attachments')->widget(
        Upload::className(),
        [
            'url' => ['/admin/file-storage/upload'],
            'sortable' => true,
            'maxFileSize' => 10000000, // 10 MiB
            'maxNumberOfFiles' => 16
        ]);
    ?>
    
    <?= $form->field($model, 'price')->textInput() ?>
    
    <?= $form->field($model, 'discount')->textInput() ?>
    
    <?= $form->field($model, 'short_desc')->textarea([ 'rows' => 6 ]) ?>
    
    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [ 'height' => 400 ]),
    ]); ?>
    
    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Categories::find()->all(), 'id', 'name'), [ 'id' => 'category', 'prompt' => 'Select category' ]) ?>
    
    <?= $form->field($model, 'brand_id')->widget(DepDrop::classname(), [
        'options' => [ 'id' => 'brands' ],
        'pluginOptions' => [
            'depends' => [ 'category' ],
            'placeholder' => 'Select brand',
            'url' => Url::to([ 'products/brands-list' ])
        ]
    ]); ?>
    
    <?= $form->field($model, 'status')->checkbox() ?>
    
    <?= $form->field($model, 'meta_keywords')->textInput([ 'maxlength' => true ]) ?>
    
    <?= $form->field($model, 'meta_description')->textInput([ 'maxlength' => true ]) ?>
    
    <?= $form->field($model, 'product_main_filter')->checkboxList(ArrayHelper::map(MainFilter::find()->all(), 'id', 'name')) ?>
    
    <?= $form->field($model, 'product_add_filter')->checkboxList(ArrayHelper::map(AddFilter::find()->where(['not', ['parent_id' => null]])->all(), 'id', 'name'))->label('Выберите допольнительной филтеры') ?>
    
    <?= $form->field($model, 'schedule')->widget(MultipleInput::className(), [
        'columns' => [
            [
                'name' => 'product_params',
                'type' => 'dropDownList',
                'items' => ArrayHelper::map(ProductParams::find()->all(), 'id', 'name'),
                'options' => [
                    'prompt' => 'Choose param'
                ]
            ],
            [
                'name' => 'product_params_value',
                'options' => [
                    'placeholder' => 'Enter value'
                ]
            ],
            [
                'name' => 'product_main_param',
                'type' => 'checkbox',
                'options' => [
                    'label' => 'Show main part'
                ]
            ],
        ],
        'addButtonOptions' => ['class' => 'btn btn-success']
    ])->label('Вставте главныйе параметры') ?>
    
    <?= $form->field($model, 'self_params')->widget(MultipleInput::className(), [
        'columns' => [
            [
                'name' => 'product_self_param',
                'options' => [
                    'placeholder' => 'Enter param'
                ]
            ],
            [
                'name' => 'product_self_param_value',
                'options' => [
                    'placeholder' => 'Enter value'
                ]
            ],
        ],
        'addButtonOptions' => ['class' => 'btn btn-success']
    ])->label('Вставте Индивидуальные параметры') ?>
    
    <?= $form->field($model, 'related_products')->checkboxList(ArrayHelper::map(Products::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', [ 'class' => 'btn btn-success' ]) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
