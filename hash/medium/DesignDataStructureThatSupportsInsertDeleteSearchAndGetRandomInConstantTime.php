<?php

class myStructure{
    public $arr;
    public $map;

    function __construct()
    {
        $this->arr = array();
        $this->map = array();
    }

    public function swap(&$a,&$b){
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    public function add($x){
        if(array_key_exists($x,$this->map)){
            echo "Value already Present.<br/>";
            return;
        }
        $index = sizeof($this->arr);
        array_push($this->arr,$x);
        $this->map[$x] = $index;
    }

    public function remove($x){
        if(!array_key_exists($x,$this->map)){
            echo "Value Not Present.<br/>";
            return;
        }
        $index = $this->map[$x];
        unset($this->map[$x]);
        $last = sizeof($this->arr) - 1;
        $this->swap($this->arr[$index],$this->arr[$last]);
        array_pop($this->arr);

        $this->map[$this->arr[$index]] = $index;
    }

    public function search($x){
        if(array_key_exists($x,$this->map)){
            return $this->map[$x];
        }
        return;
    }

    public function getRandom(){
        $random = rand(0,sizeof($this->arr)-1);
        return $this->arr[$random];
    }
}

$ds = new myStructure;
$ds->add(10);
$ds->add(20);
$ds->add(30);
$ds->add(40);
echo $ds->search(30) . "<br/>";
$ds->remove(20);
$ds->add(50);
echo $ds->search(50) . "<br/>";
echo $ds->getRandom() . "<br/>";