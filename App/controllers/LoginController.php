<?php

class LoginController{
    public $log;

    function __construct(){
        $this->log = new LoginModell();
        autoload("LoginView");
        print_r($GLOBALS['message']);
    }




    function loginIn(){

        $username=$_POST['uname'];
        $password=$_POST['psw'];
        if(isset($_POST['sub'])) {
            if( $this->log->existUser($username,$password)=='sucess'){
                Session::init();
                Session::set("loggedin",true);
                Session::set('user_name', $username);
                header("Location:/index.php?page=FileManager");
            }
        }

    }

}

?>