<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\audittrail\models\AuditTrailEntry */

$this->title = Yii::t('app', 'Create Audit Trail Entry');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Audit Trail Entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audit-trail-entry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
