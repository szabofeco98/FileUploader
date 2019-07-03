<?php


class Route{

    private $url;
    private $controller='Login';
    private $action='';
    private $params=[];


    function __construct(){
        if(!empty($_GET)){
            $this->url=$_GET;
        }

        if(isset($this->url['page'])){
            $this->controller = $this->url['page'];
            if(class_exists($this->controller)) {
                $this->controller=new $this->controller();
            }else{
                echo "<h1>404 A keresett oldal nem található</h1>";
            }
        }else{
            $this->controller=new $this->controller();
        }

        if(isset($this->url['action'])){
            $this->action=$this->url['action'];
            if(method_exists($this->controller,$this->action)) {
                //echo "létezik";
                $this->action = $this->url['action'];
            }
        }

        if(isset($this->url['params'])){
            $this->params=$this->url['params'];
            //echo $this->params;
        }

        call_user_func(array($this->controller, $this->action), $this->params /* , ... */);


    }

    /*
    function createController(){
        if(class_exists($this->controller)){

        }else{
            echo "<h1>404 A keresett oldal nem található</h1>";
        }
    }*/




}