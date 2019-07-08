<?php


class FileManagerController{
    function __construct(){
        Session::init();
        if(!Session::get("loggedin")) {
            Session::destroy();
            autoload("LoginView");
        }else{
            autoload("FileManagerView");
            echo "Hello ".Session::get("user_name");
        }

    }


}