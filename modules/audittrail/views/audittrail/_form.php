<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\audittrail\models\AuditTrailEntry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audit-trail-entry-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'model_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'happened_at')->textInput() ?>

    <?= $form->field($model, 'foreign_pk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Back to list'), ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
