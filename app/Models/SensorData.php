<?php

final class SensorData extends ObjectModel{

    public $sensor_id;
    public $temperature;
    public $creation_date;

    function define(){
        $this->table = "sensor_data";
        $this->fields = [[
                "name" => "id",
                "type" => "INT(11)",
                "more" => "AUTO_INCREMENT PRIMARY KEY",
            ]  , [
                "name" => "sensor_id",
                "type" => "INT(11)",
                "more" => "",
            ] , [
                "name" => "temperature",
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