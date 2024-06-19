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
        $view = new VUser();
        if(self::isLogged()){
            if(USession::isSetSessionElement('customer')){
                $view->showUserDashboard();
            }
            if(USession::isSetSessionElement('seller')){
                $view->showUserDashboard();
                
            }
            if(USession::isSetSessionElement('admin')){
                $view->showUserDashboard();
            }
        }
        else {
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
                                $view->showUserDashboard();
                                break;
                            }                            
                        case "seller":
                            USession::setSessionElement('seller', $user);
                            $view->showUserDashboard();
                            break;
                        case "admin":
                            USession::setSessionElement('admin', $user);
                            $view->showUserDashboard();
                            break;
                        default:
                            $view->loginError();
                            break;
                    }  
                    
                }else{
                    echo "pippo1";
                    //$view->loginError();
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
    }
    //senza il check dell'username funziona bene ma se lo metto non funziona. metto un username nuovo comunque me lo da come gia preso quindi va fxato quello
    public static function registrationCustomer() {
        $view = new VRegistration();  
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
                $email = UHTTPMethods::post('email');
                $username = UHTTPMethods::post('username');
                $password = UHTTPMethods::post('password');
                if (FPersistentManager::getInstance()->verifyUserEmail($email)==false && FPersistentManager::getInstance()->verifyUserUsername($username)==false) {
                    $user = new EUser($email, $password);
                    $customer = new ECustomer($username, $email, $password);
                    FPersistentManager::getInstance()->createObj($user);
                    FPersistentManager::getInstance()->createObj($customer);
                    header('Location: /MusicCorner/User/login');
                    exit;
                } else {
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
                $email = UHTTPMethods::post('email');
                $username = UHTTPMethods::post('username');
                $password = UHTTPMethods::post('password');
                if (FPersistentManager::getInstance()->verifyUserEmail($email)==false && FPersistentManager::getInstance()->verifyUserUsername($username)==false) {
                    $user = new EUser($email, $password);
                    $seller = new ESeller($email, $password, $username);
                    FPersistentManager::getInstance()->createObj($user);
                    FPersistentManager::getInstance()->createObj($seller);
                    header('Location: /MusicCorner/User/login');
                    exit;
                } else {
                    $view->registrationError(); 
                    return;
                }
            } else {
                $view->registrationError();
                return;
            }
        } else {
            $view->showRegistrationSeller();
        }
    }

    public static function logout(){
        USession::getInstance();
        USession::destroySession();
        header('Location: /MusicCorner/User/login');
    }
}
 ///