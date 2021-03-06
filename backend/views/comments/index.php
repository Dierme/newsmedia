<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'News Title',
                'attribute' => 'news_title',
                'format' => 'raw',
                'value' => function($model){
                    $news = $model->getNews()->one();
                    $htmlStr = "<a href=\"/admin/news/view?id={$news->id}\">{$news->title}</a>";
                    return $htmlStr;
                }
            ],
            'text:ntext',
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
