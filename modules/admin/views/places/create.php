<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Places */

$this->title = 'Create Places';
$this->params['breadcrumbs'][] = ['label' => 'Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="places-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
