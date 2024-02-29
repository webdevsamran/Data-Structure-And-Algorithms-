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

function getIntesectionNode($head1,$head2){
    while($head2){
        $temp = $head1;
        while($temp){
            if($temp == $head2){
                return $head2;
            }
            $temp = $temp->next;
        }
        $head2 = $head2->next;
    }
    return NULL;
}

$head2 = new Node(3);
$head2->next = new Node(6);
$head2->next->next = new Node(9);
$newnode = new Node(15);
$head2->next->next->next = $newnode;

$head1 = new Node(10);
$head1->next = $newnode;
$head1->next->next = new Node(30);

$head1->next->next->next = NULL;

$intersectionPoint = getIntesectionNode($head1, $head2);

if (!$intersectionPoint)
    echo " No Intersection Point \n";
else
    echo "Intersection Point: " . $intersectionPoint->data . "<br/>";