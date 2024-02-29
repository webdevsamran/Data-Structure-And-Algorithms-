<?php

class minHeap{
    public $capacity;
    public $heap_size;
    public $heap;

    function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->heap_size = 0;
        $this->heap = array();
    }

    function parent($i){
        return (int)(($i-1)/2);
    }

    function left($i){
        return (int)(2 * $i + 1);
    }

    function right($i){
        return (int)(2 * $i + 2);
    }

    function swap(&$a,&$b){
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    function insert($key){
        if($this->capacity == $this->heap_size){
            echo "Overflowed.<br/>";
            return;
        }
        $this->heap_size++;
        $i = $this->heap_size - 1;
        $this->heap[$i] = $key;

        while($i != 0 && $this->heap[$this->parent($i)] > $this->heap[$i]){
            $this->swap($this->heap[$i],$this->heap[$this->parent($i)]);
            $i = $this->parent($i);
        }
    }

    function minHeapify($i){
        $left = $this->left($i);
        $right = $this->right($i);
        $smallest = $i;
        if($left < $this->heap_size && $this->heap[$left] < $this->heap[$smallest]){
            $smallest = $left;
        }
        if($right < $this->heap_size && $this->heap[$right] < $this->heap[$smallest]){
            $smallest = $right;
        }
        if($smallest != $i){
            $this->swap($this->heap[$smallest],$this->heap[$i]);
            $this->minHeapify($smallest);
        }
    }

    function printSmallerThan($x,$pos = 0){
        if($pos >= $this->heap_size){
            return;
        }
        if($this->heap[$pos] >= $x){
            return;
        }
        echo $this->heap[$pos]." ";
        $this->printSmallerThan($x,$this->left($pos));
        $this->printSmallerThan($x,$this->right($pos));
    }
}

$heap = new minHeap(50);
$heap->insert(3);
$heap->insert(2);
$heap->insert(15);
$heap->insert(5);
$heap->insert(4);
$heap->insert(45);
$heap->insert(80);
$heap->insert(6);
$heap->insert(150);
$heap->insert(77);
$heap->insert(120);

// Print all nodes smaller than 100.
$x = 100;
$heap->printSmallerThan($x);