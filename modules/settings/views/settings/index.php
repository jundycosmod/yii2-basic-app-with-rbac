<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\settings\models\GlobalSettingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Global Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="global-settings-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Global Settings'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'settings_name',
            'settings_value',

            ['class' => 'yii\grid\ActionColumn',
                'template' => "{".implode("} {", Yii::$app->session['rights'])."}",],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
