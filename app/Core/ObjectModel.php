<?php 
abstract class ObjectModel {

    public $id ;
    protected $table ;
    public $fields= array();


    function __construct($id = null) {
        $this->define();
        if($id != null){
            $obj = $this->getObjectById($id);
            foreach($this->fields as $field){
                $this->{$field['name']} = $obj[$field['name']];
            }
        }
        $this->createTable();

    }

    abstract protected function define();


    protected function createTable(){
        $var = "";
        foreach($this->fields as $field){
            $var .= $field['name']. " " . $field['type'] . " " . $field['more'] .",";
        }
        $var = substr($var, 0, -1);

        
        $db = DataBase::connectdb();
        $sql ="CREATE table IF NOT EXISTS $this->table(". $var .");";
        $db->exec($sql);
    }

    public function save(){
        if ($this->id == null){
            $this->create();
        } 
        else{
            $this->update();
        }
        $obj = $this->getObjectById($this->id);
        foreach($this->fields as $field){
            $this->{$field['name']} = $obj[$field['name']];
        }

    }

    protected function update(){
        $var = "";
        foreach($this->fields as $field){
            $val = $this->{$field['name']};
            if($field['type'] == "BIT(1)") $var .= $field['name']. " =  " . $val . ",";
            else if(!empty($val)) $var .= $field['name']. " =  '" . $val . "',";
        }
        $var = substr($var, 0, -1);


        $db = DataBase::connectdb();
        $sql =" UPDATE $this->table   
                SET ". $var ."  WHERE id  = " . $this->id;

        $db->exec($sql);
    }

    protected function create(){
        $value = "";
        $var = "" ;
        foreach($this->fields as $field){
            $val = $this->{$field['name']};
           
            if (!empty($val)){
                if (is_string($val))$value .= '"'. $val . '",';
                else $value .=  $val . ','; 
                $var .=  $field['name'] . ",";
            } 
          
        }
        $value = substr($value, 0, -1);
        $var = substr($var, 0, -1);

        $db = DataBase::connectdb();
        $sql ="INSERT INTO $this->table (". $var .") VALUES (". $value .") ;";
        $db->exec($sql);
        $this->id = $db->lastInsertId();
    }

    public function getAll(){
        $db = DataBase::connectdb();
        $sql ="SELECT * from $this->table";
        $objects = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $objects;
    }

    public function getObjectBy(string $var, string $val){
        $db = DataBase::connectdb();
        $sql ="SELECT * from $this->table where $var = '$val' ";
        $object = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $object;

    }

    public function getObjectById(int $id){
        $db = DataBase::connectdb();
        $sql ="SELECT * from $this->table where id = $id ";
        $object = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $object;
    }

    public function isObjectExistBy(string $var, string $val){
        $db = DataBase::connectdb();
        $sql ="SELECT * from $this->table where $var = '$val' ";
        $object = $db->query($sql)->fetch();
        if($object == false){
            return false;
        }
        return true;
    }
}