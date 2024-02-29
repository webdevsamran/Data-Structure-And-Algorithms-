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

function printAncestors($root,$target){
    if(!$root){
        return false;
    }
    if($root->data == $target){
        return true;
    }
    if(printAncestors($root->left,$target) || printAncestors($root->right,$target)){
        echo $root->data ." ";
        return true;
    }
    return false;
}

$root = new Node(1);
$root->left        = new Node(2);
$root->right       = new Node(3);
$root->left->left  = new Node(4);
$root->left->right = new Node(5);
$root->left->left->left  = new Node(7);

printAncestors($root, 7);