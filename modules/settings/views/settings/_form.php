<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\GlobalSettings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="global-settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'settings_name')->textInput(['maxlength' => true, 'readonly' => !$model->isNewRecord]) ?>

    <?= $form->field($model, 'settings_value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Back to list'), ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
