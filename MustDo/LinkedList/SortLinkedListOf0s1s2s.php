<?php

class Node{
    public $data;
    public $next;

    function __construct($data = NULL)
    {
        $this->data = $data;
        $this->next = NULL;
    }
}

function printNodes($node){
    while($node){
        echo $node->data . " ";
        $node = $node->next;
    }
}

function sort012($node){
    $zero = $one = $two = 0;
    $temp = $node;
    while($temp){
        if($temp->data == 0){
            $zero++;
        }
        if($temp->data == 1){
            $one++;
        }
        if($temp->data == 2){
            $two++;
        }
        $temp = $temp->next;
    }
    $temp = NULL;
    $r_node = new Node;
    $temp = $r_node;
    while($zero--){
        $temp->next = new Node(0);
        $temp = $temp->next;
    }
    while($one--){
        $temp->next = new Node(1);
        $temp = $temp->next;
    }
    while($two--){
        $temp->next = new Node(2);
        $temp = $temp->next;
    }
    return $r_node->next;
}

$node = new Node(1);
$node->next = new Node(2);
$node->next->next = new Node(0);
$node->next->next->next = new Node(2);
$node->next->next->next->next = new Node(0);

$rNode = sort012($node);
printNodes($rNode);