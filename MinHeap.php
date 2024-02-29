<?php

class MinHeap{
    public $heap_arr;

    function __construct(){
        $this->heap_arr = array();
    }

    function insertIntoHeap($x){
        $size = sizeof($this->heap_arr);
        if($size == 0){
            array_push($this->heap_arr,$x);
        }else{
            array_push($this->heap_arr,$x);
            for($i = ($size/2)-1; $i >= 0; $i--){
                $this->heapify($i);
            }
        }
    }

    public function heapify($i){
        $largest = $i;
        $left = 2 * $i + 1;
        $right = 2 * $i + 2;
        $size = sizeof($this->heap_arr);

        if($left < $size && $this->heap_arr[$left] < $this->heap_arr[$largest]){
            $largest = $left;
        }
        if($right < $size && $this->heap_arr[$right] < $this->heap_arr[$largest]){
            $largest = $right;
        }

        if($largest != $i){
            $this->swap($this->heap_arr[$largest],$this->heap_arr[$i]);
            $this->heapify($largest);
        }
    }

    public function swap(&$a,&$b){
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    public function deleteNode($x){
        $size = sizeof($this->heap_arr);
        for($i = 0; $i < $size; $i++){
            if($this->heap_arr[$i] == $x){
                break;
            }
        }
        $this->swap($this->heap_arr[$i],$this->heap_arr[$size-1]);
        array_pop($this->heap_arr);
        for($i = ($size/2)-1; $i >= 0; $i--){
            $this->heapify($i);
        }
    }

    public function print(){
        $size = sizeof($this->heap_arr);
        for($i = 0; $i < $size; $i++){
            echo $this->heap_arr[$i]." ";
        }
        echo "<br/>\n";
    }
}

$minheap = new MinHeap();
$minheap->insertIntoHeap(3);
$minheap->insertIntoHeap(4);
$minheap->insertIntoHeap(9);
$minheap->insertIntoHeap(5);
$minheap->insertIntoHeap(2);
$minheap->print();
$minheap->deleteNode(4);
$minheap->print();