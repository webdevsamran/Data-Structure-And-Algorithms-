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

function inOrder($root){
    $stack = new SplStack;
    $curr = $root;
    while($curr || !$stack->isEmpty()){
        while($curr){
            $stack->push($curr);
            $curr = $curr->left;
        }
        $curr = $stack->pop();
        echo $curr->data ." ";
        $curr = $curr->right;
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

inOrder($root);