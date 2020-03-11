<?php
namespace app\models;


class User extends AppModel {


    public $attributes = [
        'username' => '',
        'password' => '',
        'role' => 'user',
    ];


    public $rules = [
        'required' => [
            ['username'],
        ],
        'lengthMin' => [
            ['username', 4],
            ['password', 6],
        ],

    ];



    public function hashPassword(){
        $this->attributes['password'] = base64_encode($this->attributes['password']);
//        $this->attributes['password'] = password_hash($this->attributes['password'], PASSWORD_DEFAULT);
    }


    /**
     * @return bool
     */
    public function isUnique(){
        $user =  \R::findOne('user', 'username = ?', [$this->attributes['username']]);
        if ($user){
            if ($user->username == $this->attributes['username']){
                $this->errors['unique'][] = 'Такой логин уже существует!';
            }
            return false;
        }
        return true;
    }


    /**
     * @param bool $isAdmin
     * @return bool
     */
    public function login($isAdmin = false){
        $username = !empty($_POST['username']) ? trim(str_replace(" ", "", $_POST['username'])) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        if ($username && $password){
            if ($isAdmin){
                $user = \R::findOne('user', "username = ? AND role = 'admin' OR role = 'moderator'", [$username]);
            } else {
                $user = \R::findOne('user', "username = ? AND active = 1", [$username]);
            }
            if ($user){
                if (base64_encode($password) == $user->password){
                    foreach ($user as $key => $value){
                        if ($key != 'password'){
                            $_SESSION['user'][$key] = $value;
                        }
                    }
                    return true;
                }
            }
        }
        return false;
    }

    public function recovery($isAdmin = false){
        $username = !empty($_POST['username']) ? trim(str_replace(" ", "", $_POST['username'])) : null;
        $username = htmlspecialchars($username);
        if ($username){
            if ($isAdmin){
                $user = \R::findOne('user', "username = ? AND role = 'admin' OR role = 'moderator'", [$username]);
            } else {
                $user = \R::findOne('user', "username = ? AND active = 1", [$username]);
            }
            if ($user){
                return $user;
            }
        }
        return false;
    }
    
    /**
     * @return bool
     */
    public static function isAuth(){
        return isset($_SESSION['user']) ? true : false;
    }


    /**
     * @return bool
     */
    public static function isAdmin(){
        if (isset($_SESSION['user']) && ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'moderator')){
            return true;
        }
        return false;
    }

    public static function isMainAdmin(){
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'){
            return true;
        }
        return false;
    }

}