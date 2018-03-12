<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WidgetCarousel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Widget Carousels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-carousel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php try {
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
//                'id',
                [
                    'attribute' => 'img',
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::img('/uploads/' . $model->img, ['style' => 'max-width: 200px']);
                    }
                ],
                'url:url',
                'small_caption',
                'main_caption',
                'content:html',
                'status',
                'order',
                'key',
                'created_at:datetime',
                'updated_at:datetime',
            ],
        ]);
    } catch ( Exception $e ) {
    } ?>

</div>
