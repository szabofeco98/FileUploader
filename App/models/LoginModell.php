<?php


class LoginModell{

    private $db;

    function __construct(){
        $this->db=Datebase::getDatabase();
    }

    function existUser($username,$paswd){


        $stmt = $this->db->prepare("SELECT passwd FROM users where user_name=:username ");
        $stmt->execute(["username" => $username]);
        $exist=$stmt->fetch(PDO::FETCH_ASSOC);
        if($exist){
            if (password_verify($paswd, $exist['passwd'])) {
                return 'sucess';
            } else {
                return 'wrongpsw';
            }
        }else {
            return "wrongname";
        }
    }

    function insert($username,$password,$name,$email){
        $array=[];

        if($this->validUserName($username)=="invalid")   $array["unameError"]="Hibás Felhasználónév!";

        if($this->validPassword($password)=="invalid") $array["pswError"]="Hibás Jelszó!";

        if($this->validEmail($email)=="invalid"  ) $array["emailError"]="Hibás Email cím!";

        if($this->validEmail($email)=="emailExist"  ) $array["emailExist"]="Az emailel már regisztráltak!";

        if($this->existUser($username,$password)!="wrongname"  ) $array["unameExist"]="A felhasználónév már foglalt!";

        if($this->validEmail($email)=="valid" && $this->validPassword($password)=="valid"
        && $this->validUserName($password)=="valid" && $this->existUser($username,$password)=="wrongname"){

            $password = password_hash($password, PASSWORD_BCRYPT);
            $stmt=$this->db->prepare("INSERT INTO users(user_name,passwd,email,name)
                                                VALUES (:username,:passw,:Uemail,:Uname)");
            $stmt->execute(["username"=>$username,"passw"=>$password,"Uemail"=>$email,"Uname"=>$name]);

            $select=$this->db->lastInsertId();

            if($select){
                echo "elvileg";
            }

            $array["sucess"]="Sikeres regisztáció!";
        }

        return $array;
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

    private function validEmail($uEmail){

        if (!filter_var($uEmail, FILTER_VALIDATE_EMAIL)) {
            return "invalid";
        }
        $stmt = $this->db->prepare("SELECT email FROM users where email=:uEmail ");
        $stmt->execute(["uEmail" => $uEmail]);
        $select=$stmt->fetch(PDO::FETCH_ASSOC);

        if($select){
            print_r($select);
            return "emailExist";
        }

        return "valid";
    }




}

?>