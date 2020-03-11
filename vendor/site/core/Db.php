<?php
namespace site;


class Db
{
    use TSingletone;

    protected function __construct()
    {
        $db = require_once CONFIG . '/db_config.php';
        class_alias('\RedBeanPHP\R', 'R');
        \R::setup($db['dsn'], $db['user'], $db['password']);
        if (!\R::testConnection()){
            throw new \Exception("Don't connection to db", 500);
        }
        \R::freeze(true);
        if (DEBUG){
            \R::debug(true, 1);
        }

        \R::ext('xdispense', function ($type){
            return \R::getRedBean()->dispense($type);
        });
    }

}