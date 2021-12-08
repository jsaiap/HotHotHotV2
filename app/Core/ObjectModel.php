<?php 

class ObjectModel {

    public function connectdb() {
        return new PDO("mysql:host=".${MYSQL_PORT}.";dbname=".${MY_DATABASE}.";", ${MYSQL_USER}, ${MYSQL_PASSWORD});
    }
    
}