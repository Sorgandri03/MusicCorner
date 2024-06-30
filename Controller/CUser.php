<?php
//quando loggo come user, non funziona bene il checkLogin a causa del isBanned
class CUser{

    /**
     * Check the type of the user
     * @param EUser $user The user to check
     * @return string The type of the user
     */
    public static function userType($user){
        return FPersistentManager::getInstance()->checkUserType($user->getId());
    }

    /**
     * Check if the user is logged
     * @return bool The result of the check
     */
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
            $logged = true;
        }
        if(USession::isSetSessionElement('admin')){
            $logged = true;
        }
        return $logged;
    }
    
    /**
     * Check whether the user is banned or not. If it is, unset the customer from the session and return true
     * @return bool The result of the check
     */
    public static function isBanned(){
        $customer = USession::getSessionElement('customer');
        if($customer->getSuspensionTime() > new DateTime()) {
            USession::unsetSessionElement('customer');
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Check if the user is logged and redirect them to their dashboard, if not, show the login page
     */
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

    /**
     * Check the login credentials and log the user in or display an error message
     */
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
                                $view->loginBan();
                                break;
                            }
                            else{
                                if(USession::getInstance()::isSetSessionElement('cartguest')){
                                    if(!USession::getInstance()::isSetSessionElement($customer->getUsername())){
                                        $cart = new ECart($customer->getId());
                                        USession::getInstance()::setSessionElement($customer->getUsername(),$cart);
                                    }
                                    foreach(USession::getSessionElement('cartguest')->getCartItems() as $stockId => $quantity){
                                        COrders::cartAdd($stockId, $quantity);
                                    }
                                    USession::getInstance()::unsetSessionElement('cartguest');
                                }
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

    /**
     * Show the general registration page where you can choose the type of registration (seller or customer)
     */
    public static function registration(){
        $view = new VRegistration();
        $view->showRegistration();
    }

    /**
     * Processes the POST request for customer registration. It checks if all required fields
     * are set, validates the passwords, and verifies the uniqueness of the email and username. 
     * If everything is valid, it creates new user and customer objects and saves them in the db.
     * In case of any validation errors, it invokes the appropriate error views.
     */
    public static function registrationCustomer() { 
        if (UHTTPMethods::isPostSet('email') && UHTTPMethods::isPostSet('username') && UHTTPMethods::isPostSet('password') && UHTTPMethods::isPostSet('confirm-password')) {
            $email = UHTTPMethods::post('email');
            $username = UHTTPMethods::post('username');
            $password = UHTTPMethods::post('password');
            $confirmPassword = UHTTPMethods::post('confirm-password');
            if ($password !== $confirmPassword) {
                $view = new VRegistration(); 
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
                $view = new VRegistration(); 
                $view->registrationError(); 
                return;
            }
        } else {
            $view = new VRegistration(); 
            $view->registrationError(); 
            return;
        }        
    }

    /**
     * Processes the POST request for seller registration. It checks if all required fields
     * are set, validates the passwords, and verifies the uniqueness of the email and username. 
     * If everything is valid, it creates new user and seller objects and saves them in the db.
     * In case of any validation errors, it invokes the appropriate error views.
     */
    public static function registrationSeller(){
        $view = new VRegistration();  
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']) && isset($_POST['shopname']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
                $email = UHTTPMethods::post('email');
                $username = UHTTPMethods::post('shopname');
                $password = UHTTPMethods::post('password');
                $confirmPassword = UHTTPMethods::post('confirm-password');
                $GLOBALS['justRegistered'] = true;
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
    
    /**
     * Logout the user
     */
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
}
