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

function printPreOrder($node){
    if($node == NULL){
        return;
    }
    echo $node->data . " ";
    printPreOrder($node->left);
    printPreOrder($node->right);
}

function findIndex($str,$si,$ei){
    if ($si > $ei)
        return -1;
    $stack = new SplStack;
    for ($i = $si; $i <= $ei; $i++) {
        if ($str[$i] == '(')
            $stack->push($str[$i]);
        else if ($str[$i] == ')') {
            if ($stack->top() == '(') {
                $stack->pop();
                if ($stack->isEmpty())
                    return $i;
            }
        }
    }
    return -1;
}

function treeFromString($str,$si,$ei){
    if($si > $ei){
        return NULL;
    }
    $num = 0;
    while($si <= $ei && $str[$si] >= '0' && $str[$si] <= '9'){
        $num *= 10;
        $num += (int)($str[$si]);
        $si++;
    }
    $root = new Node($num);
    $index = -1;
    if($si <= $ei && $str[$si] == '('){
        $index = findIndex($str,$si,$ei);
    }
    if($index != -1){
        $root->left = treeFromString($str, $si + 1, $index - 1);
        $root->right = treeFromString($str, $index + 2, $ei - 1);
    }
    return $root;
}

$str = "4(2(3)(1))(6(5))";
$nstr = str_split($str);
$root = treeFromString($nstr, 0, strlen($str) - 1);
printPreOrder($root);