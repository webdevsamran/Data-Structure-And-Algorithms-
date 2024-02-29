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

function maxSumHelper($root){
    if(!$root){
        $sum = [0,0];
        return $sum;
    }
    $sum1 = maxSumHelper($root->left);
    $sum2 = maxSumHelper($root->right);

    $sum = array();
    $sum[0] = $sum1[1] + $sum2[1] + $root->data;
    $sum[1] = max($sum1[0],$sum1[1]) + max($sum2[0],$sum2[1]);
    return $sum;
}

function maxSum($root){
    $res = maxSumHelper($root);
    return max($res[0],$res[1]);
}

$root = new Node(10);
$root->left = new Node(1);
$root->left->left = new Node(2);
$root->left->left->left = new Node(1);
$root->left->right = new Node(3);
$root->left->right->left = new Node(4);
$root->left->right->right = new Node(5);
echo maxSum($root);