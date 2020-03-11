<?php


namespace site;


trait TSingletone
{
    public static $instance;

    /**
     * @return TSingletone
     */
    public static function instance(){
        if (self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

}