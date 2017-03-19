<?php

/**
 * Created by PhpStorm.
 * User: kalim_000
 * Date: 3/18/2017
 * Time: 9:36 PM
 */
/* @var $suggestedProvider yii\data\ActiveDataProvider */
/* @var $commentsProvider yii\data\ActiveDataProvider */
/* @var $model common\models\News */
/* @var $this yii\web\View */
use yii\widgets\ListView;

$this->title = $model->title;
?>

<div class="row pad-bot">
    <div class="col-md-8 col-sm-12 news-view pad-bot">
        <div class="col-md-12">
            <h2><?=$model->title?></h2>
        </div>
        <div class="col-md-12">
            <h5>
                Published
                <?=date('Y.m.d', strtotime($model->created_at))?>,
                <?=$model->calcTimeAgo()?>
            </h5>
        </div>
        <div class="col-md-12">
            <div class="image">
                <img src="<?='/'.Yii::getAlias('@web').'images/'.$model->image?>">
            </div>
        </div>
        <div class="col-md-12 news-text">
            <?=$model->text?>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 suggested-news">
        <div>
            <h2>Suggested news</h2>
        </div>
        <?= ListView::widget([
            'dataProvider' => $suggestedProvider,
            'itemView' => '_suggested_item',
            'summary'=>'',
        ]);
        ?>
    </div>
</div>
<div id="comments-list">
    <?= ListView::widget([
            'dataProvider' => $commentsProvider,
            'itemView' => '_comment_item',
            'summary'=>'',
    ]);
    ?>
</div>

<div class="row pad-top pad-bot">
    <div class="col-md-8 comment-area">
        <div style="margin: 0 10% 0 10%">
            <textarea id="comment-text" rows="5" placeholder="Leave a comment" style="width: 100%"></textarea>
            <button class="btn btn-primary" id="comment-submit">Comment</button>
        </div>
    </div>
</div>


