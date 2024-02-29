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
    $postOrderList = array();
    $stack = new SplStack;
    while(true){
        while($root){
            $stack->push($root);
            $stack->push($root);
            $root = $root->left;
        }
        if($stack->isEmpty()){
            return $postOrderList;
        }
        $root = $stack->pop();
        if(!$stack->isEmpty() && $stack->top() == $root){
            $root = $root->right;
        }else{
            array_push($postOrderList,$root->data);
            $root = NULL;
        }
    }
    return $postOrderList;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);
printf("Post order traversal of binary tree is :<br/>");
printf("[");
$postOrderList = postOrderIterative($root);
foreach ($postOrderList as $it)
    echo $it . " ";
printf("]");