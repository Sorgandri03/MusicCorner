<?php
namespace Foundation;

abstract class FEntityManager {
    private static $instance = null;
    private function __construct() {
        
    }

    public static function getinstance() {
        if(self::$instance == null){
            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }

    //END SINGLETON

    public function create() {
        
    }
    public function delete() {
        
    }
    public function update() {
        
    }
    public function read() {
        
    }

    
}