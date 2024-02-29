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

function treePathsSumUtil($root,$val){
    if($root == NULL){
        return 0;
    }
    $val = ($val * 10 + $root->data);
    if(!$root->left && !$root->right){
        return $val;
    }
    return treePathsSumUtil($root->left, $val) + treePathsSumUtil($root->right, $val);
}

function treePathsSum($root){
    return treePathsSumUtil($root,0);
}

$root = new Node(6);
$root->left = new Node(3);
$root->right = new Node(5);
$root->left->left = new Node(2);
$root->left->right = new Node(5);
$root->right->right = new Node(4);
$root->left->right->left = new Node(7);
$root->left->right->right = new Node(4);
echo "Sum of all paths is " . treePathsSum($root);