<?php
use app\modules\profile\models\Profile;
use app\modules\delivery\models\Delivery;
use kartik\helpers\Html;
use asinfotrack\yii2\audittrail\widgets\AuditTrail;
use kartik\select2\Select2;
$model = new Delivery();
?>
<?php
// Without model and implementing a multiple select
echo '<label class="control-label">'. Yii::t('app', 'Modules') .'</label>';
echo Select2::widget([
    'name' => 'model_type',
    'data' => $modelType,
    'options' => [
        'placeholder' => Yii::t('app', 'Select Module ...'),
        'multiple' => false
    ],
]);
    ?>
<?= AuditTrail::widget([
    //'dataProvider' => $dataProvider,
    'model'=> $model,
    //'filterModel'=>$searchModel,

//     some of the optional configurations
    'userIdCallback'=>function ($userId, $model) {
        return Profile::findOne($userId)->name;
    },
    'changeTypeCallback'=>function ($type, $model) {
        return Html::tag('span', strtoupper($type), ['class'=>'label label-info']);
    },
    'dataTableOptions'=>['class'=>'table table-condensed table-bordered'],
]) ?>