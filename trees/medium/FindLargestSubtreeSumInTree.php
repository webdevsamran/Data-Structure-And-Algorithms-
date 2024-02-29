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

function findLargestSubtreeSumUtil($root,&$ans){
    if($root == NULL){
        return 0;
    }
    $curr_sum = $root->data + findLargestSubtreeSumUtil($root->left,$ans) + findLargestSubtreeSumUtil($root->right,$ans);
    $ans = max($ans,$curr_sum);
    return $curr_sum;
}

function findLargestSubtreeSum($root){
    if($root == NULL){
        return 0;
    }
    $ans = PHP_INT_MIN;
    findLargestSubtreeSumUtil($root,$ans);
    return $ans;
}

$root = new Node(1);
$root->left = new Node(-2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(-6);
$root->right->right = new Node(2);

echo findLargestSubtreeSum($root);