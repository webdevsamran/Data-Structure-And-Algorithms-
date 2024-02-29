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

function removeLoop($head){
    $map = array();
    $temp = $head;
    while($temp){
        if(array_key_exists(serialize($temp),$map)){
            $temp->next = NULL;
            return true;
        }
        $map[serialize($temp)] = $temp;
        $temp = $temp->next;
    }
    return false;
}

$node = new Node(1);
$node->next = new Node(2);
$node->next->next = new Node(3);
$node->next->next->next = new Node(4);
$node->next->next->next->next = new Node(5);
$node->next->next->next->next = $node->next;

echo removeLoop($node);