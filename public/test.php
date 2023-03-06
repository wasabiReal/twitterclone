<?php

require '../vendor/libs/rb.php';
require '../vendor/libs/functions.php';
$db = require '../config/configDB.php';
R::setup($db['dsn'], $db['user'], $db['pass']);
R::freeze(true);
R::fancyDebug(true);

//Create
//$cat = R::dispense('category');
//$cat->title = 'red';
//$id = R::store($cat);
//var_dump($id);

//Read
//$cat = R::load('category', 1);
//debug($cat);

//Update
//$cat = R::load('posts', 1);
//debug($cat['title']);
//$cat->title = 'Адаптивный дизайн sайtа и оsновные стратегии по еgо внедрению';
//R::store($cat);
//debug($cat['title']);

//Delete
//$cat = R::load('posts', 1);
//R::trash($cat);
//R::wipe('category'); //delete table;


//$cat = R::findOne('posts', 'id = 2');
//$cat2 = R::findAll('category');
//$cat3 = R::findAll('category', 'id > ?', [2]);
//$cat4 = R::findAll('category', 'title LIKE ?', ['%cat%']);

