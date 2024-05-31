<?php

class CFrontController{
    
    public function run($path){
        $result = explode("/", $path);       
        
        array_shift($result);
        array_shift($result);

        if($result[0]=="" || $result[0]=="index.php"){
            $view = new VHome();
            $view->showHome();
            return;
        }

        $controller = "C" . $result[0];
        $directory = "Controller";
        $scanDir = scandir($directory);

        if(in_array($controller . ".php", $scanDir)){

            if(isset($result[1])){

                $method = $result[1];

                if(method_exists($controller, $method)){
                    $param = array();
                        for ($i = 2; $i < count($result); $i++) {
                            $param[] = $result[$i];
                        }
                        $num = (count($param));
                        if ($num == 0) $controller::$method();
                        else if ($num == 1) $controller::$method($param[0]);
                        else if ($num == 2) $controller::$method($param[0], $param[1]);

                }else{
                    $view = new V404();
                    $view->show404();
                }
            }
            
        }else{
            $view = new V404();
            $view->show404();
        }
    }
}