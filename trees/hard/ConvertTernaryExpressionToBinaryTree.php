<?php

class Node{
    public $data;
    public $left;
    public $right;

    function __construct($data = NULL)
    {
        $this->data = $data;
        $this->left = $this->right = NULL;
    }
}

function convertExpression($expression,&$i){
    $root = new Node($expression[$i]);
    if($i == sizeof($expression) - 1){
        return $root;
    }
    $i++;
    if($expression[$i] == '?'){
        $i++;
        $root->left = convertExpression($expression,$i);
        $i++;
        $root->right = convertExpression($expression,$i);
        return $root;
    }else{
        return $root;
    }
}

function printTree($root)
{
    if (!$root)
        return ;
    echo $root->data . " ";
    printTree($root->left);
    printTree($root->right);
}

$expression = str_split("a?b?c:d:e");
$i=0;
$root = convertExpression($expression, $i);
printTree($root) ;