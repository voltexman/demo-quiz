<?php
namespace app\models\admin;

class User extends \app\models\User{

    public $attributes = [
        'id' => '',
        'username' => '',
//        'first_name' => '',
//        'last_name' => '',
//        'phone' => '',
        'email' => '',
        'password' => '',
//        'active' => '',
//        'role' => '',
    ];


    public $rules = [
        'required' => [
            ['username'],
//            ['last_name'],
//            ['phone'],
//            ['role'],
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
//            ['first_name', 3],
//            ['last_name', 3],
            ['password', 4],
        ],

    ];



    /**
     * @return bool
     */
    public function isUnique(){
        $user =  \R::findOne('user', '(username = ?) AND id <> ?', [$this->attributes['username'], $this->attributes['id']]);
        if ($user){
            if ($user->username == $this->attributes['username']){
                $this->errors['unique'][] = 'Этот логин уже есть в базе!';
            }
            return false;
        }
        return true;
    }


}