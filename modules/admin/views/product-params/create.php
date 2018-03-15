<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductParams */

$this->title = 'Create Product Params';
$this->params['breadcrumbs'][] = ['label' => 'Product Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-params-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
