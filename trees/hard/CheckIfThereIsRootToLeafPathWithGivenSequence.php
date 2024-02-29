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

function existPathUtil($root,$arr,$n,$index){
    if($root == NULL || $index == $n){
        return false;
    }
    if($root->left == NULL && $root->right == NULL){
        if(($root->data == $arr[$index]) && ($index == $n - 1)){
            return true;
        }
        return false;
    }
    return (($index < $n) && ($root->data == $arr[$index]) && (existPathUtil($root->left, $arr, $n, $index+1) || existPathUtil($root->right, $arr, $n, $index+1) ));
}

function existPath($root,$arr,$n,$i){
    if(!$root){
        return ($n == 0);
    }
    return existPathUtil($root,$arr,$n,0);
}

$arr = [5, 8, 6, 7];
$n = sizeof($arr);
$root = new node(5);
$root->left = new node(3);
$root->right = new node(8);
$root->left->left = new node(2);
$root->left->right = new node(4);
$root->left->left->left = new node(1);
$root->right->left = new node(6);
$root->right->left->right = new node(7);

echo existPath($root, $arr, $n, 0) ? "Path Exists" : "Path does not Exist";