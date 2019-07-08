<?php

class SignUpController extends BaseController {
    private $regmod;


    function __construct(){
        $this->regmod=new LoginModell();
    }

     function index($errors=[]){
        $this->view("SignUpView",$errors);
        //echo print_r($errors);
    }


    function insertUser(){
        if(isset($_POST['reg_sub'])){
            $username=$_POST['reg_u_name'];
            $psw=$_POST['reg_psw'];
            $name=$_POST['reg_name'];
            $email=$_POST['reg_mail'];
            $errors=($this->regmod->insert($username,$psw,$name,$email));
            call_user_func_array(array("SignUpController","index"),array($errors));

        }
    }

}


?>

