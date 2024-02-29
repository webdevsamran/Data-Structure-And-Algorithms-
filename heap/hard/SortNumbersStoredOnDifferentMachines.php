<?php

class ListNode{
    public $data;
    public $next;
}

class MinHeapNode{
    public $head;

    function __construct()
    {
        $this->head = new ListNode;
    }
}

class MinHeap{
    public $count;
    public $capacity;
    public $array;

    function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->count = 0;
        $this->array = array_fill(0,$capacity,new MinHeapNode);
    }
}

function push(&$root,$data){
    $new_node = new ListNode;
    $new_node->data = $data;
    $new_node->next = $root;
    $root = $new_node;
}

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function minHeapify(&$minHeap,$idx){
    $left = 2 * $idx + 1;
    $right = 2 * $idx + 2;
    $smallest = $idx;

    if($left < $minHeap->count && $minHeap->array[$left]->head->data < $minHeap->array[$idx]->head->data){
        $smallest = $left;
    }
    if($right < $minHeap->count && $minHeap->array[$right]->head->data < $minHeap->array[$idx]->head->data){
        $smallest = $right;
    }
    if($smallest != $idx){
        swap($minHeap->array[$smallest], $minHeap->array[$idx] );
        minHeapify( $minHeap, $smallest );
    }
}

function isEmpty($minHeap){
    return ($minHeap->count == 0);
}

function buildMinHeap(&$minHeap){
    $n = $minHeap->count - 1;
    for($i = (int)(($n-1)/2); $i >= 0; $i--){
        minHeapify($minHeap,$i);
    }
}

function populateMinHeap(&$minHeap,&$array,$n){
    for($i = 0; $i < $n; $i++){
        $minHeap->array[$minHeap->count++]->head = $array[$i];
    }
    buildMinHeap($minHeap);
}

function extractMin(&$minHeap){
    if(isEmpty($minHeap)){
        return NULL;
    }
    $temp = $minHeap->array[0];
    if($temp->head->next){
        $minHeap->array[0]->head = $temp->head->next;
    }else{
        $minHeap->array[0] = $minHeap->array[$minHeap->count - 1];
        --$minHeap->count;
    }
    minHeapify($minHeap,0);
    return $temp->head;
}

function externalSort(&$array,$n){
    $minHeap = new MinHeap($n);
    populateMinHeap($minHeap,$array,$n);
    while ( !isEmpty( $minHeap ) ) {
        $temp = extractMin( $minHeap );
        printf( "%d ",$temp->data );
    }
}

$N = 3;
$array = array();
$array[0] = NULL;
push ($array[0], 50);
push ($array[0], 40);
push ($array[0], 30);
$array[1] = NULL;
push ($array[1], 45);
push ($array[1], 35);
$array[2] = NULL;
push ($array[2], 100);
push ($array[2], 80);
push ($array[2], 70);
push ($array[2], 60);
push ($array[2], 10);
externalSort( $array, $N );