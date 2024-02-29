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

function insert($root,$key){
    if(!$root){
        return new Node($key);
    }
    if($root->data > $key){
        $root->left = insert($root->left,$key);
    }else{
        $root->right = insert($root->right,$key);
    }
    return $root;
}

function removeOutsideRange($root,$min,$max){
    if(!$root){
        return NULL;
    }
    $root->left = removeOutsideRange($root->left,$min,$max);
    $root->right = removeOutsideRange($root->right,$min,$max);
    if($root->data < $min){
        $rChild = $root->right;
        $root = NULL;
        return $rChild;
    }
    if($root->data > $max){
        $lChild = $root->left;
        $root = NULL;
        return $lChild;
    }
    return $root;
}

function inorderTraversal($root)
{
    if ($root)
    {
        inorderTraversal($root->left);
        echo $root->data . " ";
        inorderTraversal($root->right);
    }
}

$root = NULL;
$root = insert($root, 6);
$root = insert($root, -13);
$root = insert($root, 14);
$root = insert($root, -8);
$root = insert($root, 15);
$root = insert($root, 13);
$root = insert($root, 7);

echo "Inorder traversal of the given tree is: ";
inorderTraversal($root);

$root = removeOutsideRange($root, -10, 13);

echo "<br/>Inorder traversal of the modified tree is: ";
inorderTraversal($root);