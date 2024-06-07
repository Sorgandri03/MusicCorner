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
            //echo USession::getSessionElement('customer');
            if(self::isBanned()){
                $view = new VUser();
                USession::unsetSession();
                USession::destroySession();
                $view->loginBan();}
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
        //mostra la view del login
        if(!$logged){
            self::login();
            exit;
        }
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
        if(UCookie::isSet('PHPSESSID')){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }
        if(USession::isSetSessionElement('user')){
            header('Location: /Agora/User/home');
        }
        $view = new VUser();
        $view->showLoginForm();
    }
    public static function checkLogin(){
        $email=UHTTPMethods::post('email');
        $password = UHTTPMethods::post('password'); //DA MIGLIORARE
        if(FPersistentManager::getInstance()->verifyUserEmail($email)){
            $user = FPersistentManager::getInstance()->retrieveObj(EUser::class,$email);
            //if(password_verify($_GET["password"], $user->getPassword())){
            if($password == $user->getPassword()){
                if(USession::getSessionStatus() == PHP_SESSION_NONE){
                    USession::getInstance();
                }
                switch(FPersistentManager::getInstance()->checkUserType($email)){
                    case "customer":
                        USession::setSessionElement('customer', $user);
                        if(self::isBanned()){
                            echo "You are banned";
                            return;
                        }
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
                        //$view->loginError();
                        break;
                }
            }
            else{
                //$view->loginError();
            }
        }
        else{
            //$view->loginError();
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
        //$view = new VUser();
        //$view->showLoginForm();
        echo "logout";
    }

  

}