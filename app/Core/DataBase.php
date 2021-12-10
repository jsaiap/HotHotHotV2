<?php
final class DataBase{
    static function connectdb() {

        $host = "mysql";
        $port = "3306";
        $db = "hotdb";
        $username = "hotuser";
        $password = "hotpassword";

        try {
            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db","$username","$password");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
            echo "Connecté";
        } catch (PDOException $e) {
            echo "Connection erreur :" . $e->getMessage();
        }

        // return new PDO("mysql:host=127.0.0.1;port:3306;dbname=hotdb;","hotuser","hotpassword");
    }

    static function init(){
        $db = self::connectdb();

        $sql ="CREATE table IF NOT EXISTS users(
            ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR( 50 ) NOT NULL, 
            password VARCHAR( 250 ) NOT NULL,
            email VARCHAR( 150 ) NOT NULL);" ;

        $db->exec($sql);
    }
}
