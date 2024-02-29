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

function printTopToBottomPath($current,$parent){
    $stack = new SplStack;
    while($current){
        $stack->push($current);
        $current = $parent[$current];
    }
    while(!$stack->isEmpty()){
        $curr = $stack->pop();
        echo $curr->data." ";
    }
    echo "<br/>";
}

function printRootToLeaf($root){
    if($root == NULL){
        return;
    }
    $stack = new SplStack;
    $stack->push($root);
    $parent = array();
    $parent[$root] = NULL;
    while(!$stack->isEmpty()){
        $current = $stack->pop();
        if(!($current->left) && !($current->right)){
            printTopToBottomPath($current,$parent);
        }
        if($current->right){
            $parent[$current->right] = $current;
            $stack->push($current->right);
        }
        if($current->left){
            $parent[$current->left] = $current;
            $stack->push($current->left);
        }
    }
}

$root = new Node(10);
$root->left = new Node(8);
$root->right = new Node(2);
$root->left->left = new Node(3);
$root->left->right = new Node(5);
$root->right->left = new Node(2);

printRootToLeaf($root);