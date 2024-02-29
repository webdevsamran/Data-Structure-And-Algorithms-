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

function intersectionList($list1,$list2){
    $result = NULL;
    while($list1 && $list2){
        if($list1->data == $list2->data){
            push($result,$list1->data);
            $list1 = $list1->next;
            $list2 = $list2->next;
        }else if($list1->data < $list2->data){
            $list1 = $list1->next;
        }else{
            $list2 = $list2->next;
        }
    }
    return $result;
}

function printList($root){
    $node = $root;
    while($node != NULL){
        echo $node->data." ";
        $node = $node->next;
    }
    echo "<br/>";
}

$list1 = NULL;
push($list1, 9);
push($list1, 7);
push($list1, 5);
push($list1, 3);
push($list1, 1);
printList($list1);

$list2 = NULL;
push($list2, 9);
push($list2, 8);
push($list2, 5);
push($list2, 3);
push($list2, 2);
printList($list2);

$result = intersectionList($list1,$list2);
printList($result);