<?php

namespace vendor\core\base;

abstract class Controller{

    /** Current route(ULR-link)
     * @var array
     */
    public $route = [];

    /** Current view
     * @var string
     */
    public $view;

    /** Current layout
     * @var string
     */
    public $layout;

    /** user data
     * @var array
     */
    public $vars;
    public function __construct($route){
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView(){
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    public function set($vars){
        $this->vars = $vars;
    }

    public function isAjax(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
}