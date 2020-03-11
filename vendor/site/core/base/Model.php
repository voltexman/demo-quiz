<?php
namespace site\base;


use site\Db;
use Valitron\Validator;

abstract class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];


    public function __construct()
    {
        Db::instance();
    }


    /**
     * @param $data
     */
    public function load($data){
        foreach ($this->attributes as $name => $value){
            if (isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
    }


    /**
     * @param $data
     * @return bool
     */
    public function validate($data){
//        Validator::langDir();
        Validator::lang('ru');
        $validator = new Validator($data);
        $validator->rules($this->rules);
        if ($validator->validate()){
            return true;
        } else {
            $this->errors = $validator->errors();
            return false;
        }
    }


    /**
     *
     */
    public function getErrors(){
        $errors = '<ul>';
        foreach ($this->errors as $error){
            foreach ($error as $item){
                $errors .= "<li>$item</li>";
            }
        }
        $errors .= '</ul>';
        $_SESSION['errors'] = $errors;
    }


    /**
     * @param $table
     * @return int|string
     */
    public function save($table, $valid = true){
        if ($valid){
            $tbl = \R::dispense($table);
        } else {
            $tbl = \R::xdispense($table);
        }

        foreach ($this->attributes as $attribute => $value){
            $tbl->$attribute = $value;
        }
        return \R::store($tbl);
    }

    public function update($table, $id){
        $bean = \R::load($table, $id);
        foreach ($this->attributes as $attribute => $value){
            $bean->$attribute = $value;
        }
        return \R::store($bean);
    }



}