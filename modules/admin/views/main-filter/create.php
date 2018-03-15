<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MainFilter */

$this->title = 'Create Main Filter';
$this->params['breadcrumbs'][] = ['label' => 'Main Filters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-filter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
