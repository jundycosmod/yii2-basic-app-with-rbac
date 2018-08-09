<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\GlobalSettings */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Global Settings',
]) . $model->settings_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Global Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->settings_name, 'url' => ['view', 'id' => $model->settings_name]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="global-settings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
