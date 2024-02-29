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
    $root = $node;
}

function printList($root){
    while($root != NULL){
        echo $root->data." ";
        $root = $root->next;
    }
    echo "<br/>";
}

function deleteNode($node){
    $prev = NULL;
    if($node == NULL){
        return;
    }else{
        while($node->next != NULL){
            $node->data = $node->next->data;
            $prev = $node;
            $node = $node->next;
        }
        $prev->next = NULL;
    }
}

$head = NULL;
 
push($head, 1);
push($head, 4);
push($head, 1);
push($head, 12);
push($head, 1);

echo "Before deleting <br/>";
printList($head);

deleteNode($head);

echo "After deleting <br/>";
printList($head);