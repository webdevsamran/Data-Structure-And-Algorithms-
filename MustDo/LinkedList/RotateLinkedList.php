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

function rotate($head,$k){
    $tail = $head;
    $len = 0;
    while($tail->next){
        $len++;
        $tail = $tail->next;
    }
    $len++;
    $k = $k % $len;
    while($k--){
        $tail->next = new Node($head->data);
        $tail = $tail->next;
        $head = $head->next;
    }
    return $head;
}

$node = new Node(1);
$node->next = new Node(2);
$node->next->next = new Node(3);
$node->next->next->next = new Node(4);
$node->next->next->next->next = new Node(5);

$k = 2;
$rNode = rotate($node,$k);
printNodes($rNode);