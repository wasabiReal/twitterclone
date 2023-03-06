<?php

namespace vendor\libs;

class Cache
{
    public function __construct(){

    }

    public function set($key, $data, $seconds = 3600){
        $content['data'] = $data;
        $content['endTime'] = time() + $seconds;
        if(file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))) {
            return true;
        }
        return false;
    }

    public function get($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            /** @noinspection UnserializeExploitsInspection */
            $content = unserialize(file_get_contents($file));
            if(time() <= $content['endTime']){
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }

    public function delete($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            unlink($file);
        }
    }
}