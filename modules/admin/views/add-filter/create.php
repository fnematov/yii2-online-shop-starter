<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AddFilter */

$this->title = 'Create Add Filter';
$this->params['breadcrumbs'][] = ['label' => 'Add Filters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="add-filter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
