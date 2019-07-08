<?php

class Route{

    private $url;
    private $controller= 'Login';
    private $action='index';
    private $params=["message"=>"inicial"];


    function __construct(){
        if(!empty($_GET)){
            $this->url=$_GET;
        }

        if(isset($this->url['page'])){
            $this->controller = $this->url['page']."Controller";
            if(class_exists($this->controller) ) {
                $this->controller=new $this->controller();
            }else{
                echo "<h1>404 A keresett oldal nem található</h1>";
            }
        }else{
            header("Location:/index.php?page=Login");
        }

        /*
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
        }*/

        if(isset($this->url['action'])){
            $this->action=$this->url['action'];
            if(method_exists($this->controller,$this->action)) {
                //echo "létezik";
                $this->action = $this->url['action'];
                unset($this->url['action']);
            }
            else $this->action="index";
        }

        if(isset($this->url['params'])){
            $this->params=explode(",",$this->url['params']);
           // echo $this->params[2];
        }
        /*
        print_r( $this->controller);
        print_r( $this->action);
        print_r( $this->params);
        */
        $GLOBALS['msg']['message']=$this->params;
        call_user_func(array($this->controller, $this->action), $this->params );


    }





}