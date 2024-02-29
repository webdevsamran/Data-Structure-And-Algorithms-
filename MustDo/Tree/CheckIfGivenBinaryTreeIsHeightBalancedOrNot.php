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

function isBalancedfast($root){
    if(!$root){
        return [true,0];
    }
    $left = isBalancedfast($root->left);
    $right = isBalancedfast($root->right);
    $leftAns = $left[0];
    $rightAns = $right[0];
    $diff = abs($left[1] - $right[1]) <= 1;
    $ans = array();
    $ans[1] = max($left[1], $right[1]) + 1;
    if($leftAns && $rightAns && $diff){
        $ans[0] = true;
    }else{
        $ans[0] = false;
    }
    return $ans;
}

function isBalanced($root){
    return isBalancedfast($root)[0];
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->left->left->left = new Node(8);

if (isBalanced($root)) {
    echo "The given binary tree is balanced.";
}
else {
    echo "The given binary tree is not balanced.";
}