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

function reverseInGroups($head,$k){
    if($head == NULL){
        return $head;
    }
    $prev = NULL;
    $next = NULL;
    $curr = $head;
    $count = 0;
    while($curr != NULL && $count < $k){
        $next = $curr->next;
        $curr->next = $prev;
        $prev = $curr;
        $curr = $next;
        $count++;
    }
    if($next != NULL){
        $head->next = reverseInGroups($next,$k);
    }
    return $prev;
}

$node = new Node(1);
$node->next = new Node(2);
$node->next->next = new Node(3);
$node->next->next->next = new Node(4);
$node->next->next->next->next = new Node(5);

$k = 3;
$rNode = reverseInGroups($node,$k);
printNodes($rNode);