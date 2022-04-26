<?php

namespace Model;

// Connexion à la base de donnée tu connais

abstract class Connect{

    const HOST = "localhost";
    const DB = "cinema";
    const USER = "root";
    const PASS = "";

    // Le fameux try catch pour pouvoir se connecter

    public static function seConnecter(){
        try {
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
        } catch(\PDOException $ex){
            return $ex->getMessage();
        }
    }
}