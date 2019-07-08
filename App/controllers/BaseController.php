<?php

global $msg;

abstract class BaseController{
    protected function view($classname,$message){

        $GLOBALS['msg']=$message;
        autoload($classname);
       // print_r($GLOBALS['msg']['message']);

    }
}