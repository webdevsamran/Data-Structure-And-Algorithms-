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
    echo "Printing Linked List: <br/>";
    while($node){
        echo $node->data . " ";
        $node = $node->next;
    }
    echo "<br/>";
}

function deleteNode(&$node,$x){
    $temp = $node;
    $prev = NULL;
    while($temp){
        if($temp->data == $x){
            break;
        }
        $prev = $temp;
        $temp = $temp->next;
    }
    $prev->next = $temp->next;
    $temp = NULL;
    return;
}

$node = new Node(1);
$node->next = new Node(2);
$node->next->next = new Node(3);
$node->next->next->next = new Node(4);
$node->next->next->next->next = new Node(5);

printNodes($node);
deleteNode($node,3);
printNodes($node);