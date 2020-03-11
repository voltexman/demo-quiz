<?php

namespace site;


class App
{
    // $app container values
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['REQUEST_URI'], "/");
        session_start();
        self::$app = Registry::instance();
        $this->getParams();
        new ErrorHendler();
        Router::dispatch($query);
    }

    /**
     *  return params
     */
    protected function getParams(){
        $params = require_once CONFIG . "/params.php";
        if (!empty($params)){
            foreach ($params as $key => $value){
                self::$app->setProperty($key, $value);
            }
        }
    }


}