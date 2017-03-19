<?php
/**
 * Created by PhpStorm.
 * User: kalim_000
 * Date: 3/18/2017
 * Time: 12:07 PM
 */

/* @var $model common\models\News */
?>
<div class="row newsline-block">
    <div class="col-md-4 image">
        <img src="<?='/'.Yii::getAlias('@web').'images/'.$model->image?>">
    </div>
    <div class="col-md-8">
        <div class="news-header">
            <h4><?=$model->title?></h4>
        </div>
        <div class="date-added">
            <?=date('Y.m.d', strtotime($model->created_at))?>
        </div>
        <div class="time-past-added">
            <?=$model->calcTimeAgo()?>
        </div>
        <a href="/news/<?=$model->id?>" class="btn btn-primary mar-top">Read more</a>
    </div>
</div>

