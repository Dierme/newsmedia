<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Comments */

$this->title = 'Create Comments';
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'news' => $news,
        'model' => $model,
    ]) ?>

</div>
