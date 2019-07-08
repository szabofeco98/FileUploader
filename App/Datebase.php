<?php


class Datebase{

    public static function getDatabase(){
       return new PDO("mysql:host=localhost;dbname=FileStorage","admin","admin4321");
    }
}