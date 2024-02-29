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

function isMirror($root1, $root2){
    if(!$root1 && !$root2){
        return true;
    }
    if($root1 && $root2 && $root1->data == $root2->data){
        return isMirror($root1->left, $root2->right) && isMirror($root1->right, $root2->left);
    }
    return false;
}

function isSymmetric($root){
    return isMirror($root, $root);
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(2);
$root->left->left = new Node(3);
$root->left->right = new Node(4);
$root->right->left = new Node(4);
$root->right->right = new Node(3);

if (isSymmetric($root))
    printf("Symmetric");
else
    printf("Not symmetric");