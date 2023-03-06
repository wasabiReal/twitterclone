<?php

// Change to 0 if site was deployed in production site
define("DEBUG", 1);

class ErrorHandler{

    public function __construct(){
        error_reporting(0 ? DEBUG : -1);
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function errorHandler($errno, $errstr, $errfile, $errline){
        error_log("[" . date('Y-m-d H:i:s') . "] Error text: {$errstr} | File: {$errfile}:{$errline}\n_________________________\n", 3, __DIR__ . '/logs/errors.log');
        $this->display($errno, $errstr, $errfile, $errline);
    }

    public function fatalHandler(){
        $error = error_get_last();
        if(!empty($error) and $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)){
            error_log("[" . date('Y-m-d H:i:s') . "] Error text: {$error['message']} | File: {$error['file']}:{$error['line']}\n_________________________\n", 3, __DIR__ . '/logs/errors.log');
            ob_end_clean();
            $this->display($error['type'], $error['message'], $error['file'], $error['line']);
        }else{
            ob_end_flush();
        }
    }

    public function exceptionHandler($e){
        error_log("[" . date('Y-m-d H:i:s') . "] Error text: {$e->getMessage()} | File: {$e->getFile()}:{$e->getLine()}\n_________________________\n", 3, __DIR__ . '/logs/errors.log');

        $this->display('Woaw, we got exception error', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getcode());
    }

    protected function display($errno, $errstr, $errfile, $errline, $response = 503){
        http_response_code($response);
        if(DEBUG){
            require 'views/dev.php';
        }else require 'views/prod.php';
    }
}

new ErrorHandler();

//try {
//    if(empty($test)){
//        throw new Exception('Exception');
//    }
//}catch (Exception $e){
//    var_dump($e);
//}
//throw new Exception('Exception', 500);
//echo $test;
test();

