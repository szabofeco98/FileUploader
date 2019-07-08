<?php

class SignUpController extends BaseController {
    private $regmod;


    function __construct(){
        $this->regmod=new LoginModell();
    }

    function index($errors="inicial"){
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

            /*
            foreach ($errors as $error){
                if($error=="sucess") call_user_func_array(array("SignUp","index"),array(["message"=>"Sikeres regisztáció!"]));
            }*/
            //call_user_func_array(array("SignUp","index"),array(["message"=>"Sikeres regisztáció!"]));
            header("Location:/index.php?page=SignUp&action=index&params=siker");




                /*
            foreach ($errors as $error){


                if($error=="sucess") echo "<div class='sucess'>Sikeres Regisztráció</div>";

                if ($error=="userExist") echo "<div  class='error'>A felhasználó név már használatban van</div>";

                if ($error=="emailExist") echo "<div  class='error'>Az Email cím már használatban van</div>";

                if ($error=="invalidPsw") echo "<div class='error'>Rossz jelszó</div>";

                if ($error=="invalidUname") echo "<div class='error'>Rossz Felhasználónév</div>";

                if ($error=="invalidEmail") echo "<div class='error'>Rossz Email</div>";
            }*/
        }
    }

}


?>

