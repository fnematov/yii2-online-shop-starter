<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\WidgetCarouselSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Widget Carousels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-carousel-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Yii::getAlias('@storage') ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Widget Carousel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php try {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [ 'class' => 'yii\grid\SerialColumn' ],
            
                //'id',
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
                //'content:ntext',
                //'status',
                //'order',
                //'key',
                //'created_at',
                //'updated_at',
            
                [ 'class' => 'yii\grid\ActionColumn' ],
            ],
        ]);
    } catch ( Exception $e ) {
    } ?>
</div>
