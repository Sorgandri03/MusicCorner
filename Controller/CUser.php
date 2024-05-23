<?php

class CUser{

    public static function isLogged(){
        if(UCookie::isSet('PHPSESSID')){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }
        if(USession::isSetSessionElement('seller')){
            echo USession::getSessionElement('seller');
            //modifica l'header per andare nella dashboard del seller;
        }
        if(USession::isSetSessionElement('admin')){
            echo USession::getSessionElement('admin');
            //modifica l'header per andare nella dashboard dell'admin;
        }
        if(USession::isSetSessionElement('customer')){
            echo USession::getSessionElement('customer');
            //modifica l'header per andare nella dashboard del customer;
        }
        //mostra la view del login
        echo "no";
    }

    public static function login(){
        //$view = new VUser();
        $email = $_GET["email"];                                   
        if(FPersistentManager::getInstance()->verifyUserEmail($email)){
            $user = FPersistentManager::getInstance()->retrieveObj(EUser::class,$email);
            //if(password_verify($_GET["password"], $user->getPassword())){
            if($_GET["password"] == $user->getPassword()){
                if(USession::getSessionStatus() == PHP_SESSION_NONE){
                    USession::getInstance();
                }
                switch(FPersistentManager::getInstance()->checkUserType($email)){
                    case "customer":
                        USession::setSessionElement('customer', $email);
                        echo "customer";
                        break;
                    case "seller":
                        USession::setSessionElement('seller', $email);
                        echo "seller";
                        break;
                    case "admin":
                        USession::setSessionElement('admin', $email);
                        echo "admin";
                        break;
                    default:
                        //$view->loginError();
                        break;
                }
            }
            else{
                //$view->loginError();
                echo "error";
            }
        }
        else{
            //$view->loginError();
            echo "error";
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

}