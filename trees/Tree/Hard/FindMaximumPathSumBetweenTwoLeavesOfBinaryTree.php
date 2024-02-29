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

function maxPathSumUtil(&$root,&$res){
    if(!$root){
        return 0;
    }
    if(!$root->left && !$root->right){
        return $root->data;
    }
    $ls = maxPathSumUtil($root->left,$res);
    $rs = maxPathSumUtil($root->right,$res);
    if($root->left && $root->right){
        $res = max($res,$ls + $rs + $root->data);
        return max($ls,$rs) + $root->data;
    }
    return (!$root->left) ? $rs + $root->data: $ls + $root->data;
}

function maxPathSum($root){
    $res = PHP_INT_MIN;
    $val = maxPathSumUtil($root,$res);
    if($root->left && $root->right)
        return $res;
    return max($res, $val);
}

$root = new Node(-15);
$root->left = new Node(5);
$root->right = new Node(6);
$root->left->left = new Node(-8);
$root->left->right = new Node(1);
$root->left->left->left = new Node(2);
$root->left->left->right = new Node(6);
$root->right->left = new Node(3);
$root->right->right = new Node(9);
$root->right->right->right= new Node(0);
$root->right->right->right->left= new Node(4);
$root->right->right->right->right= new Node(-1);
$root->right->right->right->right->left= new Node(10);
echo "Max pathSum of the given binary tree is " . maxPathSum($root);