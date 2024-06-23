<?php
//quando loggo come user, non funziona bene il checkLogin a causa del isBanned
class CUser{

    public static function userType($user){
        return FPersistentManager::getInstance()->checkUserType($user->getId());
    }

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
        }
        if(USession::isSetSessionElement('seller')){
            //echo USession::getSessionElement('seller');
            $logged = true;
        }
        if(USession::isSetSessionElement('admin')){
            //echo USession::getSessionElement('admin');
            $logged = true;
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
                header('Location: /MusicCorner/Customer/dashboard');
            }
            if(USession::isSetSessionElement('seller')){
                header('Location: /MusicCorner/Seller/dashboard');              
            }
            if(USession::isSetSessionElement('admin')){
                header('Location: /MusicCorner/Admin/dashboard');
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
            $passworddb = FPersistentManager::getInstance()->retrievePassword(UHTTPMethods::post('email'));
            if(password_verify(UHTTPMethods::post('password'), $passworddb)){
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
                            $seller = FPersistentManager::getInstance()->retrieveObj(ESeller::class, $user->getId());
                            USession::setSessionElement('seller', $seller);
                            header('Location: /MusicCorner/');
                            break;
                        case "admin":
                            $admin = FPersistentManager::getInstance()->retrieveObj(EAdmin::class, $user->getId());
                            USession::setSessionElement('admin', $admin);
                            header('Location: /MusicCorner/');
                            break;
                        default:
                            $view->loginError();
                            break;
                    }                      
                }else{
                    $view->loginError();
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
    //devo creare due view di errore diverse una quando non hai riempito tutti i campi e una uqndo le pw non coincidono
    public static function registrationCustomer() {
        $view = new VRegistration();  
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
                $email = UHTTPMethods::post('email');
                $username = UHTTPMethods::post('username');
                $password = UHTTPMethods::post('password');
                $confirmPassword = UHTTPMethods::post('confirm-password');
                
                if ($password !== $confirmPassword) {
                    $view->passwordError();
                    return;
                }
               
                if (FPersistentManager::getInstance()->verifyUserEmail($email) == false && FPersistentManager::getInstance()->verifyUserUsername($username) == false) {
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
                $view->emptyFields(); 
                return;
            }
        } else {
            $view->showRegistrationCustomer();
        }
    }

    public static function registrationSeller(){
        $view = new VRegistration();  
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']) && isset($_POST['shopname']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
                $email = UHTTPMethods::post('email');
                $username = UHTTPMethods::post('shopname');
                $password = UHTTPMethods::post('password');
                $confirmPassword = UHTTPMethods::post('confirm-password');

                if ($password !== $confirmPassword) {
                    $view->registrationError();
                    echo "Le password non coincidono"; 
                    return;
                }
                
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
                echo "Compila tutti i campi"; 
                return;
            }
        } else {
            $view->showRegistrationSeller();
        }
    }
    
    //da fixare 
    public static function logout(){
        USession::getInstance();
        if(USession::isSetSessionElement('customer')){
            USession::unsetSessionElement('customer');
        }
        elseif(USession::isSetSessionElement('seller')){
            USession::unsetSessionElement('seller');
        }
        elseif(USession::isSetSessionElement('admin')){
            USession::unsetSessionElement('admin');
        }
        header('Location: /MusicCorner/User/login');
    }
    
    public static function destroySession(){
        USession::getInstance();
        USession::destroySession();
        header('Location: /MusicCorner/');
    }
}
