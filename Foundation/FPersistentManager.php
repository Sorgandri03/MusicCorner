<?php

class FPersistentManager{

    private static $instance = null;

    private function __construct(){
        spl_autoload_register(array($this, 'autoload'));
    }

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //END SINGLETON

    public function retrieveObject($entity, $id){
        $class = "F" . substr($entity,1);
        $result = call_user_func([$class, 'read'], $id);
        return $result;
    }
    
    function autoload ($className) { 
        $filePath = __DIR__. "\\" .  $className . '.php'; 
        if (file_exists($filePath)) 
        { require_once $filePath; } }
}


