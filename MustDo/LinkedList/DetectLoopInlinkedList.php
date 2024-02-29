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

function detectLoop($head){
    $temp = $head;
    do{
        $temp = $temp->next;
        if($temp == $head){
            return true;
        }else if($temp == NULL){
            return false;
        }
    }while($temp != $head && $temp != NULL);
}

$node = new Node(1);
$node->next = new Node(2);
$node->next->next = new Node(3);
$node->next->next->next = new Node(4);
$node->next->next->next->next = new Node(5);
$node->next->next->next->next->next = $node;

echo detectLoop($node);