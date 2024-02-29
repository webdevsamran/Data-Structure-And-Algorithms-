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

function printNodes($node){
    while($node != NULL){
        echo $node->data . " ";
        $node = $node->next;
    }
}

function pairWiseSwap($head){
    $prev = NULL;
    $next = NULL;
    $curr = $head;
    $count = 0;
    while($curr != NULL && $count < 2){
        $next = $curr->next;
        $curr->next = $prev;
        $prev = $curr;
        $curr = $next;
        $count++;
    }
    if($next != NULL){
        $head->next = pairWiseSwap($next);
    }
    return $prev;
}

$node = new Node(9);
$node->next = new Node(6);
$node->next->next = new Node(4);
$node->next->next->next = new Node(2);
$node->next->next->next->next = new Node(3);
$node->next->next->next->next->next = new Node(8);

$rNodes = pairWiseSwap($node);
printNodes($rNodes);