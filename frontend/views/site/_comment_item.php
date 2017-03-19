<?php
/**
 * Created by PhpStorm.
 * User: kalim_000
 * Date: 3/19/2017
 * Time: 12:42 AM
 */

/* @var $model common\models\Comments */
use yii\helpers\Html;
?>

<div class="row pad-top pad-bot">
    <div class="col-md-8 comment-area">
        <div class="col-md-2 pad-bot">
            <div class="avatar">
                <img src="<?='/'.Yii::getAlias('@web').'images/av1.png'?>">
            </div>
        </div>
        <div class="col-md-8">
            <div><?=date('Y.m.d h:i', strtotime($model->created_at))?></div>
            <div><?=Html::encode($model->text)?></div>
        </div>
    </div>
</div>
