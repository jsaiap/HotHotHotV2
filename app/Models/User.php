<?php

final class User extends ObjectModel{

    public $username;
    public $name;
    public $password;
    public $email;
    public $picture;
    public $admin;
    public $creation_date;
    public $connexion_date;
    public $connexion_number;
    public $locked;
    public $google;
    
    function save(){
        parent::save();
        $setting = new Setting();
        $setting->id_user = $this->id;
        $setting->save();
    }

    function define(){
        $this->table = "users";
        $this->fields = [[
                "name" => "id",
                "type" => "INT(11)",
                "more" => "AUTO_INCREMENT PRIMARY KEY",
            ]  , [
                "name" => "username",
                "type" => "VARCHAR( 50 )",
                "more" => "",
            ] , [
                "name" => "name",
                "type" => "VARCHAR( 50 )",
                "more" => "",
            ] ,[
                "name" => "password",
                "type" => "VARCHAR( 50 )",
                "more" => "",
            ] , [
                "name" => "email",
                "type" => "VARCHAR( 50 )",
                "more" => "NOT NULL"
            ], [
                "name" => "picture",
                "type" => "VARCHAR( 100 )",
                "more" => ""
            ] ,[
                "name"=> "admin",
                "type"=> "BIT(1)",
                "more"=> "DEFAULT 0"
            ],[
                "name"=> "creation_date",
                "type"=> "TIMESTAMP",
                "more"=> "DEFAULT CURRENT_TIMESTAMP"
            ],[
                "name"=> "connexion_date",
                "type"=> "TIMESTAMP",
                "more"=> "DEFAULT CURRENT_TIMESTAMP"
            ],[
                "name"=> "connexion_number",
                "type"=> "INT(5)",
                "more"=> "DEFAULT 0"
            ],[
                "name"=> "connexion_fail",
                "type"=> "INT(2)",
                "more"=> "DEFAULT 0"
            ],[
                "name"=> "locked",
                "type"=> "BOOLEAN",
                "more"=> "DEFAULT 0"
            ],[
                "name"=> "google",
                "type"=> "BIT(1)",
                "more"=> "DEFAULT 0"
            ]
        ];
    }
}