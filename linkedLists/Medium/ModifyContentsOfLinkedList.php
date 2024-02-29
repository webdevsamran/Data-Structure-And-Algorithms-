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

function frontAndBackSplit($root,&$front,&$back){
    $slow = $root;
    $fast = $root->next;
    while($fast != NULL){
        $fast = $fast->next;
        if($fast != NULL){
            $slow = $slow->next;
            $fast = $fast->next;
        }
    }
    $front = $root;
    $back = $slow->next;
    $slow->next = NULL;
}

function reverseList(&$root){
    $current = $root;
    $next = NULL;
    $prev = NULL;

    while($current != NULL){
        $next = $current->next;
        $current->next = $prev;
        $prev = $current;
        $current = $next;
    }

    $root = $prev;
}

function modifyTheContentsOf1stHalf($front,$back){
    while($back != NULL){
        $front->data = $front->data - $back->data;
        $front = $front->next;
        $back = $back->next;
    }
}

function concatFrontAndBackList($front,$back){
    $head = $front;
    while($front->next != NULL){
        $front = $front->next;
    }
    $front->next = $back;
    return $head;
}

function modifyTheList($root){
    if(!$root || !$root->next){
        return $root;
    }
    
    $front = NULL;
    $back = NULL;

    frontAndBackSplit($root,$front,$back);
    reverseList($back);
    modifyTheContentsOf1stHalf($front,$back);
    reverseList($back);
    $head = concatFrontAndBackList($front, $back);
    return $head;
}

$head = NULL;
 
push($head, 10);
push($head, 7);
push($head, 12);
push($head, 8);
push($head, 9);
push($head, 2);

printList($head);

$head = modifyTheList($head);
    
echo "Modified List:<br/>";
printList($head);