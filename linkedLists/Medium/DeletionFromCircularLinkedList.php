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

function deleteNode(&$root,$data){
    if($root == NULL){
        echo "List is Empty.<br/>";
        return;
    }
    if($root->data == $data && $root->next == $root){
        $root = NULL;
        return;
    }
    if($root->data == $data && $root->next != $root){
        $temp = $root;
        $current = $root;
        while($current->next != $root){
            $current = $current->next;
        }
        $current->next = $temp->next;
        $temp = NULL;
        $root = $current->next;
        return;
    }
    $temp = $root;
    $prev = NULL;
    while($temp->next != $root && $temp->data != $data){
        $prev = $temp;
        $temp = $temp->next;
    }

    if($prev == NULL){
        return;
    }

    $prev->next = $temp->next;
    $temp = NULL;
    return;
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
push($head, 10);
push($head, 8);
push($head, 7);
push($head, 5);
push($head, 2);
    
echo "Original Circular Linked List.<br/>";
printList($head);

deleteNode($head, 2);

printList($head);