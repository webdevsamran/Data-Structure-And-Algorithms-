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

function push(&$root,$data){
    $node = new Node($data);
    $node->next = $root;
    $root = $node;
}

function removeDuplicates(&$root){
    $current = $root;
    if($current == NULL){
        return;
    }
    while($current->next != NULL){
        if($current->data == $current->next->data){
            $next_next = $current->next->next;
            $current->next = NULL;
            $current->next = $next_next;
        }else{
            $current = $current->next;
        }
    }
}

function printList($root){
    $node = $root;
    while($node != NULL){
        echo $node->data." ";
        $node = $node->next;
    }
    echo "<br/>";
}

$head = NULL;

push($head, 36);
push($head, 36);
push($head, 24);
push($head, 20);
push($head, 15);
push($head, 15);
push($head, 11);
push($head, 11);

printList($head);
removeDuplicates($head);
printList($head);