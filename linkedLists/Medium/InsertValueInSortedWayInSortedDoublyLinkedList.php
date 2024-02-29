<?php

class Node{
    public $data;
    public $next;
    public $prev;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = $this->prev = NULL;
    }
}

function insert(&$root,$data){
    $node = new Node($data);
    if($root == NULL){
        $root = $node;
        return;
    }else if($root->data >= $node->data){
        $node->next = $root;
        $node->next->prev = $node;
        $root = $node;
        return;
    }else{
        $current = $root;
        while($current->next != NULL && $current->next->data < $node->data){
            $current = $current->next;
        }
        $node->next = $current->next;
        if($current->next != NULL){
            $node->next->prev = $node;
        }
        $current->next = $node;
        $node->prev = $current;
    }
}

function printList($root){
    while($root != NULL){
        echo $root->data." ";
        $root = $root->next;
    }
    echo "<br/>";
}

$head = NULL;
insert($head, 100);
insert($head, 15);
insert($head, 13);
insert($head, 11);
insert($head, 1);
insert($head, 5);
printList($head);