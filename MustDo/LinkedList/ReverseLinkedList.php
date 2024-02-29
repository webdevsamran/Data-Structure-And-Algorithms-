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

function reverseList($head){
    if($head == NULL || $head->next == NULL){
        return $head;
    }
    $temp = $head;
    $stack = new SplStack;
    while($temp){
        $stack->push($temp->data);
        $temp = $temp->next;
    }
    $temp = new Node($stack->pop());
    $n_s = $temp;
    while(!$stack->isEmpty()){
        $temp->next = new Node($stack->pop());
        $temp = $temp->next;
    }
    return $n_s;
}

$node = new Node(1);
$node->next = new Node(2);
$node->next->next = new Node(3);
$node->next->next->next = new Node(4);
$node->next->next->next->next = new Node(5);

$rNode = reverseList($node);
printNodes($rNode);