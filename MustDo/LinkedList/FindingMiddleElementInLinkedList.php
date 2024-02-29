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

function getMiddle($head){
    $slow = $head;
    $fast = $head;
    while($fast != NULL && $fast->next != NULL){
        $slow = $slow->next;
        $fast = $fast->next->next;
    }
    return $slow->data;
}

$node = new Node(1);
$node->next = new Node(2);
$node->next->next = new Node(3);
$node->next->next->next = new Node(4);
$node->next->next->next->next = new Node(5);

echo getMiddle($node);