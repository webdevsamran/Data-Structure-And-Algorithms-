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

function detectLoop($root){
    $node = $root;
    $hash = array();
    while($node != NULL){
        if(in_array($node,$hash)){
            return true;
        }
        array_push($hash,$node);
        $node = $node->next;
    }
    return false;
}

$head = NULL;
 
push($head, 20);
push($head, 4);
push($head, 15);
push($head, 10);

$head->next->next->next->next = $head;

if (detectLoop($head))
    echo "Loop Found";
else
    echo "No Loop";