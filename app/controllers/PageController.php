<?php

namespace app\controllers;

class PageController extends AppController {

    public function viewAction(){
        $title = 'PageCont';
        $navbar = $this->navbar;
        $this->set(compact('title', 'navbar'));
    }
}