<?php

class Node{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = NULL;
    }
}

class Info{
    public $sz;
    public $max;
    public $min;
    public $ans;
    public $isBST;

    function __construct($sz = NULL, $max = NULL, $min = NULL, $ans = NULL, $isBST = NULL)
    {
        $this->sz = $this->max = $this->min = $this->ans = $this->isBST = NULL;
    }
}

function largestBSTBT($root){
    if(!$root){
        return new Info( 0, PHP_INT_MIN, PHP_INT_MAX, 0, true);
    }
    if(!$root->left && !$root->right){
        return new Info( 1, $root->data, $root->data, 1, true);
    }
    $l = largestBSTBT($root->left);
    $r = largestBSTBT($root->right);
    $ret = new Info;
    $ret->sz = (1 + $l->sz + $r->sz);
    if ($l->isBST && $r->isBST && $l->max < $root->data && $r->min > $root->data) {
        $ret->min = min($l->min, $root->data);
        $ret->max = max($r->max, $root->data);
        $ret->ans = $l->ans + $r->ans + 1;
        $ret->isBST = true;
        return $ret;
    }
    $ret->ans = max($l->ans, $r->ans);
    $ret->isBST = false;
    return $ret;
}

$root = new Node(60);
$root->left = new Node(65);
$root->right = new Node(70);
$root->left->left = new Node(50);
printf("Size of the largest BST is %d\n", largestBSTBT($root)->ans);