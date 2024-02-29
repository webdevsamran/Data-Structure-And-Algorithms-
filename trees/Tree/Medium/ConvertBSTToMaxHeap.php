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

function inorderTraversal($root,&$arr){
    if(!$root){
        return;
    }
    inorderTraversal($root->left,$arr);
    array_push($arr,$root->data);
    inorderTraversal($root->right,$arr);
}

function BSTToMaxHeap(&$root, $arr,&$i){
    if(!$root){
        return;
    }
    BSTToMaxHeap($root->left,$arr,$i);
    BSTToMaxHeap($root->right,$arr,$i);
    $root->data = $arr[++$i];
}

function convertToMaxHeapUtil(&$root){
    $arr = array();
    $i = -1;
    inorderTraversal($root, $arr);
    BSTToMaxHeap($root, $arr, $i);
}

function postorderTraversal($root){
    if(!$root){
        return;
    }
    postorderTraversal($root->left);
    postorderTraversal($root->right);
    echo $root->data . " ";
}

$root = new Node(4);
$root->left = new Node(2);
$root->right = new Node(6);
$root->left->left = new Node(1);
$root->left->right = new Node(3);
$root->right->left = new Node(5);
$root->right->right = new Node(7);

convertToMaxHeapUtil($root);
echo "Postorder Traversal of Tree: ";
postorderTraversal($root);