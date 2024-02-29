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

function sortedMerge($head1,$head2){
    $dummy = new Node;
    $root = $dummy;
    while($head1 && $head2){
        if($head1->data < $head2->data){
            $root->next = $head1;
            // $root = $head1;
            $head1 = $head1->next;
        }else{
            $root->next = $head2;
            // $root = $head2;
            $head2 = $head2->next;
        }
        $root = $root->next;
    }
    $root->next = ($head1 == NULL) ? $head2: $head1;
    return $dummy->next;
}

$node1 = new Node(1);
$node1->next = new Node(3);
$node1->next->next = new Node(5);
$node1->next->next->next = new Node(7);
$node1->next->next->next->next = new Node(9);

$node2 = new Node(2);
$node2->next = new Node(4);
$node2->next->next = new Node(6);
$node2->next->next->next = new Node(8);
$node2->next->next->next->next = new Node(10);

$rNode = sortedMerge($node1,$node2);
printNodes($rNode);