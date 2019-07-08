<?php

class LoginController extends BaseController {
    public $log;

    function __construct(){
        $this->log = new LoginModell();
    }

    function index($errors=[]){
        $this->view("LoginView",$errors);
        //echo print_r($errors);
    }



    function loginIn(){

        $error=[];
        $username=$_POST['uname'];
        $password=$_POST['psw'];
        if(isset($_POST['sub'])) {
            $result = $this->log->existUser($username, $password);

            switch ($result) {
                case "sucess":{
                    Session::init();
                    Session::set("loggedin", true);
                    Session::set('user_name', $username);
                    call_user_func_array(array("LoginController","index"),array());
                    header("Location:/index.php?page=FileManager");
                    break;
                }
                case "wrongpsw":{
                    $error["wrongPsw"]="Hibás Jelszó!!";
                    break;
                }

                case "wrongname":{
                    $error["wrongName"]="Hibás Felhasználó név!";
                    break;
                }
            }
            call_user_func_array(array("LoginController","index"),array($error));
        }
    }

}

?>