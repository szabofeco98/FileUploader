<?php


class FileManagerController extends BaseController {

    function __construct(){
        Session::init();
        if(!Session::get("loggedin")) {
            Session::destroy();
            autoload("LoginView");
        }else{
            echo "Hello ".Session::get("user_name");
            autoload("FileManagerView");
        }

    }

    function upload(){
        if(isset($_POST['submit'])){
            $errors= array();
            $file_name = $_FILES['fileToUpload']['name'];
            $file_size =$_FILES['fileToUpload']['size'];
            $file_tmp =$_FILES['fileToUpload']['tmp_name'];
            $file_type=$_FILES['fileToUpload']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));

            echo $file_name."<br/>".$file_size."<br/>".$file_tmp."<br/>".$file_type;
            move_uploaded_file($file_tmp,"/".$file_name);
            echo "Success";
        }
    }


}