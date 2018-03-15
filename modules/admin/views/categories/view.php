<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-view">

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
                //            'id',
                'name',
                'status',
                [
                    'attribute' => 'relatedProduct.name',
                    'label' => 'Related product name'
                ],
                [
                    'attribute' => 'img',
                    'format' => 'html',
                    'value' => function ( $model ) {
                        return Html::img('/uploads/' . $model->img, [ 'style' => 'max-width: 200px' ]);
                    }
                ],
                'is_main_page',
                'meta_keywords',
                'meta_description',
            ],
        ]);
    } catch ( Exception $e ) {
        echo $e->getMessage();
    } ?>

</div>
