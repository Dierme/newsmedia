<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions'=>['class'=>'table table-hover table-striped table-vcenter'],
            'options'=>['style' => 'white-space:inherit;'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'title',
                    'contentOptions' => ['style' => 'max-width:300px;'],
                ],
                [
                    'attribute' => 'text',
                    'contentOptions' => ['style' => 'max-width:300px;'],
                ],
                [
                    'attribute' => 'status',
                    'value' => function($model){
                        $statuses = $model->getStatuses();
                        return $statuses[$model->status];
                    }
                ],
                'created_at',
                // 'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>