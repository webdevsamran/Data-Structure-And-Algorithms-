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
    while($node != NULL){
        echo $node->data . " ";
        $node = $node->next;
    }
}

function findIntersection($head1, $head2){
    $map = array();
    $h1 = $head1;
    $h2 = $head2;
    while($h1){
        $map[$h1->data]++;
        $h1 = $h1->next;
    }
    while($h2){
        $map[$h2->data]++;
        $h2 = $h2->next;
    }
    $h1 = $head1;
    $res = new Node;
    $temp = $res;
    while($h1){
        if($map[$h1->data] == 2){
            $temp->next = new Node($h1->data);
            $temp = $temp->next;
        }
        $h1 = $h1->next;
    }
    return $res;
}

$node1 = new Node(9);
$node1->next = new Node(6);
$node1->next->next = new Node(4);
$node1->next->next->next = new Node(2);
$node1->next->next->next->next = new Node(3);
$node1->next->next->next->next->next = new Node(8);

$node2 = new Node(1);
$node2->next = new Node(2);
$node2->next->next = new Node(8);
$node2->next->next->next = new Node(6);

$rNode = findIntersection($node1,$node2);
printNodes($rNode);