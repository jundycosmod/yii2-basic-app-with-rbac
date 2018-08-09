<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\audittrail\models\AuditTrailEntrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Audit Trail Entries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audit-trail-entry-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Audit Trail Entry'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'model_type',
            'happened_at',
            'foreign_pk',
            'user_id',
            // 'type',
            // 'data:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'template' => "{".implode("} {", Yii::$app->session['rights'])."}",],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
