<?php 

class ObjectModel {

    public function connectdb() {
        return new PDO("mysql:host=3306:3306;dbname=hotdb;", "hotuser","hotpassword");
    }
    
}