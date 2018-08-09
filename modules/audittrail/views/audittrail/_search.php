<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\audittrail\models\AuditTrailEntrySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audit-trail-entry-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'model_type') ?>

    <?= $form->field($model, 'happened_at') ?>

    <?= $form->field($model, 'foreign_pk') ?>

    <?= $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'data') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
