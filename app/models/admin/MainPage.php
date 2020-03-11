<?php

namespace app\models\admin;

use app\models\AppModel;

class MainPage extends AppModel
{
    public $attributes = [
        'title' => '',
        'button_name' => '',
        'right_title' => '',
        'sub_title' => '',
        'line_one' => '',
        'line_two' => '',
        'line_three' => ''
//        'image' => ''
    ];

    public $rules = [
        'required' => [
            ['button_name'],
            ['right_title']
        ],
        'lengthMin' => [
            ['button_name', 3],
            ['right_title', 5]
        ],
        'lengthMax' => [
            ['title', 90]
        ]
    ];

    public function getImg()
    {
        if (!empty($_SESSION['image'])) {
            $this->attributes['image'] = $_SESSION['image'];
            unset($_SESSION['image']);
        }
    }

    public function uploadImg($name, $wmax, $hmax)
    {
        $uploaddir = WWW . '/upload/main/';
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES[$name]['name'])); // расширение картинки
        $types = array("image/gif", "image/png", "image/jpeg", "image/jpeg", "image/x-png"); // массив допустимых расширений
        if ($_FILES[$name]['size'] > 5242880) {
            $res = array("error" => "Error! Max size of file - 5 Мб!");
            exit(json_encode($res));
        }
        if ($_FILES[$name]['error']) {
            $res = array("error" => "Error!. Maybe file's size very big!");
            exit(json_encode($res));
        }
        if (!in_array($_FILES[$name]['type'], $types)) {
            $res = array("error" => "Enable extensions are:  .gif, .jpg, .png");
            exit(json_encode($res));
        }
        $new_name = md5(time()) . ".$ext";
        $uploadfile = $uploaddir . $new_name;
        if (@move_uploaded_file($_FILES[$name]['tmp_name'], $uploadfile)) {

            $_SESSION['image'] = $new_name;

//            self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
            $res = array("file" => $new_name);
            exit(json_encode($res));

        }
    }


    /**
     * @param string $target путь к оригинальному файлу
     * @param string $dest путь сохранения обработанного файла
     * @param string $wmax максимальная ширина
     * @param string $hmax максимальная высота
     * @param string $ext расширение файла
     */
    public static function resize($target, $dest, $wmax, $hmax, $ext)
    {
        list($w_orig, $h_orig) = getimagesize($target);
        $ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

        if (($wmax / $hmax) > $ratio) {
            $wmax = $hmax * $ratio;
        } else {
            $hmax = $wmax / $ratio;
        }

        $img = "";
        // imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
        switch ($ext) {
            case("gif"):
                $img = imagecreatefromgif($target);
                break;
            case("png"):
                $img = imagecreatefrompng($target);
                break;
            default:
                $img = imagecreatefromjpeg($target);
        }
        $newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки

        if ($ext == "png") {
            imagesavealpha($newImg, true); // сохранение альфа канала
            $transPng = imagecolorallocatealpha($newImg, 0, 0, 0, 127); // добавляем прозрачность
            imagefill($newImg, 0, 0, $transPng); // заливка
        }

        imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
        switch ($ext) {
            case("gif"):
                imagegif($newImg, $dest);
                break;
            case("png"):
                imagepng($newImg, $dest);
                break;
            default:
                imagejpeg($newImg, $dest);
        }
        imagedestroy($newImg);
    }
}