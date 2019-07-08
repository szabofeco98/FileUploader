<?php

$msg=[];
abstract class BaseController{
    protected function view($classname,$message){

        Session::init();
        autoload($classname);
        $GLOBALS['msg']['message']=$message;
        print_r($GLOBALS['msg']['message']);
        echo "<br/>";

    }
}