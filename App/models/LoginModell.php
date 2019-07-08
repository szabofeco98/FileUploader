<?php


class LoginModell{
    private $db;

    function __construct(){
        $this->db=Datebase::getDatabase();
    }

    function existUser($username,$paswd){
        $stmt = $this->db->prepare("SELECT * FROM users where user_name=:username ");
        $stmt->execute(["username" => $username]);
        $exist=$stmt->fetch(PDO::FETCH_ASSOC);

        if($exist){
            $stmt = $this->db->prepare("SELECT passwd FROM users where user_name=:username ");
            $stmt->execute(["username"=>$username]);
            $select=$stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($paswd, $select['passwd'])) {
                return 'sucess';
            } else {
                return 'wrongpsw';
            }
        }else return "wrongname";
    }

    function insert($username,$password,$name,$email){
        $errors=[];
        if($this->validUserName($username)=="invalid") array_push($errors,"invalidUname");
        if($this->validPassword($password)=="invalid") array_push($errors,"invalidPsw");
        if($this->validEmail($email)=="invalid") array_push($errors,"invalidEmail");
        if($this->existUser($username,$password)=="sucess" || $this->existUser($username,$password)=="wrongpsws" ) {
            array_push($errors, "userExist");
        }else
            if($this->validEmail($email)=="valid" && $this->validPassword($password)=="valid"
            && $this->validUserName($password)=="valid"){
            $password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->db->prepare("INSERT INTO users(user_name,passwd,email,name)
                                     VALUES(:username,:password,:email,:user_name)");
            $stmt->execute(["username" => $username, "password" => $password, "email" => $email, "user_name" => $name]);
            array_push($errors, "sucess");
        }
        return $errors;
    }

    private function validUserName($username){
        if (preg_match('/[^\p{L}0-9\p{L}a-z\p{L}A-Z\p{L}\s]/u',$username) or strlen(trim($username))<3) {
            return "invalid";
        }
        return "valid";
    }

    private function validPassword($password){
        if (preg_match('/[^\p{L}0-9\p{L}a-z\p{L}A-Z\p{L}\s]/u',$password) or strlen(trim($password))<3) {
            return "invalid";
        }
        return "valid";
    }

    private function validEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "invalid";
        }
        return "valid";
    }



}

?>