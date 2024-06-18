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
            echo "sei bannato";
            }
            else
                $logged = true;
                echo "sei loggato come customer"; 
        }
        if(USession::isSetSessionElement('seller')){
            //echo USession::getSessionElement('seller');
            $logged = true;
            echo "sei loggato come seller";
        }
        if(USession::isSetSessionElement('admin')){
            //echo USession::getSessionElement('admin');
            $logged = true;
            echo "sei loggato come admin";
        }
        return $logged;
    }

    
    public static function isBanned(){
        $customer = USession::getSessionElement('customer');
        if($customer->getSuspensionTime() > new DateTime()) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function login(){
        if(self::isLogged()){
            if(USession::isSetSessionElement('customer')){
                CCustomer::dashboard();
            }
            if(USession::isSetSessionElement('seller')){
                CSeller::dashboard();
            }
            if(USession::isSetSessionElement('admin')){
                CAdmin::dashboard();
            }
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
                            $customer = FPersistentManager::getInstance()->retrieveObj(ECustomer::class, $user->getId());
                            USession::setSessionElement('customer', $customer);
                            if(self::isBanned()){
                                echo "sei bannato";
                                break;
                            }
                            else{
                                header('Location: /MusicCorner/');
                                break;
                            }                            
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
    }
    //senza il check dell'username funziona bene ma se lo metto non funziona. metto un username nuovo comunque me lo da come gia preso quindi va fxato quello
    public static function registrationCustomer() {
        $view = new VRegistration();  
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
                $email = UHTTPMethods::post('email');
                $username = UHTTPMethods::post('username');
                $password = UHTTPMethods::post('password');
                if (FPersistentManager::getInstance()->verifyUserEmail($email)==false /*&& FPersistentManager::getInstance()->verifyUserUsername($username)==false*/) {
                    $user = new EUser($email, $password);
                    $customer = new ECustomer($username, $email, $password);
                    FPersistentManager::getInstance()->createObj($user);
                    FPersistentManager::getInstance()->createObj($customer);
                    // Redirect after successful registration
                    header('Location: /MusicCorner/User/login');
                    exit;
                } else {
                    echo("Email or username already exists.");
                    $view->registrationError(); 
                    return;
                }
            } else {
                $view->registrationError();
                return;
            }
        } else {
            $view->showRegistrationCustomer();
        }
    }
    
    public static function registrationSeller(){
        $view = new VRegistration();
        $view->showRegistrationSeller();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
                $email = UHTTPMethods::post('email');
                $shopname = UHTTPMethods::post('shopname');
                $password = UHTTPMethods::post('password');
        if(FPersistentManager::getInstance()->verifyUserEmail(UHTTPMethods::post('email')) == false && FPersistentManager::getInstance()->verifyUserUsername(UHTTPMethods::post('username')) == false){
            $user = new EUser($email,$password);
            $seller = new ESeller($email,$password,$shopname);
            FPersistentManager::getInstance()->createObj($user);
            FPersistentManager::getInstance()->createObj($seller);
            header('Location: /MusicCorner/User/login');
       }else{
            $view->registrationError();
        }
    } else {
        $view->registrationError();
    }
        }
    }

    public static function logout(){
        USession::getInstance();
        USession::destroySession();
        header('Location: /MusicCorner/User/login');
    }
}
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