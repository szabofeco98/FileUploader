<?php

class Route{

    private $url;
    private $controller= '';
    private $action='index';
    private $params=[];


    function __construct(){
        if(!empty($_GET)){
            $this->url=$_GET;
        }
        /*
        if(isset($this->url['page'])){
            $this->controller = $this->url['page']."Controller";
            if(class_exists($this->controller) ) {
                $this->controller=new $this->controller();
            }else{
                echo "<h1>404 A keresett oldal nem található</h1>";
            }
        }else{
            $this->controller=new $this->controller();
        }*/

        if(!isset($this->url['page'])){
           // $this->controller=new LoginController();
            header("Location:/index.php?page=Login");
        }

        if($this->controller!=$this->url['page']."Controller"){
            $this->controller = $this->url['page']."Controller";
            if(class_exists($this->controller) ) {
                $this->controller=new $this->controller();
                unset($this->url['page']);
            }else{
                echo "<h1>404 A keresett oldal nem található</h1>";
            }
        }

        if(isset($this->url['action'])){
            $this->action=$this->url['action'];
            if(method_exists($this->controller,$this->action)) {
                //echo "létezik";
                $this->action = $this->url['action'];
                unset($this->url['action']);
            }
        }

        if(isset($this->url['params'])){
            $this->params=explode(",",$this->url['params']);
           // echo $this->params[2];
        }

        call_user_func(array($this->controller, $this->action), $this->params );


    }





}