<?php


class Datebase{
    private static $db=null;

    public function __construct(){
    }

    public static function getDatabase(){

        if(is_null(self::$db)){
             self::$db=new PDO("mysql:host=localhost;dbname=FileStorage","admin","admin4321");
             self::$db->exec("set names utf8");

        }
        return self::$db;

        //return new PDO("mysql:host=localhost;dbname=FileStorage","admin","admin4321");
    }
}