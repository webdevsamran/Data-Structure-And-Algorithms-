<?php

class Node{
    public $data;
    public $next;
    public $bottom;

    function __construct($data = NULL)
    {
        $this->data = $data;
        $this->next = $this->bottom = NULL;
    }
}

function printNodes($node){
    while($node != NULL){
        echo $node->data . " ";
        $node = $node->next;
    }
}

function flatten($head){
    $temp = $head;
    $arr = array();
    while($temp){
        array_push($arr,$temp->data);
        $bottom = $temp->bottom;
        while($bottom){
            array_push($arr,$bottom->data);
            $bottom = $bottom->bottom;
        }
        $temp = $temp->next;
    }
    $n_ans = new Node(array_shift($arr));
    $head = $n_ans;
    while(!empty($arr)){
        $n_ans->next = new Node(array_shift($arr));
        $n_ans = $n_ans->next;
    }
    return $head;
}

$node = new Node(1);
$node->bottom = new Node(10);
$node->bottom->bottom = new Node(100);
$node->next = new Node(2);
$node->next->bottom = new Node(20);
$node->next->next = new Node(3);
$node->next->next->bottom = new Node(30);
$node->next->next->next = new Node(4);
$node->next->next->next->next = new Node(5);

$f_node = flatten($node);
printNodes($f_node);