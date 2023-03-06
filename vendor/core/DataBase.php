<?php

namespace vendor\core;

/**
 * Description of DataBase
 */
class DataBase
{

    protected $pdo;
    protected static $instance;
    public static $countsql = 0;
    public static $queries = [];

    protected function __construct()
    {
        $db = require ROOT . '/config/configDB.php';
        require LIBS . '/rb.php';
        \R::setup($db['dsn'], $db['user'], $db['pass']);
//        \R::fancyDebug(true);
//        \R::freeze(true);

    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

//    public function execute($sql, $params = [])
//    {
//        self::$countsql++;
//        self::$queries[] = $sql;
//        $stmt = $this->pdo->prepare($sql);
//        return $stmt->execute($params);
//    }
//
//    public function query($sql, $params = [])
//    {
//        self::$countsql++;
//        self::$queries[] = $sql;
//        $stmt = $this->pdo->prepare($sql);
//        $res = $stmt->execute($params);
//        if ($res !== false) {
//            return $stmt->fetchAll();
//        }
//        return [];
//    }

}