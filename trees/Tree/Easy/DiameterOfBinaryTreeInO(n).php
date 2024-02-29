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

function height($root,&$ans){
    if(!$root){
        return 0;
    }
    $left_height = height($root->left,$ans);
    $right_height = height($root->right,$ans);
    $ans = max($ans,1+$left_height+$right_height);
    return 1 + max($left_height,$right_height);
}

function diameter($root){
    if(!$root){
        return 0;
    }
    $ans = PHP_INT_MIN;
    height($root,$ans);
    return $ans;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

printf("Diameter is %d\n", diameter($root));