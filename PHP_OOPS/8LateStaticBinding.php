<?php

/* class ABC{
    public $xyz = "XYZ Variable";
}

$obj = new ABC;
echo $obj->xyz; */

class DB{
    protected static $table = "BaseTable";
    public function select(){
        echo "SELECT * FROM ". static::$table;
    }
    public function insert(){
        echo "INSERT INTO ". static::$table;
    }
}

class abc extends DB{
    protected static $table = "ABCTable";
}

class def extends DB{
    protected static $table = "DEFTable";
}

$abc = new abc;
$abc->select();

$def = new def;
$def->select();

/* $db = new DB;
$db->select();
echo "<br/>";
$db->insert(); */