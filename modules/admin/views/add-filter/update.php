<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AddFilter */

$this->title = 'Update Add Filter: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Add Filters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="add-filter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
