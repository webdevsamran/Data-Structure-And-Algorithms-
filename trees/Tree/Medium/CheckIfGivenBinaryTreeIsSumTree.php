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

function isLeaf($node){
    if(!$node){
        return 0;
    }
    if($node->left == NULL && $node->right == NULL){
        return 1;
    }
    return 0;
}

function isSumTree($node){
    $ls = $rs = NULL;
    if(!$node || isLeaf($node)){
        return 1;
    }
    if(isSumTree($node->left) || isSumTree($node->right)){
        if(!$node->left){
            $ls = 0;
        }else if(isLeaf($node->left)){
            $ls = $node->left->data;
        }else{
            $ls = 2 * ($node->left->data);
        }
        if(!$node->right){
            $rs = 0;
        }else if(isLeaf($node->right)){
            $rs = $node->right->data;
        }else{
            $rs = 2 * ($node->right->data);
        }
        return ($node->data == $ls + $rs);
    }
    return 0;
}

$root = new Node(26);
$root->left = new Node(10);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(6);
$root->right->right = new Node(3);
if(isSumTree($root))
    echo "The given tree is a SumTree";
else
    echo "The given tree is not a SumTree";