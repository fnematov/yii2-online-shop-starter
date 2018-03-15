<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'img',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img('/uploads/' . $model->img, ['style' => 'max-width: 200px']);
                }
            ],
            'price',
            'discount',
            //'content:ntext',
            //'category_id',
            //'rating',
            //'brand_id',
            //'short_desc:ntext',
            //'main_params_json:ntext',
            //'created_at',
            //'updated_at',
            //'status',
            //'meta_keywords',
            //'meta_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
