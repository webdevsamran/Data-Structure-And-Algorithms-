<?php

class HashNode{
    public $key;
    public $value;

    function __construct($key = NULL, $value = NULL)
    {
        $this->key = $key;
        $this->value = $value;
    }
}

class HashMap{
    public $arr;
    public $capacity;
    public $size;
    public $dummy;

    function __construct()
    {
        $this->capacity = 20;
        $this->size = 0;
        $this->arr = array();

        for($i = 0; $i < 20; $i++){
            $this->arr[$i] = NULL;
        }

        $this->dummy = new HashNode(-1,-1);
    }

    public function hashCode($key){
        return $key % $this->capacity;
    }

    public function sizeofMap(){
        return $this->size;
    }

    public function isEmpty(){
        return ($this->size == 0) ? 1 : 0;
    }

    public function display(){
        for($i = 0; $i < $this->capacity; $i++){
            if($this->arr[$i] != NULL && $this->arr[$i]->key != -1){
                echo "Key : " . $this->arr[$i]->key . " , Value : " . $this->arr[$i]->value . ".<br/>";
            }
        }
    }

    public function insertNode($key,$val){
        $temp = new HashNode($key,$val);
        $hashIndex = $this->hashCode($key);

        while($this->arr[$hashIndex] != NULL && $this->arr[$hashIndex]->key != $key && $this->arr[$hashIndex]->key != -1){
            $hashIndex++;
            $hashIndex %= $this->capacity;
        }

        if($this->arr[$hashIndex] == NULL || $this->arr[$hashIndex]->key == -1){
            $this->size++;
            $this->arr[$hashIndex] = $temp;
        }
    }

    public function deleteNode($key){
        $hashIndex = $this->hashCode($key);

        while($this->arr[$hashIndex] != NULL){
            if($this->arr[$hashIndex]->key == $key){
                $temp = $this->arr[$hashIndex];
                $this->arr[$hashIndex] = $this->dummy;
                $this->size--;
                return $temp->value;
            }
            $hashIndex++;
            $hashIndex %= $this->capacity;
        }

        return NULL;
    }

    public function get($key){
        $hashIndex = $this->hashCode($key);
        $counter = 0;

        while($this->arr[$hashIndex] != NULL){
            if($counter++ > $this->capacity){
                return 0;
            }
            if($this->arr[$hashIndex]->key == $key){
                return $this->arr[$hashIndex]->value;
            }
            $hashIndex++;
            $hashIndex %= $this->capacity;
        }

        return 0;
    }
}

$hashMap = new HashMap;
$hashMap->insertNode(1, 1);
$hashMap->insertNode(2, 2);
$hashMap->insertNode(2, 3);
$hashMap->display();
echo $hashMap->sizeofMap() . "<br/>";
echo $hashMap->deleteNode(2) . "<br/>";
echo $hashMap->sizeofMap() . "<br/>";
echo $hashMap->isEmpty() . "<br/>";
echo $hashMap->get(2);