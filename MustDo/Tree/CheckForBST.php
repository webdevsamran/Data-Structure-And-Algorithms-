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

function inorder($node,&$ans){
    if(!$node){
        return NULL;
    }
    inorder($node->left,$ans);
    array_push($ans,$node->data);
    inorder($node->right,$ans);
}

function isBST($node){
    $ans = array();
    inorder($node,$ans);
    for($i = 0; $i < sizeof($ans) - 1; $i++){
        if($ans[$i] > $ans[$i+1]){
            return false;
        }
    }
    return true;
}

$node = new Node(4);
$node->left = new Node(2);
$node->right = new Node(5);
$node->left->left = new Node(1);
$node->right->right = new Node(6);

echo isBST($node);