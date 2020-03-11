<?php
namespace app\widgets\menu;

use mery\App;

class Menu {

    protected $tpl;
    protected $menu;
    protected $categories;

//    $this->tpl = __DIR__ . '/menu_tpl/menu.php';

    public function __construct($tpl){
        $this->tpl = __DIR__ . '/menu_tpl/' . $tpl;
        $this->run();
    }


    protected function run(){
        $this->menu = App::$app->getProperty('menu');
        $this->categories = App::$app->getProperty('categories');
        echo $this->getHtml();
    }



    protected function getHtml(){
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }

}