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

function split(&$root){
    $fast = $root;
    $slow = $root;

    while($fast->next && $fast->next->next){
        $fast = $fast->next->next;
        $slow = $slow->next;
    }
    $temp = $slow->next;
    $slow->next = NULL;
    return $temp;
}

function merge(&$first,&$second){
    if(!$first){
        return $second;
    }
    if(!$second){
        return $first;
    }
    if($first->data < $second->data){
        $first->next = merge($first->next,$second);
        $first->next->prev = $first;
        $first->prev = NULL;
        return $first;
    }else{
        $second->next = merge($first,$second->next);
        $second->next->prev = $second;
        $second->prev = NULL;
        return $second;
    }
}

function mergeSort(&$root){
    if(!$root || !$root->next){
        return $root;
    }
    $second = split($root);
    $root = mergeSort($root);
    $second = mergeSort($second);

    return merge($root,$second);
}

$head = NULL;
insert($head, 5);
insert($head, 20);
insert($head, 4);
insert($head, 3);
insert($head, 30);
insert($head, 10);
printList($head);

$head = mergeSort($head);
echo "Linked List after sorting.<br/>";
printList($head);