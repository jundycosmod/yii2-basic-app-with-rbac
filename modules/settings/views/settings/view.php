<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\GlobalSettings */

$this->title = $model->settings_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Global Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="global-settings-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php $addParams = ['id' => $model->id, 'modal' => (isset($_GET['modal']) && $_GET['modal'] == 1)? 1 : 0] ?>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->settings_name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->settings_name], [
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
            'settings_name',
            'settings_value',
        ],
    ]) ?>

</div>
