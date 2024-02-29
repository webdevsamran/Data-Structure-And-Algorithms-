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
    while($node != NULL){
        echo $node->data . " ";
        $node = $node->next;
    }
}

function addTwoLists($n,$m,$aN,$aM){
    $num1 = $num2 = NULL;
    for($i = 0; $i < $n; $i++){
        $num1 = $num1 * 10 + (int)($aN[$i]);
    }
    for($i = 0; $i < $m; $i++){
        $num2 = $num2 * 10 + (int)($aM[$i]);
    }
    $res = $num1 + $num2;
    $node = new Node();
    $temp = $node;
    $res = str_split($res);
    $n = sizeof($res);
    $i = 0;
    while($i < $n){
        $temp->next = new Node($res[$i++]);
        $temp = $temp->next;
    }
    return $node->next;
}

$N = 2;
$valueN = [4, 5];
$M = 3;
$valueM = [3, 4, 5];

$rNodes = addTwoLists($N,$M,$valueN,$valueM);
printNodes($rNodes);