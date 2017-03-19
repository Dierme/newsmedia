<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


use yii\widgets\ListView;

$this->title = 'News Media';

?>

<div class="row">
    <div class="col-md-12">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_news_item',
            'summary'=>'',
        ]);
        ?>
    </div>
</div>