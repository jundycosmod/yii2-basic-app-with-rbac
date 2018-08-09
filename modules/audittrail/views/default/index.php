<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\profile\models\Profile;
use asinfotrack\yii2\audittrail\behaviors\AuditTrailBehavior;
use asinfotrack\yii2\audittrail\widgets\AuditTrail;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\audittrail\models\AuditTrailEntrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Audit Trail Entries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audit-trail-entry-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?php Pjax::begin(); ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'happened_at:datetime',
            [
                'attribute' => 'model_type',
                'format' => 'text',
                'value' => function ($model) {
                    return end(explode('\\', $model->model_type));
                },
            ],
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return Profile::findOne($model->user_id)->name;
                },
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::tag('span', strtoupper($model->type), ['class' => 'label label-info']);
                },
            ],
            //'foreign_pk',
            [
                'attribute' => 'foreign_pk',
                'format' => 'text',
                'value' => function ($model) {
                    $ids = \yii\helpers\Json::decode($model->foreign_pk);
                    foreach ($ids as $key => $value) {
                        $id = $semiColumn . $key . ":" . $value;
                        $semiColumn = "; ";
                    }
                    return $id;
                },
            ],
            [
                'attribute' => 'data',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) use ($attributeOutput, $dataTableOptions) {
                    $dataTableOptions = ['class' => 'table table-condensed table-bordered'];
                    $dataTableColumnWidths = [
                        'attribute' => null,
                        'from' => '30%',
                        'to' => '30%',
                    ];
                    /* @var $model \yii\db\ActiveRecord */

                    //catch empty data
                    $changes = \yii\helpers\Json::decode($model->data);
                    if ($changes === null || count($changes) === 0) {
                        return null;
                    }

                    $ret = Html::beginTag('table', $dataTableOptions);

                    //colgroup
                    $ret .= Html::beginTag('colgroup');
                    $widths = $dataTableColumnWidths;
                    $ret .= Html::tag('col', '', ['style' => sprintf('width: %s;', isset($widths['attribute']) ? $widths['attribute'] : 'auto')]);
                    if ($model->type === AuditTrailBehavior::AUDIT_TYPE_UPDATE) {
                        $ret .= Html::tag('col', '', ['style' => sprintf('width: %s;', isset($widths['from']) ? $widths['from'] : 'auto')]);
                    }
                    $ret .= Html::tag('col', '', ['style' => sprintf('width: %s;', isset($widths['to']) ? $widths['to'] : 'auto')]);

                    //table head
                    $ret .= Html::beginTag('thead');
                    $ret .= Html::beginTag('tr');
                    $ret .= Html::tag('th', Yii::t('app', 'Attribute'));
                    if ($model->type === AuditTrailBehavior::AUDIT_TYPE_UPDATE) {
                        $ret .= Html::tag('th', Yii::t('app', 'From'));
                    }
                    $ret .= Html::tag('th', Yii::t('app', 'To'));
                    $ret .= Html::endTag('tr');
                    $ret .= Html::endTag('thead');

                    //table body
                    $ret .= Html::beginTag('tbody');
                    foreach ($changes as $change) {
                        //skip hidden attributes
//                        if (in_array($change['attr'], $this->hiddenAttributes))
//                            continue;
                        //render data row
                        $ret .= Html::beginTag('tr');
                        $className = $model->model_type;
                        $modelType = Yii::createObject([
                                    'class' => $className,
                        ]);
                        $ret .= Html::tag('td', $modelType->getAttributeLabel($change['attr']));
                        if ($model->type === AuditTrailBehavior::AUDIT_TYPE_UPDATE) {
                            //$ret .= Html::tag('td', AuditTrail::formatValue($change['attr'], $change['from']));
                            $ret .= Html::tag('td', $change['from']);
                        }
//                        $ret .= Html::tag('td', AuditTrail::formatValue($change['attr'], $change['to']));
                        $ret .= Html::tag('td', $change['to']);
                        $ret .= Html::endTag('tr');
                    }
                    $ret .= Html::endTag('tbody');

                    $ret .= Html::endTag('table');

                    return $ret;
                },
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?></div>
