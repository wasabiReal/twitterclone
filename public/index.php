<?php

$query = rtrim($_SERVER['QUERY_STRING'], '/');

use vendor\core\Router;

const WWW = __DIR__;
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('CACHE', dirname(__DIR__) . '/tmp/cache');
define('LIBS', dirname(__DIR__) . '/vendor/libs');
define('LAYOUT', 'default');


require '../vendor/libs/functions.php';

spl_autoload_register(function ($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_file($file)){
        require_once $file;
    }
});

new \vendor\core\App;

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

//defaults rules
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
