<?php
namespace site;


class Router
{
    // all available routes
    protected static $routes = [];
    // current route
    protected static $route = [];


    /**
     * @param $regexp
     * @param array $route
     */
    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    /**
     * @return array
     */
    public static function getRoutes(){
        return self::$routes;
    }

    /**
     * @return array
     */
    public static function getRoute(){
        return self::$route;
    }


    /**
     * @param $url
     * @throws \Exception
     */
    public static function dispatch($url){
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            if (class_exists($controller)){
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($controllerObject, $action)){
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception("Action $controller::$action not found", 404);
                }
            } else {
                throw new \Exception("Controller $controller not found", 404);
            }
        } else {
            throw new \Exception('Page not found', 404);
        }
    }


    /**
     * @param $url
     * @return bool
     */
    public static function matchRoute($url){
        foreach (self::$routes as $pattern => $route){
            if (preg_match("#{$pattern}#i", $url, $matches)){
                foreach ($matches as $key => $value){
                    if (is_string($key)){
                        $route[$key] = $value;
                    }
                }
                if (empty($route['action'])){
                    $route['action'] = 'index';
                }
                if (!isset($route['prefix'])){
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= "\\";
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    //CamelCase for controllers
    /**
     * @param $name
     * @return mixed
     */
    protected static function upperCamelCase($name){
        $name = str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
        return $name;
    }

    //camelCase for actions

    /**
     * @param $name
     * @return string
     */
    protected static function lowerCamelCase($name){
        $name = lcfirst(self::upperCamelCase($name));
        return $name;
    }


    protected static function removeQueryString($url){
        if ($url){
            $params = explode('?', $url, 2);
            if (false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
    }

}