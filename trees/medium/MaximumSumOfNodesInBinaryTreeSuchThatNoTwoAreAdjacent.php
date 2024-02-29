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

function maxSum($root,&$map){
    if($root == NULL){
        return 0;
    }
    if(array_key_exists(serialize($root),$map)){
        return $map[serialize($root)];
    }
    $inc = $root->data;
    if($root->left){
        $inc += maxSum($root->left->left,$map) + maxSum($root->left->right,$map);
    }
    if($root->right){
        $inc += maxSum($root->right->left,$map) + maxSum($root->right->right,$map);
    }
    $ex = maxSum($root->left,$map) + maxSum($root->right,$map);
    $map[serialize($root)] = max($inc,$ex);
    return max($inc,$ex);
}

$root = new Node(10);
$root->left = new Node(1);
$root->left->left = new Node(2);
$root->left->left->left = new Node(1);
$root->left->right = new Node(3);
$root->left->right->left = new Node(4);
$root->left->right->right = new Node(5);
$map = array();
echo maxSum($root,$map);