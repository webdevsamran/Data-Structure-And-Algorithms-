<?php

class Node{
    public $data;
    public $next;

    function __construct($data = NULL)
    {
        $this->data = $data;
        $this->next = NULL;
    }
}

function mergeKSortedLists($arr, $n){
    $minHeap = new SplMinHeap;
    for($i = 0; $i < $n; $i++){
        $minHeap->insert($arr[$i]);
    }
    if($minHeap->count() <= 0){
        return NULL;
    }
    $dummy = new Node;
    $last = $dummy;
    while(!$minHeap->isEmpty()){
        $curr = $minHeap->extract();
        $last->next = $curr;
        $last = $last->next;
        if($curr->next){
            $minHeap->insert($curr->next);
        }
    }
    return $dummy->next;
}

function printList($head){
    while($head){
        echo $head->data . " ";
        $head = $head->next;
    }
    echo "<br/>";
}

$N = 3;
$K = 4;
$arr = array();
$arr[0] = new Node(1);
$arr[0]->next = new Node(3);
$arr[0]->next->next = new Node(5);
$arr[0]->next->next->next = new Node(7);
$arr[1] = new Node(2);
$arr[1]->next = new Node(4);
$arr[1]->next->next = new Node(6);
$arr[1]->next->next->next = new Node(8);
$arr[2] = new Node(0);
$arr[2]->next = new Node(9);
$arr[2]->next->next = new Node(10);
$arr[2]->next->next->next = new Node(11);
$head = mergeKSortedLists($arr, $N);
printList($head);