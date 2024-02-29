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

function inorder($root,&$map){
    if($root == NULL){
        return "";
    }
    $str = "[";
    $str .= inorder($root->left,$map);
    $str .= ($root->data);
    $str .= inorder($root->right,$map);
    $str .= "]";
    if($map[$str] == 1){
        echo $root->data . " ";
    }
    $map[$str]++;
    return $str;
}

function printAllDups($root){
    $map = array();
    inorder($root,$map);
}

$root = NULL;
$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->right->left = new Node(2);
$root->right->left->left = new Node(4);
$root->right->right = new Node(4);
printAllDups($root);