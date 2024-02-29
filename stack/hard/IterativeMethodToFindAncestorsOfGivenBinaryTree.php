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

function printAncestors($root,$key){
    if($root == NULL){
        return;
    }
    $stack = new SplStack;
    while(true){
        while($root && $root->data != $key){
            $stack->push($root);
            $root = $root->left;
        }
        if($root && $root->data == $key){
            break;
        }
        if($stack->top()->right == NULL){
            $root = $stack->pop();
            while(!$stack->isEmpty() && $stack->top()->right == $root){
                $root = $stack->pop();
            }
        }
        $root = ($stack->isEmpty()) ? NULL : $stack->top()->right;
    }
    while (!$stack->isEmpty()) {
        echo $stack->top()->data . " ";
        $stack->pop();
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(7);
$root->left->left = new Node(3);
$root->left->right = new Node(5);
$root->right->left = new Node(8);
$root->right->right = new Node(9);
$root->left->left->left = new Node(4);
$root->left->right->right = new Node(6);
$root->right->right->left = new Node(10);

$key = 6;
printAncestors($root, $key);