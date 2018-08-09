<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\profile\models\ProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'public_email') ?>

    <?= $form->field($model, 'gravatar_email') ?>

    <?= $form->field($model, 'gravatar_id') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'bio') ?>

    <?php // echo $form->field($model, 'timezone') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
