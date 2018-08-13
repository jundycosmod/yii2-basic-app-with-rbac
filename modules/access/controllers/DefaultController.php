<?php

namespace app\modules\access\controllers;

use app\modules\access\models\SystemMenu;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * DefaultController implements the CRUD actions for SystemMenu model.
 */
class DefaultController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        /**
         * Used to store user rights
         */
        $session = Yii::$app->session;

        $model = new SystemMenu;
        $right_array = $model->setright();
        $allow = (count($right_array) > 0) ? true : false;
        $session['rights'] = $right_array;

        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => $allow,
                        'actions' => $right_array,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all SystemMenu models.
     * @return mixed
     */
    public function actionIndex() {
        $model = new \app\modules\access\models\UserRights();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single SystemMenu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SystemMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new \app\modules\access\models\UserRights();

        $rights = array_filter(Yii::$app->request->post()['rights']);

        if (Yii::$app->request->post()) {
            $delete_user_rights = "DELETE FROM user_rights WHERE user_id = '" . Yii::$app->request->post()['user_id'] . "'";

            Yii::$app->db->createCommand($delete_user_rights)->execute();

            foreach ($rights as $right) {
                $newRights = $this->processRights($right);
                $data .= $comma . "('" .
                Yii::$app->request->post()['user_id'] . "','" .
                    (($newRights[1] == "") ? 0 : $newRights[1]) . "','" .
                    (($newRights[0][0] == "") ? 0 : $newRights[0][0]) . "','" .
                    (($newRights[0][1] == "") ? 0 : $newRights[0][1]) . "','" .
                    (($newRights[0][2] == "") ? 0 : $newRights[0][2]) . "','" .
                    (($newRights[0][3] == "") ? 0 : $newRights[0][3]) . "','" .
                    (($newRights[0][4] == "") ? 0 : $newRights[0][4])
                    . "')";
                $comma = ",";
            }

            $query = "REPLACE INTO " . $model->tableName() .
            " (`" . implode("`,`", array_diff(array_keys($model->attributes), ['id'])) . "`) " .
                " VALUES " . $data;

            if (Yii::$app->db->createCommand($query)->execute()) {
                echo "1";
            } else {
                echo "0";
            }
        }

    }

    /**
     * Updates an existing SystemMenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SystemMenu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SystemMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SystemMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SystemMenu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function processRights($rights) {

        $processedRights = str_replace("<!--", "", explode("-->", $rights));
        return explode("-", $processedRights[0]);
    }

}
