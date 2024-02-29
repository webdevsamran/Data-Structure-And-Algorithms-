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

function deleteNode(&$root,$del_node){
    if($root == NULL || $del_node == NULL){
        return;
    }
    if($root == $del_node){
        $root = $del_node->next;
    }
    if($del_node->next != NULL){
        $del_node->next->prev = $del_node->prev;
    }
    if($del_node->prev != NULL){
        $del_node->prev->next = $del_node->next;
    }
    $del_node = NULL;
}

function removeDuplicates(&$root){
    if($root == NULL){
        return;
    }

    $us = array();
    $current = $root;
    $next = NULL;

    while($current != NULL){
        if(in_array($current->data,$us)){
            $next = $current->next;
            deleteNode($root,$current);
            $current = $next;

        }else{
            array_push($us,$current->data);
            $current = $current->next;
        }
    }
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

removeDuplicates($head);
 
echo "<br/>Doubly linked list after removing duplicates:<br/>";
printList($head);