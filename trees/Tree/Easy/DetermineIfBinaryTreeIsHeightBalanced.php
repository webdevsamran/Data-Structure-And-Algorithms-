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

function height($root){
    if(!$root){
        return 0;
    }
    return 1 + max(height($root->left),height($root->right));
}

function isBalanced($root){
    $lh = $rh = NULL;
    if(!$root){
        return 1;
    }
    $lh = height($root->left);
    $rh = height($root->right);
    if(abs($lh-$rh) <= 1 && isBalanced($root->left) && isBalanced($root->right)){
        return 1;
    }
    return 0;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->left->left->left = new Node(8);

if (isBalanced($root))
    echo "Tree is balanced";
else
    echo "Tree is not balanced";