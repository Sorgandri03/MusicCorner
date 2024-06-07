<?php

class CUser{

    public static function isLogged(){

        $logged = false;

        if(UCookie::isSet('PHPSESSID')){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }
        if(USession::isSetSessionElement('customer')){
            if(self::isBanned()){
                USession::unsetSession();
                USession::destroySession();
                $logged = false;}
            else
                $logged = true;  
        }
        if(USession::isSetSessionElement('seller')){
            //echo USession::getSessionElement('seller');
            $logged = true;
            //exit();
        }
        if(USession::isSetSessionElement('admin')){
            //echo USession::getSessionElement('admin');
            $logged = true;
            //exit();
        }
        if(!$logged && !self::isLoginPage()){
            header('Location: /MusicCorner/User/login');
            exit();
        }
        return $logged;
    }
        // Metodo per verificare se si trova sulla pagina di login
    private static function isLoginPage() {
        return isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/User/login') !== false;
    }
    
    public static function isBanned(){
        if(USession::isSetSessionElement('customer')){
            $customer = USession::getSessionElement('customer');
            if(new DateTime() < $customer->getSuspensionTime()) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public static function login(){

        if(self::isLogged()){
            echo "sei loggato ma manca la view del dashboard";
            //$view = new VUser();
            //$view->showUserDashboard(); non è ancora stata implementata
        }
        else
            $view = new VUser();
            $view->showLoginForm();
    }

    public static function checkLogin(){
        $view = new VUser();
        $email = FPersistentManager::getInstance()->verifyUserEmail(UHTTPMethods::post('email'));                                            
        if($email){
            $user = FPersistentManager::getInstance()->retrieveObj(EUser::class, UHTTPMethods::post('email'));
            if(password_verify(UHTTPMethods::post('password'), $user->getPassword())){
                if($user->isBanned()){
                    $view->loginBan();

                }elseif(USession::getSessionStatus() == PHP_SESSION_NONE){
                    USession::getInstance();
                    switch(FPersistentManager::getInstance()->checkUserType($email)){
                        case "customer":
                            USession::setSessionElement('customer', $user);
                            if(self::isBanned()){
                                $view->loginBan();  
                            }
                            else
                                CCustomer::dashboard();
                            break;
                        case "seller":
                            USession::setSessionElement('seller', $user);
                            CSeller::dashboard();
                            break;
                        case "admin":
                            USession::setSessionElement('admin', $user);
                            CAdmin::dashboard();
                            break;
                        default:
                            $view->loginError();
                            break;
                    }  
                    
                }
            }else{
                $view->loginError();
            }
        }else{
            $view->loginError();
        }
    }

    public static function registration(){
        $view = new VRegistration();
        $view->showRegistration();
        /*
        $email = $_GET["email"]; //DA FIXARE
        $password = $_GET["password"]; //DA FIXARE
        $name = $_GET["name"]; //DA FIXARE
        $userType = $_GET["userType"]; //DA FIXARE
       
        
        if(session_status() == PHP_SESSION_NONE){
            USession::getInstance();
        }

        if(FPersistentManager::getInstance()->verifyUserEmail($email)){
            echo "Email already exists";
            return;
        }

        switch($userType){
            case "customer":
                $customer = new ECustomer($name, $email, $password);
                USession::setSessionElement('customer', $email);
                $obj = $customer;
                break;
            case "seller":
                $seller = new ESeller($email, $password, $name);
                USession::setSessionElement('seller', $email);
                $obj = $seller;
                break;
            default:
                echo "Invalid user type";
                return;
        }

        if(FPersistentManager::getInstance()->createObj($obj)){
            echo "Registration successful";
        } else {
            echo "Registration failed";
        }*/
    }

    public static function logout(){
        USession::getInstance();
        USession::unsetSession();
        USession::destroySession();
        $view = new VUser();
        $view->showLoginForm();
    }

  

}