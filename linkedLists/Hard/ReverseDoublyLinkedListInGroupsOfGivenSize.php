<?php

class Node{
    public $data;
    public $next;
    public $Prev;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = $this->prev = NULL;
    }
}

function printList($head)
{
    echo "The Given List is: <br/>";
    while ($head != NULL) {
        echo $head->data . " ";
        $head = $head->next;
    }
    echo "<br/>";
}

function push(&$head,$new_node){
    $new_node->prev = NULL;
    $new_node->next = $head;
    if ($head != NULL)
        $head->prev = $new_node;
    $head = $new_node;
}

function revListInGroupOfGivenSize($head,$k){
    $current = $head;
    $next = NULL;
    $newHead = NULL;
    $count = 0;
    while($current != NULL && $count < $k)
    {
        $next = $current->next;
        push($newHead, $current);
        $current = $next;
        $count++;
    }
    if($next != NULL)
    {
        $head->next = revListInGroupOfGivenSize($next, $k);
        $head->next->prev = $head;
    }
    $newHead->prev = NULL;
    return $newHead;
}

$head = NULL;
push($head, new Node(2));
push($head, new Node(4));
push($head, new Node(8));
push($head, new Node(10));
$k = 2;
echo "Original list: ";
printList($head);
$head = revListInGroupOfGivenSize($head, $k);
echo "<br/>Modified list: ";
printList($head);