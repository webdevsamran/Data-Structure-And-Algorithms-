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

function mirror(&$root){
    if(!$root){
        return;
    }else{
        $temp = NULL;
        mirror($root->left);
        mirror($root->right);

        $temp = $root->left;
        $root->left = $root->right;
        $root->right = $temp;
    }
}

function inOrder($node)
{
    if ($node == NULL)
        return;
 
    inOrder($node->left);
    echo $node->data . " ";
    inOrder($node->right);
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "Inorder traversal of the constructed tree is: ";
inOrder($root);
mirror($root);
echo "<br/>Inorder traversal of the mirror tree  is: ";
inOrder($root);