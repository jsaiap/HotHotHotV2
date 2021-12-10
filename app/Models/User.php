<?php

final class User extends ObjectModel{

    public $username;
    public $name;
    public $password;
    public $email;
    public $admin;
    
    function define(){
        $this->table = "users";
        $this->fields = [[
                "name" => "id",
                "type" => "INT(11)",
                "more" => "AUTO_INCREMENT PRIMARY KEY",
            ]  , [
                "name" => "username",
                "type" => "VARCHAR( 50 )",
                "more" => "NOT NULL",
            ] , [
                "name" => "name",
                "type" => "VARCHAR( 50 )",
                "more" => "NOT NULL",
            ] ,[
                "name" => "password",
                "type" => "VARCHAR( 50 )",
                "more" => "NOT NULL",
            ] , [
                "name" => "email",
                "type" => "VARCHAR( 50 )",
                "more" => "NOT NULL"
            ] ,[
                "name"=> "admin",
                "type"=> "BOOLEAN",
                "more"=> "DEFAULT 0"
            ]
        ];
    }


    

}