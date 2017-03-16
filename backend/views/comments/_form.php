<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'news_id')->widget(Select2::classname(), [
            'data' => $news,
            'options' => ['placeholder' => 'Select news ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
    ]);
    ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->widget(Select2::classname(), [
        'data' => $model->getStatuses(),
        'options' => ['placeholder' => 'Select a status ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
