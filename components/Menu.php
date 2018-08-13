<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\db\Query;

//use yii\base\InvalidConfigException;

class Menu extends Component {

    /**
     * Controller id
     * @var String
     */
    public $controller_id;

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

        $this->menus['items'] = $this->generateMenu(Yii::$app->id);
//        echo "<pre>";
        //        print_r($this->menus); die();
        //
        return $this->menus;
    }

    private function generateMenu($parent) {
        $query = new Query;
        $menuDetails = [];
        $returnMenuDetails = [];
        $query->select('sm.menu_name, sm.caption as label, sm.link as url, sm.icon')
            ->from('system_menu sm')
            ->leftJoin('user_rights ur', 'sm.menu_name = ur.menu_name')
            ->where(['ur.user_id' => Yii::$app->user->identity->id, 'sm.enabled' => 1, 'sm.parent' => $parent])
            ->orderby('sm.position');

        $command = $query->createCommand();

        $dataReader = $command->queryAll();
        foreach ($dataReader as $menu) {
            //echo $menu['label'];
            $menuDetails = [
                'label' => $menu['label'],
                'url' => Yii::$app->urlManager->createUrl($menu['url']),
                'icon' => ($menu['icon'] != null) ? $menu['icon'] : ""];

            $subquery = new Query;
            $subquery->select('sm.caption as label, sm.link as url, sm.icon')
                ->from('system_menu sm')
                ->leftJoin('user_rights ur', 'sm.menu_name = ur.menu_name')
                ->where(['ur..user_id' => Yii::$app->user->identity->id, 'sm.enabled' => 1, 'sm.parent' => $menu['menu_name']])
                ->orderby('sm.position');
            //->limit(1);

            $subcommand = $subquery->createCommand();
            $subdataReader = $subcommand->queryAll();
//            var_dump($subdataReader);
            //            die();
            if (count($subdataReader) > 0) {
                $menuDetails['items'] = $this->generateMenu($menu['menu_name']);
            }
            $returnMenuDetails[] = $menuDetails;
        }

        return $returnMenuDetails;
    }

}
