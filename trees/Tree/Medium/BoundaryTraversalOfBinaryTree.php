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

function printLeftBoundary($root){
    while($root){
        if($root->left || $root->right){
            echo $root->data . " ";
        }
        if($root->left){
            $root = $root->left;
        }else{
            $root = $root->right;
        }
    }
}

function printLeaves($root){
    if(!$root){
        return;
    }
    printLeaves($root->left);
    if(!$root->left && !$root->right){
        echo $root->data ." ";
    }
    printLeaves($root->right);
}

function printRightBoundary($root){
    while($root){
        if($root->left || $root->right){
            echo $root->data . " ";
        }
        if($root->right){
            $root = $root->right;
        }else{
            $root = $root->left;
        }
    }
}

function printBoundary($root){
    if(!$root){
        return;
    }
    echo $root->data . " ";
    printLeftBoundary($root->left);
    printLeaves($root->left);
    printLeaves($root->right);
    printRightBoundary($root->right);
}

$root = new Node(20);
$root->left = new Node(8);
$root->left->left = new Node(4);
$root->left->right = new Node(12);
$root->left->right->left = new Node(10);
$root->left->right->right = new Node(14);
$root->right = new Node(22);
$root->right->right = new Node(25);
printBoundary($root);