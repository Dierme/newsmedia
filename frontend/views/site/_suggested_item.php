<?php
/**
 * Created by PhpStorm.
 * User: kalim_000
 * Date: 3/18/2017
 * Time: 11:20 PM
 */

/* @var $model common\models\News */
?>

<div class="row pad-bot pad-top">
    <div class="col-md-12">
        <div class="image">
            <img src="<?='/images/'.$model->image?>">
        </div>
        <div class="news-header text-center">
            <a href="<?='/news/'.$model->id?>">
                <strong><?=$model->title?></strong>
            </a>
        </div>
        <div class="time-past-added text-center">
            <?=$model->calcTimeAgo()?>
        </div>
    </div>
</div>
