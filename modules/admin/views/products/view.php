<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create', ['create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            [
                'attribute' => 'img',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img('/uploads/' . $model->img, ['style' => 'max-width: 200px']);
                }
            ],
            'price:currency',
            'discount',
            'content:ntext',
            'category_id',
            'rating',
            'brand_id',
            'short_desc:ntext',
            'main_params_json:ntext',
            'created_at',
            'updated_at',
            'status',
            'meta_keywords',
            'meta_description',
        ],
    ]) ?>

</div>
