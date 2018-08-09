<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\db\Query;

//use yii\base\InvalidConfigException;

class Rights extends Component {

    /**
     * Controller id
     * @var String
     */
    public $controller_id = "default";

    /**
     * array for rights
     */
    public $rights = array();

    public function getRights() {
        /**
         * Check if guest, the system will not continue checking and it will redirect to login.
         */
        if(Yii::$app->user->isGuest){
            return $this->rights;
        }
        
        $right_array = array();

//        $grp_name = Yii::app()->db->createCommand("SELECT GRP_NAME FROM RD8100 WHERE USE_CODE='" . Yii::app()->user->id . "'")->queryRow();
//        if (isset($grp_name['GRP_NAME']) && $grp_name['GRP_NAME'] != '') {
//           // die("select * from SYSGRP_RIGHTS WHERE GRP_NAME='" . $grp_name['GRP_NAME'] . "' AND MNU_NAME='" . $this->controller_id . "'");
//            $rights = Yii::app()->db->createCommand("select * from SYSGRP_RIGHTS WHERE GRP_NAME='" . $grp_name['GRP_NAME'] . "' AND MNU_NAME='" . $this->controller_id . "'");
//        } else {
        $query = new Query;
        $query->select('*')
                ->from('user_rights')
                ->where(['user_id'=> Yii::$app->user->identity->id, 'menu_name' => $this->controller_id])
                ->limit(1);
        $command = $query->createCommand();
//        $data = $command->queryAll();
//        $out['results'] = array_values($data);
//        $rights = Yii::app()->db->createCommand("select * from user_rights WHERE user_id='" . Yii::$app->user->identity->id . "' AND menu_name='" . $this->controller_id . "'");
//        //}
        $dataReader = $command->queryAll();
        //var_dump($dataReader); die();
        //var_dump($dataReader); die();
        foreach ($dataReader as $rights) {

            $this->rights['view'] = 1;

            $this->rights['index'] = 1;
            
            $this->rights['create'] = ($rights['flag1'] == 1) ? 1 : null;
            
            $this->rights['update'] = ($rights['flag2'] == 1) ? 1 : null;
            
            $this->rights['delete'] = ($rights['flag3'] == 1) ? 1 : null;
            
            $this->rights['view_cost'] = ($rights['flag4'] == 1) ? 1 : null;
            
            $this->rights['view_price'] = ($rights['flag5'] == 1) ? 1 : null;
            
        }

        
        if (isset($this->rights['view'])) {
            //$allow = true;
            array_push($right_array, 'view');
            array_push($right_array, 'index');
            
            if (isset($this->rights['create'])){
                 array_push($right_array, 'create');
            }
               
            if (isset($this->rights['update'])){
                array_push($right_array, 'update');
            }
                
            if (isset($this->rights['delete'])){
                array_push($right_array, 'delete');
            }
                
        }
        return $right_array;
    }

}
