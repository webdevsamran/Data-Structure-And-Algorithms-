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

function printInorder($root){
    if(!$root){
        return;
    }
    printInorder($root->left);
    echo $root->data . " ";
    printInorder($root->right);
}

function storeInVector($root, &$vec){
    if(!$root){
        return NULL;
    }
    storeInVector($root->left,$vec);
    array_push($vec,$root->data);
    storeInVector($root->right,$vec);
}

function correctBSTUtil(&$root,&$vec,&$index){
    if(!$root){
        return NULL;
    }
    correctBSTUtil($root->left,$vec,$index);
    $root->data = $vec[$index];
    $index++;
    correctBSTUtil($root->right,$vec,$index);
}

function correctBST($root){
    $vec = array();
    storeInVector($root, $vec);
    sort($vec);
    $index = 0;
    correctBSTUtil($root, $vec, $index);
}

$root = new Node(6);
$root->left = new Node(10);
$root->right = new Node(2);
$root->left->left = new Node(1);
$root->left->right = new Node(3);
$root->right->right = new Node(12);
$root->right->left = new Node(7);
echo "Inorder Traversal of the original tree <br/>";
printInorder($root);
correctBST($root);
echo "<br/>Inorder Traversal of the fixed tree <br/>";
printInorder($root);