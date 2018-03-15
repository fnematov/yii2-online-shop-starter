<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductSortAttrs */

$this->title = 'Create Product Sort Attrs';
$this->params['breadcrumbs'][] = ['label' => 'Product Sort Attrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-sort-attrs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'columns' => $columns,
    ]) ?>

</div>
