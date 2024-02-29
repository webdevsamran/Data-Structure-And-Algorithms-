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
    if(!$root){
        $root = $node;
    }else{
        $node->next = $root;
        $root->prev = $node;
        $root = $node;
    }
}

function printList($root){
    while($root != NULL){
        echo $root->data." ";
        $root = $root->next;
    }
    echo "<br/>";
}

function rotateByN(&$root,$rotation){
    if($rotation == 0){
        return;
    }
    
    $current = $root;
    while($rotation){
        $current = $current->next;
        $rotation--;
    }

    $tail = $current->prev;
    $newHead = $current;
    $tail->next = NULL;
    $current->prev = NULL;

    while($current->next != NULL){
        $current = $current->next;
    }

    $current->next = $root;
    $root->prev = $current;
    $root = $newHead;
}

$head = NULL;

insert($head, 12);
insert($head, 12);
insert($head, 10);
insert($head, 4);
insert($head, 8);
insert($head, 4);
insert($head, 6);
insert($head, 4);
insert($head, 4);
insert($head, 8);
 
echo "Original Doubly linked list.<br/>";
printList($head);

rotateByN($head,1);

printList($head);