<?php

class CUser{

    public static function isLogged(){
        if(UCookie::isSet('PHPSESSID')){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }
        if(USession::isSetSessionElement('customer')){
            echo USession::getSessionElement('customer');
            exit();
            //modifica l'header per andare nella dashboard del customer;
        }
        if(USession::isSetSessionElement('seller')){
            echo USession::getSessionElement('seller');
            exit();
            //modifica l'header per andare nella dashboard dell'seller;
        }
        if(USession::isSetSessionElement('admin')){
            echo USession::getSessionElement('admin');
            exit();
            //modifica l'header per andare nella dashboard del admin;
        }
        //mostra la view del login
        echo "no";
    }

    public static function login($email, $password){
        //$view = new VUser();                                 
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

    public static function register(){
        $email = $_GET["email"];
        $password = $_GET["password"];
        $name = $_GET["name"];
        $userType = $_GET["userType"];
        
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
        }
    }

    public static function logout(){
        USession::getInstance();
        USession::unsetSession();
        USession::destroySession();
        //$view = new VUser();
        //$view->showLoginForm();
        echo "logout";
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

}