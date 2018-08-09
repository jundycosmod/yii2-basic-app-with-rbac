<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\db\Query;

//use yii\base\InvalidConfigException;

class SystemMenu extends Component {

    /**
     * Controller id
     * @var String
     */
    public $controller_id;
    
    /**
     * @var $user_id integer
     */
    public $user_id;

    /**
     * array for rights
     */
    public $menus;

    public function getMenus() {
        /**
         * Check if guest, the system will not continue checking and it will redirect to login.
         */
        if (Yii::$app->user->isGuest) {
            return $this->menus;
        }

        $this->menus = $this->generateMenu('ximplepos');
//        echo "<pre>";
//        print_r($this->menus); die();  
//        
        return $this->menus;
    }

    private function generateMenu($parent) {
        //$this->user_id = 1;
        $query = new Query;
        $menuDetails = [];
        $returnMenuDetails = [];
        $query->select(['sm.menu_name', 'sm.caption as label', 'sm.link as url', 'sm.icon'
                , ' CONCAT(IFNULL(flag1,0),IFNULL(flag2,0),IFNULL(flag3,0),IFNULL(flag4,0),IFNULL(flag5,0)) as `rights`'])
                ->from('system_menu sm')
                ->leftJoin('user_rights ur', 'sm.menu_name = ur.menu_name and ur.user_id = "'.$this->user_id.'"')
                ->where(['sm.enabled' => 1, 'sm.parent' => $parent])
                ->orderby('sm.position');

        $command = $query->createCommand();

        $dataReader = $command->queryAll();
        foreach ($dataReader as $menu) {
            //echo $menu['label'];
            $menuDetails = [
                'key' => $menu['menu_name'],
                'selected' => ($menu['rights']+0 > 0) ? true : false,
                //'lazy' => $menu['rights'],
                'title' => "<!--{$menu['rights']}-{$menu['menu_name']}-->".$menu['label'],
                //'url' => array($menu['url']),
                'icon' => ($menu['icon'] != null) ? $menu['icon'] : "" ];
            
            $subquery = new Query;
            $subquery->select('sm.menu_name, sm.caption as label, sm.link as url, sm.icon,'
                . ' CONCAT(`flag1`,`flag2`,`flag3`,`flag4`,`flag5`) as `rights`')
                    ->from('system_menu sm')
                    ->leftJoin('user_rights ur', 'sm.menu_name = ur.menu_name and ur.user_id = "'.$this->user_id.'"')
                    ->where(['sm.enabled' => 1, 'sm.parent' => $menu['menu_name']])
                    ->orderby('sm.position');
                    //->limit(1);
            //$this->user_id
            $subcommand = $subquery->createCommand();
            $subdataReader = $subcommand->queryAll();
//            var_dump($subdataReader);
//            die();
            if(count($subdataReader) > 0){
               $menuDetails['children'] = $this->generateMenu($menu['menu_name']);
            }
            $returnMenuDetails[] = $menuDetails;
        }
        
        return $returnMenuDetails;
    }

}
