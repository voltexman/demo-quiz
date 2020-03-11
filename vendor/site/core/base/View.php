<?php
namespace site\base;


class View
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];


    /**
     * View constructor.
     * @param $route
     * @param string $layout
     * @param string $view
     * @param $meta
     */
    public function __construct($route, $layout = '', $view = '', $meta )
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = rtrim($route['prefix'], '\\') . '/';
        $this->meta = $meta;

        if ($layout === false){
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
//            if ($layout){
//                $this->layout = $layout;
//            } else {
//                $this->layout = LAYOUT;
//            }
        }
    }


    /**
     * @param $data
     * @throws \Exception
     */
    public function render($data){
        if (is_array($data)){
            extract($data);
        }
        $viewPath = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
        if (is_file($viewPath)){
            ob_start(); // include buffering
            require_once $viewPath;
            $content = ob_get_clean(); // clean buffer
        } else {
            throw new \Exception("View $viewPath not found", 500);
        }
        if (false !== $this->layout){
            $layoutPath = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($layoutPath)){
                require_once $layoutPath;
            } else {
                throw new \Exception("Layout $layoutPath not found", 500);
            }
        }
    }


    /**
     * @return string
     */
    public function getMeta(){

        $meta = '<meta name="description" content="' . $this->meta['desc'] . '">' . PHP_EOL;
        $meta .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;
        $meta .= '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        return $meta;
    }



}