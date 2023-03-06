<?php

namespace vendor\core;

class Router{
    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }
    public static function matchRoutes($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if(preg_match("#$pattern#i", $url, $matches)){
                foreach ($matches as $k => $v){
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
    public static function dispatch($url){
        $url = self::removeQueryString($url);
        if(self::matchRoutes($url)){
            $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';
            if(class_exists($controller)){
                $contrObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($contrObj, $action)){
                    $contrObj->$action();
                    $contrObj->getView();
                }
            }
            else{
                echo 'Controller <b>'.$controller.'</b> don\'t exists';
            }
        }else{
            http_response_code(404);
            include '404.html';
        }
    }
    protected static function removeQueryString($url){
        if ($url){
            $params = explode('&', $url, 2);
            if(!strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
    }
    protected static function upperCamelCase($name){
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));
    }
}