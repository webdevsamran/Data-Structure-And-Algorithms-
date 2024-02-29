<?php

class Node{
    public $data;
    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }
}

function printNodes($node){
    while($node != NULL){
        echo $node->data . " ";
        $node = $node->next;
    }
}

function getNthFromLast($head,$n){
    $temp = $head;
    $count = 0;
    while($temp){
        $count++;
        $temp = $temp->next;
    }
    if($n > $count){
        return -1;
    }
    $temp = $head;
    for($i = 0; $i < $count - $n; $i++){
        $temp = $temp->next;
    }
    return $temp->data;
}

$node = new Node(1);
$node->next = new Node(2);
$node->next->next = new Node(3);
$node->next->next->next = new Node(4);
$node->next->next->next->next = new Node(5);

$n = 2;
echo getNthFromLast($node,$n);