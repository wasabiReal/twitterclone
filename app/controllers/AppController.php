<?php

namespace app\controllers;

use vendor\core\App;

class AppController extends \vendor\core\base\Controller{

    public $menu;
    public $meta = [];

    public function __construct($route)
    {
        parent::__construct($route);
        new \app\models\Main;

        $this->navbar = App::$app->cache->get('category');
        if (!$this->navbar) {
            $this->navbar = \R::findAll('category');
            App::$app->cache->set('category', $this->navbar, 3600 * 24 * 30);
        }
        $navbar = $this->menu;
        $meta = $this->setMeta();
        $this->set(compact( 'navbar', 'meta'));
    }

    protected function setMeta($title = 'Twitter', $desc = 'A twitter clone created by wasabiReal for DevBranch tech interview', $keywords = 'Twitter, clone, php'){
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

}