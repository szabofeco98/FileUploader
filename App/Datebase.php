<?php


class Datebase{


    public static function getDatabase(){
       return new PDO("mysql:host=localhost;dbname=mysql","admin","admin4321");
    }
}