<?

Class CCustomer{

    public static function dashboard(){
        if(USession::isSetSessionElement('customer')){
            echo USession::getSessionElement('customer');
            return;
            //modifica l'header per andare nella dashboard del customer;
        }
        //mostra la view del login
        echo "no";
    }
}