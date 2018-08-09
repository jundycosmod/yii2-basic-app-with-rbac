<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\GlobalSettings */

$this->title = Yii::t('app', 'Create Global Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Global Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="global-settings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
