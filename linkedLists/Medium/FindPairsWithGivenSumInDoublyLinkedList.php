<?php

class Node{
    public $data;
    public $next;
    public $prev;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = $this->prev = NULL;
    }
}

function insert(&$root,$data){
    $node = new Node($data);
    if(!$root){
        $root = $node;
    }else{
        $node->next = $root;
        $root->prev = $node;
        $root = $node;
    }
}

function printList($root){
    while($root != NULL){
        echo $root->data." ";
        $root = $root->next;
    }
    echo "<br/>";
}

function pairSum($root,$sum){
    $first = $root;
    $second = $root;
    while($second->next != NULL){
        $second = $second->next;
    }
    $found = false;
    while($first != $second && $second->next != $first){
        if($first->data + $second->data == $sum){
            $found = true;
            echo "(".$first->data.",".$second->data.")<br/>";
            $first = $first->next;
            $second = $second->prev;
        }else{
            if($first->data + $second->data < $sum){
                $first = $first->next;
            }else{
                $second = $second->prev;
            }
        }
    }
    if($found == false){
        echo "No Match Found.<br/>";
        return;
    }
    return;
}

$head = NULL;
insert($head, 9);
insert($head, 8);
insert($head, 6);
insert($head, 5);
insert($head, 4);
insert($head, 2);
insert($head, 1);
printList($head);

$sum = 7;
pairSum($head,$sum);