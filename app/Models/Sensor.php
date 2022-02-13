<?php

final class Sensor extends ObjectModel{
   
    public $name;
    public $description;
    public $type;
    public $current_temperature;
    public $creation_date;

    function define(){
        $this->table = "sensor";
        $this->fields = [[
                "name" => "id",
                "type" => "INT(11)",
                "more" => "AUTO_INCREMENT PRIMARY KEY",
            ],[
                "name" => "name",
                "type" => "VARCHAR( 50 )",
                "more" => "",
            ],[
                "name" => "type",
                "type" => "VARCHAR( 50 )",
                "more" => "",
            ],[
                "name" => "description",
                "type" => "VARCHAR( 250 )",
                "more" => "",
            ],[
                "name" => "current_temperature",
                "type" => "INT(11)",
                "more" => "",
            ] ,[
                "name"=> "creation_date",
                "type"=> "TIMESTAMP",
                "more"=> "DEFAULT CURRENT_TIMESTAMP"
            ]
        ];
    }
}