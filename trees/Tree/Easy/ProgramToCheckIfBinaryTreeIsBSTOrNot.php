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

function isBSTUtil($root,$min,$max){
    if(!$root){
        return 1;
    }
    if($root->data < $min || $root->data > $max){
        return 0;
    }
    return isBSTUtil($root->left,$min,$root->data-1) && isBSTUtil($root->right,$root->data+1,$max);
}

function isBST($root){
    return isBSTUtil($root,PHP_INT_MIN,PHP_INT_MAX);
}

$root = new node(4);
$root->left = new node(2);
$root->right = new node(5);
$root->left->left = new node(1);
$root->left->right = new node(3);

if (isBST($root))
    echo "Is BST";
else
    echo "Not a BST";