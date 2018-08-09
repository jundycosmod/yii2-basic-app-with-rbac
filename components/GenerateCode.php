<?php
namespace app\components;

use Yii;
use yii\base\Component;
use yii\db\Query;
use app\models\AutoNumber;

class GenerateCode extends Component{
    
    private $number = 1;

    /**
     * @inheritdoc
     */
    public function getCode($model, $padding, $length)
    {
        //$this->number = '1'; die($this->number);
        $unusedQuery = new Query;
        $unusedQuery->select('min(number) as number')
                 ->from('auto_number')
                 ->where(['model' => $model, 'used' => 0]);
            
        $unusedCommand = $unusedQuery->createCommand();
        $unusedDataReader = $unusedCommand->queryAll();
        //var_dump($unusedDataReader[0]['number']); die();
        if($unusedDataReader[0]['number'] !== '' && $unusedDataReader[0]['number'] !== NULL){
       
               $this->number = $unusedDataReader[0]['number'];
        }else{
            $usedQuery = new Query;
            $usedQuery->select('max(number)+1 as number')
                     ->from('auto_number')
                     ->where(['model' => $model, 'used' => 1]);

            $usedCommand = $usedQuery->createCommand();
            $usedDataReader = $usedCommand->queryAll();
            
            if($usedDataReader[0]['number'] !== '' && $usedDataReader[0]['number'] !== NULL){
                $this->number = $usedDataReader[0]['number'];
            }
        }
        //var_dump($this->number); die();
        $this->number = ($padding == 1) ? sprintf("%0{$length}d", $this->number) : $this->number;
        return $this->number;

    }
    
    /**
     * @inheritdoc
     */
    public function saveCode($model,$code)
    {
        //$this->number = '1'; die($this->number);
        $saveQuery = AutoNumber::findOne(array('model' => $model, 'number' => $code ));
        //var_dump($saveQuery);
        if (!$saveQuery) $saveQuery = new AutoNumber;
        $saveQuery->model = $model;
        $saveQuery->number = $code;
        $saveQuery->used = 1;
        
        try{
            $saveQuery->save();
        } catch (Exception $ex) {
            /**
             * Change to a meaningful error message
             */
            die($ex);
        }
    }
    
    /**
     * @inheritdoc
     */
    public function deleteCode($model,$code)
    {
        $deleteQuery = AutoNumber::findOne(array('model' => $model, 'number' => $code ));
        $deleteQuery->used = 0;
        
        try{
            $deleteQuery->save(false);
        } catch (Exception $ex) {
            /**
             * Change to a meaningful error message
             */
            die($ex);
        }
    }
}