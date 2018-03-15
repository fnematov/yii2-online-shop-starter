<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MainFilter */

$this->title = 'Update Main Filter: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Main Filters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="main-filter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
