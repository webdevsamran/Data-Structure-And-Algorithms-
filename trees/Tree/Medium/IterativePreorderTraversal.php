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

function preorderIterative($root){
    if(!$root){
        return;
    }
    $stack = new SplStack;
    $curr = $root;
    while($curr || !$stack->isEmpty()){
        while($curr){
            echo $curr->data . " ";
            if($curr->right){
                $stack->push($curr->right);
            }
            $curr = $curr->left;
        }
        if(!$stack->isEmpty()){
            $curr = $stack->pop();
        }
    }
}

$root = new Node(10);
$root->left = new Node(20);
$root->right = new Node(30);
$root->left->left = new Node(40);
$root->left->left->left = new Node(70);
$root->left->right = new Node(50);
$root->right->left = new Node(60);
$root->left->left->right = new Node(80);
preorderIterative($root);