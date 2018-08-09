<?php

namespace app\modules\audittrail\controllers;

use yii\web\Controller;
use app\modules\audittrail\models\AuditTrailEntrySearch;
use Yii;

/**
 * Default controller for the `audittrail` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AuditTrailEntrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $modelType = \app\modules\audittrail\models\AuditTrailEntry::findModelTypes();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelType' => $modelType
        ]);
    }
}
