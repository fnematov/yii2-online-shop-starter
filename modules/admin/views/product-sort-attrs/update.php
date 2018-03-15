<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSortAttrs */

$this->title = 'Update Product Sort Attrs: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Product Sort Attrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-sort-attrs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'columns' => $columns,
    ]) ?>

</div>
