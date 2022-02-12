<?php

final class Setting extends ObjectModel{

    public $id_user;
    public $darkmode;
    

    function __construct($idUser = null)
    {
        $this->define();
        if($idUser != null){
            $obj = $this->getObjectBy("id_user", $idUser);
            foreach($this->fields as $field){
                $this->{$field['name']} = $obj[$field['name']];
            }
        }
        $this->createTable();
    }

    function define(){
        $this->table = "settings";
        $this->fields = [[
                "name" => "id",
                "type" => "INT(11)",
                "more" => "AUTO_INCREMENT PRIMARY KEY",
            ]  , [
                "name" => "id_user",
                "type" => "INT(11)",
                "more" => "",
            ] , [
                "name" => "darkmode",
                "type"=> "BIT(1)",
                "more"=> "DEFAULT 0"
            ] 
        ];
    }


    

}