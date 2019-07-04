<?php

class LoginController{
    public $userName;

    function __construct(){
        autoload_view(LoginView);
    }

    function loginIn(){
        $conn=Datebase::getDatabase();
        $username=$_POST['uname'];
        $stmt = $conn->prepare("SELECT * FROM proba where first=:username ");
        $stmt->execute(["username" => $username]);
        $exsist = $stmt->rowCount();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        
        print_r($result);

        echo $exsist;

    }

}

?>