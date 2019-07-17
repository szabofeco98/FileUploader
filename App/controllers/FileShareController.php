<?php


class FileShare{
    private $FileModell;
    private $Limit;
    public function __construct(){
        $this->Limit=2;
        Session::init();
        $this->FileModell=new FileManagerModell(Session::get("user_name"),$this->Limit);

    }

    function index($error=[]){
        Session::init();
        if(!Session::get("loggedin")) {
            Session::destroy();
            autoload("LoginView");
        } else{
            echo "Hello ".Session::get("user_name");
            Session::init();
            Session::set("files",$this->FileModell->getFiles(0));

            $GLOBALS['files']=$this->FileModell->getFiles(0);
            $GLOBALS['pageNumber']=($this->FileModell->getAllFiles()/$this->Limit);
            $this->view("FileManagerView",$error);

        }

    }

}