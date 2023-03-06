<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;

class MainController extends AppController
{

//    public $layout = 'main';

    public function indexAction()
    {
        $model = new Main;

        $posts = App::$app->cache->get('posts');
        if (!$posts) {
            $posts = \R::findAll('posts');
            App::$app->cache->set('posts', $posts, 3600 * 24);
        }

//        $post = \R::findOne('posts', 'id = 1');
//        $this->setMeta($post->title, $post->discription, $post->keywords);

        $navbar = $this->navbar;
//        $this->setMeta('Main Page', keywords: 'tweets, news, what\'s new?');
        $meta = $this->meta;
        $this->set(compact('posts', 'navbar', 'meta'));
    }

    public function testAction()
    {
        $this->layout = 'test';
        if ($this->isAjax()){
            $model = new Main();
            $post = \R::findOne('posts', "id = {$_POST['id']}");
            debug($post);
        }
        else{
            echo 222;
        }
    }

}