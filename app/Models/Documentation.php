<?php

final class Documentation extends ObjectModel{
   
    public $title;
    public $text;
    public $creation_date;

    function define(){
        $this->table = "documentation";
        $this->fields = [[
                "name" => "id",
                "type" => "INT(11)",
                "more" => "AUTO_INCREMENT PRIMARY KEY",
            ] ,[
                "name" => "title",
                "type" => "VARCHAR( 50 )",
                "more" => "",
            ],[
                "name" => "text",
                "type" => "TEXT",
                "more" => "",
            ] ,[
                "name"=> "creation_date",
                "type"=> "TIMESTAMP",
                "more"=> "DEFAULT CURRENT_TIMESTAMP"
            ]
        ];
    }
}