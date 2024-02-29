<?php

class Node{
    public $idx;
    public $left;
    public $right;

    function __construct($idx)
    {
        $this->idx = $idx;
        $this->left = NULL;
        $this->right = NULL;
    }
}

function findSecondMin($arr,$size){
    
}

$arr = [61, 6, 100, 9, 10, 12, 17];
$n = sizeof($arr);
findSecondMin($arr, $n);