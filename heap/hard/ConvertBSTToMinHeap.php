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
    if($root == NULL){
        return;
    }
    inorderTraversal($root->left,$arr);
    array_push($arr,$root->data);
    inorderTraversal($root->right,$arr);
}

function BSTToMinHeap(&$root,$arr,&$idx){
    if($root == NULL){
        return;
    }
    $root->data = $arr[++$idx];
    BSTToMinHeap($root->left,$arr,$idx);
    BSTToMinHeap($root->right,$arr,$idx);
}

function convertToMinHeapUtil(&$root){
    $arr = array();
    $i = -1;
    inorderTraversal($root, $arr);
    BSTToMinHeap($root, $arr, $i);
}

function preorderTraversal($root)
{
    if (!$root)
        return;
    echo $root->data . " ";
    preorderTraversal($root->left);
    preorderTraversal($root->right);
}

$root = new Node(4);
$root->left = new Node(2);
$root->right = new Node(6);
$root->left->left = new Node(1);
$root->left->right = new Node(3);
$root->right->left = new Node(5);
$root->right->right = new Node(7);

convertToMinHeapUtil($root);
echo "Preorder Traversal: <br/>";
preorderTraversal($root);