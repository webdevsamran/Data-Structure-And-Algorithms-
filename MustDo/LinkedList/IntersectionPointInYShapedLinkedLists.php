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

function intersectPoint($head1, $head2){
    $map = array();
    while($head1){
        $map[$head1->data]++;
        $head1 = $head1->next;
    }
    while($head2){
        if(array_key_exists($head2->data,$map)){
            return $head2->data . " ";
        }
        $map[$head2->data]++;
        $head2 = $head2->next;
    }
    return -1;
}

$node1 = new Node(1);
$node1->next = new Node(2);
$node1->next->next = new Node(3);
$node1->next->next->next = new Node(4);
$node1->next->next->next->next = new Node(5);

$node2 = new Node(4);
$node2->next = new Node(5);
$node2->next->next = new Node(6);
$node2->next->next->next = new Node(7);
$node2->next->next->next->next = new Node(8);

echo intersectPoint($node1,$node2);