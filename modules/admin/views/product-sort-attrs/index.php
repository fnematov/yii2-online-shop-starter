<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\ProductSortAttrsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Sort Attrs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-sort-attrs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Sort Attrs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'status',
            'sort_data',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
