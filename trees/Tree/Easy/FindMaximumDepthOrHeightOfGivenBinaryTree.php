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

function maxDepth($root){
    if(!$root){
        return NULL;
    }else{
        $lDepth = maxDepth($root->left);
        $rDepth = maxDepth($root->right);
        if($lDepth > $rDepth){
            return 1 + $lDepth;
        }else{
            return 1 + $rDepth;
        }
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "Height of tree is " . maxDepth($root);