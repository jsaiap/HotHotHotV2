<?php
final class DataBase{
    static function connectdb() {
        return new PDO("mysql:host=3306;dbname=hotdb;","hotuser","hotpassword");
    }

    static function init(){
        $db = self::connectdb();
        var_dump("test");

        $sql ="CREATE table users(
            ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR( 50 ) NOT NULL, 
            password VARCHAR( 250 ) NOT NULL,
            email VARCHAR( 150 ) NOT NULL);" ;

        $db->exec($sql);
    }
}
