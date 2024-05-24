<?

Class CAdmin{

    public static function dashboard(){
        if(USession::isSetSessionElement('admin')){
            echo USession::getSessionElement('admin');
            return;
            //modifica l'header per andare nella dashboard del admin;
        }
        //mostra la view del login
        echo "no";
    }
    public static function users(){

    }
    
}