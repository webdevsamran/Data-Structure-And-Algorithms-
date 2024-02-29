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

function modifytree(&$root){
    $right = $root->right;
    $rightMost = $root;
    if($root->left){
        $rightMost = modifytree($root->left);
        $root->right = $root->left;
        $root->left = NULL;
    }
    if(!$right){
        return $rightMost;
    }
    $rightMost->right = $right;
    $rightMost = modifytree($right);
    return $rightMost;
}

function printpre($root){
    while($root != NULL){
        echo $root->data . " ";
        $root = $root->right;
    }
}

$root = new Node(10);
$root->left = new Node(8);
$root->right = new Node(2);
$root->left->left = new Node(3);
$root->left->right = new Node(5);

modifytree($root);
printpre($root);