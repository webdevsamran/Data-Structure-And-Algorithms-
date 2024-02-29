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
    $temp = $root;
    if($root == NULL){
        $node->next = $node;
    }else{
        while($temp->next != $root){
            $temp = $temp->next;
        }
        $temp->next = $node;
    }
    $root = $node;
}

function splitInHalves($root,&$list1,&$list2){
    if($root == NULL){
        return;
    }

    $slow_ptr = $root;
    $fast_ptr = $root;

    while($fast_ptr->next != $root && $fast_ptr->next->next != $root){
        $fast_ptr = $fast_ptr->next->next;
        $slow_ptr = $slow_ptr->next;
    }

    if($fast_ptr->next->next == $root){
        $fast_ptr = $fast_ptr->next;
    }
    $list1 = $root;
    if($root->next != $root){
        $list2 = $slow_ptr->next;
    }
    $fast_ptr->next = $slow_ptr->next;
    $slow_ptr->next = $root;
}

function printList($root){
    $tmp = $root;
    if($root == NULL){
        echo "List is Empty.<br/>";
        return;
    }
    while($tmp->next != $root){
        echo $tmp->data." ";
        $tmp = $tmp->next;
    }
    echo $tmp->data."<br/>";
}

$head = NULL;
$list1 = NULL;
$list2 = NULL;
push($head, 12);
push($head, 56);
push($head, 2);
push($head, 11);
    
echo "Original Circular Linked List.<br/>";
printList($head);

splitInHalves($head,$list1,$list2);

printList($list1);
printList($list2);