<?php




class SignUpController  {
    public $regmod;


    function __construct(){
        Session::init();

        $this->regmod=new LoginModell();
        autoload("SignUpView");

        print_r(Session::get('error'));
        echo " konstruktor<br/>";
    }


    function insertUser(){
        if(isset($_POST['reg_sub'])){
            $username=$_POST['reg_u_name'];
            $psw=$_POST['reg_psw'];
            $name=$_POST['reg_name'];
            $email=$_POST['reg_mail'];
            $errors=($this->regmod->insert($username,$psw,$name,$email));
            $this->msg=$errors;
            Session::set('error',$errors);
            print_r(Session::get('error'));
            echo " Conroller<br/>";



        }
    }

    private function write(){

    }




}