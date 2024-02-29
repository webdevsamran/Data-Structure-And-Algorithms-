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

function postOrderIterative($root){
    if($root == NULL){
        return;
    }
    
    $s1 = new SplStack;
    $s2 = new SplStack;

    $s1->push($root);

    while(!$s1->isEmpty()){
        $node = $s1->pop();
        $s2->push($node);
        if($node->left){
            $s1->push($node->left);
        }
        if($node->right){
            $s1->push($node->right);
        }
    }

    while(!$s2->isEmpty()){
        $node = $s2->pop();
        echo $node->data . " ";
    }
}

$root = NULL;
$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);

postOrderIterative($root);