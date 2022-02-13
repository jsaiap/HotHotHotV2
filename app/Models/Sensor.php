<?php

final class Sensor extends ObjectModel{
   
    public $name;
    public $type;
    public $creation_date;

    function define(){
        $this->table = "sensor";
        $this->fields = [[
                "name" => "id",
                "type" => "INT(11)",
                "more" => "AUTO_INCREMENT PRIMARY KEY",
            ] ,[
                "name" => "type",
                "type" => "VARCHAR( 50 )",
                "more" => "",
            ] ,[
                "name"=> "creation_date",
                "type"=> "TIMESTAMP",
                "more"=> "DEFAULT CURRENT_TIMESTAMP"
            ]
        ];
    }
}