<?php

class Node{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
    }
}

function printList($node){
    while($node){
        echo $node->data." ";
        $node = $node->right;
    }
}

function bintree2listUtil(&$root){
    if($root == NULL){
        return $root;
    }
    if($root->left != NULL){
        $left = bintree2listUtil($root->left);
        for(;$left->right != NULL; $left = $left->right)
            ;
        $left->right = $root;
        $root->left = $left;
    }
    if($root->right != NULL){
        $right = bintree2listUtil($root->right);
        for(;$right->left != NULL; $right = $right->left)
            ;
        $right->left = $root;
        $root->right = $right;
    }
    return $root;
}

function bintree2list($root){
    if($root == NULL){
        return $root;
    }
    $root = bintree2listUtil($root);
    while($root->left){
        $root = $root->left;
    }
    return $root;
}

$root = new Node(10);
$root->left = new Node(12);
$root->right = new Node(15);
$root->left->left = new Node(25);
$root->left->right = new Node(30);
$root->right->left = new Node(36);

// Convert to DLL
$head = bintree2list($root);

// Print the converted list
printList($head);