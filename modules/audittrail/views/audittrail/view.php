<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\audittrail\models\AuditTrailEntry */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Audit Trail Entries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audit-trail-entry-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php $addParams = ['id' => $model->id, 'modal' => (isset($_GET['modal']) && $_GET['modal'] == 1)? 1 : 0] ?>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Back to list'), ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'model_type',
            'happened_at',
            'foreign_pk',
            'user_id',
            'type',
            'data:ntext',
        ],
    ]) ?>

</div>
