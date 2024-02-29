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

function serializeTree($root,&$ans){
    if(!$root){
        return;
    }
    array_push($ans, $root->data);
    serializeTree($root->left,$ans);
    serializeTree($root->right,$ans);
}

function deSerialize(&$root,&$ans){
    if(empty($ans)){
        return;
    }
    $root = new Node(array_shift($ans));
    deSerialize($root->left,$ans);
    deSerialize($root->right,$ans);
}

function inorder($root){
    if($root){
        inorder($root->left);
        echo $root->data . " ";
        inorder($root->right);
    }
}

$root = new Node(20);
$root->left = new Node(8);
$root->right = new Node(22);
$root->left->left = new Node(4);
$root->left->right = new Node(12);
$root->left->right->left = new Node(10);
$root->left->right->right = new Node(14);

$ans = array();
serializeTree($root, $ans);
$root1 = NULL;
deSerialize($root1, $ans);
printf("Inorder Traversal of the tree constructed from file:<br/>");
inorder($root1);