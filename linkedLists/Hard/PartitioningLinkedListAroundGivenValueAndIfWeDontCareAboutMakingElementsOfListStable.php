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

function partition($head,$x){
    $tail = $head;
    $curr = $head;
    while($curr != NULL){
        $next = $curr->next;
        if($curr->data < $x){
            $curr->next = $head;
            $head = $curr;
        }else{
            $tail->next = $curr;
            $tail = $curr;
        }
        $curr = $next;
    }
    $tail->next = NULL;
    return $head;
}

function printList($head)
{
    $temp = $head;
    while ($temp != NULL)
    {
        printf("%d  ", $temp->data);
        $temp = $temp->next;
    }
}

$head = new Node(3);
$head->next = new Node(5);
$head->next->next = new Node(8);
$head->next->next->next = new Node(2);
$head->next->next->next->next = new Node(10);
$head->next->next->next->next->next = new Node(2);
$head->next->next->next->next->next->next = new Node(1);

$x = 5;
$head = partition($head, $x);
printList($head);