<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\audittrail\models\AuditTrailEntry */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Audit Trail Entry',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Audit Trail Entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="audit-trail-entry-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
