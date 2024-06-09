<?php
//quando loggo come user, non funziona bene il checkLogin a causa del isBanned
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
                $logged = false;
            echo "sei bannato";}
            else
                $logged = true;
                echo "sei loggato come customer";  
        }
        if(USession::isSetSessionElement('seller')){
            //echo USession::getSessionElement('seller');
            $logged = true;
            echo "sei loggato come seller";
            //exit();
        }
        if(USession::isSetSessionElement('admin')){
            //echo USession::getSessionElement('admin');
            $logged = true;
            echo "sei loggato come admin";
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
            if($customer instanceof ECustomer && $customer->getSuspensionTime() > new DateTime()) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public static function login(){

        if(self::isLogged()){
            echo " manca la view del dashboard";
            //$view = new VUser();
            //$view->showUserDashboard(); non è ancora stata implementata
        }
        else {
            $view = new VUser();
            $view->showLoginForm();
        }
    }

    public static function checkLogin(){
        $view = new VUser();
        $validemail = FPersistentManager::getInstance()->verifyUserEmail(UHTTPMethods::post('email'));                                           
        if($validemail){
            $user = FPersistentManager::getInstance()->retrieveObj(EUser::class, UHTTPMethods::post('email'));
            if(password_verify(UHTTPMethods::post('password'), $user->getPassword())){
                if(USession::getSessionStatus() == PHP_SESSION_NONE){
                    USession::getInstance();
                    switch(FPersistentManager::getInstance()->checkUserType($user->getId())){
                        case "customer":
                            if(self::isBanned()){
                                $view->loginBan();  
                            }
                            else
                                USession::setSessionElement('customer', $user);
                               // CCustomer::dashboard();
                                echo "sei loggato come customer";

                            break;
                        case "seller":
                            USession::setSessionElement('seller', $user);
                            //CSeller::dashboard(); 
                            echo "sei loggato come seller";
                            break;
                        case "admin":
                            USession::setSessionElement('admin', $user);
                            //CAdmin::dashboard();
                            echo "sei loggato come admin";
                            break;
                        default:
                            echo "pippo";
                            $view->loginError();
                            break;
                    }  
                    
                }else{
                    echo "pippo1";
                    //$view->loginError();
                }
            }else{
                echo "pippo2";
                $view->loginError();
            }
        }else{
            echo "pippo2";
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