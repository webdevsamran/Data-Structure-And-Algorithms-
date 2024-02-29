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

function countNodes($root){
    $nodes = $root;
    $res = 1;
    while($nodes->next != $root){
        $res++;
        $nodes = $nodes->next;
    }
    return $res;
}

function countNodesinLoop($root){
    $slow_p = $root;
    $fast_p = $root;
    while($slow_p && $fast_p && $fast_p->next){
        $slow_p = $slow_p->next;
        $fast_p = $fast_p->next->next;
        if($slow_p == $fast_p){
            return countNodes($slow_p);
        }
    }
    return 0;
}

$head = NULL;
 
push($head, 20);
push($head, 4);
push($head, 15);
push($head, 10);

$head->next->next->next->next = $head;

echo countNodesinLoop($head);