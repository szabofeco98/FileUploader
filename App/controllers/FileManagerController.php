<?php


class FileManagerController extends BaseController {
    private $FileModell;

    public function __construct(){
        $this->FileModell=new FileManagerModell();
    }

    function index($error=[]){
        Session::init();
        if(!Session::get("loggedin")) {
            Session::destroy();
            autoload("LoginView");
        } else{
            echo "Hello ".Session::get("user_name");
            $this->view("FileManagerView",$error);
        }

    }

    function upload(){
        if(isset($_POST['submit'])){
            $errors= array();
            $file_name = $_FILES['fileToUpload']['name'];
            $file_size =$_FILES['fileToUpload']['size'];
            $file_tmp =$_FILES['fileToUpload']['tmp_name'];
            $file_type=$_FILES['fileToUpload']['type'];

            $tmp = explode('.',$_FILES['fileToUpload']['name']);
            $file_extension = end($tmp);

            if(!$file_extension){
                $errors["notExs"]="Nincs kiválasztott fájl!";
            }

            $this->FileModell->insert($file_name,$file_size,$file_type,$file_tmp);

            call_user_func_array(array("FileManagerController","index"),array($errors));

        }
    }


}