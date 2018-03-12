<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WidgetCarousel */

$this->title = 'Create Widget Carousel';
$this->params['breadcrumbs'][] = ['label' => 'Widget Carousels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-carousel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
