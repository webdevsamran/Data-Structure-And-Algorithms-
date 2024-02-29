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

function heightOfTree($root){
    if(!$root){
        return 0;
    }
    $ldepth = heightOfTree($root->left);
    $rdepth = heightOfTree($root->right);

    if($ldepth > $rdepth){
        return $ldepth + 1;
    }else{
        return $rdepth + 1;
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(2);
$root->left->left = new Node(3);
$root->left->right = new Node(4);
$root->right->left = new Node(4);
$root->right->right = new Node(3);

echo heightOfTree($root);