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

function LCA($root,$a,$b){
    if($root == NULL){
        return $root;
    }
    if($root->data == $a || $root->data == $b){
        return $root;
    }
    $left = LCA($root->left,$a,$b);
    $right = LCA($root->right,$a,$b);
    if($left != NULL && $right != NULL){
        return $root;
    }
    if($left == NULL && $right == NULL){
        return NULL;
    }
    if($left != NULL){
        return LCA($root->left,$a,$b);
    }
    return LCA($root->right,$a,$b);
}

function findLevel($root,$k,$level){
    if($root == NULL){
        return -1;
    }
    if($root->data == $k){
        return $level;
    }
    $left = findLevel($root->left,$k,$level+1);
    if($left == -1){
        return findLevel($root->right,$k,$level+1);
    }
    return $left;
}

function findDistance($root,$a,$b){
    $lca = LCA($root,$a,$b);
    $d1 = findLevel($lca,$a,0);
    $d2 = findLevel($lca,$b,0);
    return $d1 + $d2;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);
$root->right->left->right = new Node(8);
echo "Dist(4, 5) = " . findDistance($root, 4, 5);
echo "<br/>Dist(4, 6) = " . findDistance($root, 4, 6);
echo "<br/>Dist(3, 4) = " . findDistance($root, 3, 4);
echo "<br/>Dist(2, 4) = " . findDistance($root, 2, 4);
echo "<br/>Dist(8, 5) = " . findDistance($root, 8, 5);