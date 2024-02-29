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

function getLeafCount($root){
    if(!$root){
        return 0;
    }
    if(!$root->left && !$root->right){
        return 1;
    }else{
        return getLeafCount($root->left) + getLeafCount($root->right);
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
echo "Leaf count of the tree is : " . getLeafCount($root);