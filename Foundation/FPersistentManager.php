<?php

class FPersistentManager{

    private static $instance = null;


    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //END SINGLETON

    public function retrieveObj($entity, $id){
        $class = "F" . substr($entity,1);
        $result = call_user_func([$class, "getObj"], $id);
        return $result;
    }

    public static function uploadObj($obj){
        $class = "F" . substr(get_class($obj), 1);
        $result = call_user_func([$class, "saveObj"], $obj);
        return $result;
    }
}


