<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductParams */

$this->title = 'Update Product Params: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Product Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-params-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
