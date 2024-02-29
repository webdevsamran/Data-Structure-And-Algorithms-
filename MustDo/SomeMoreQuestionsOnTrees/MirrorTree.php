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
    if(!$root){
        return;
    }
    inOrder($root->left);
    echo $root->data . " ";
    inOrder($root->right);
}

function swap(&$a, &$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function mirror(&$node){
    if(!$node){
        return;
    }
    $queue = new SplQueue;
    $queue->enqueue($node);
    while(!$queue->isEmpty()){
        $curr = $queue->dequeue();
        swap($curr->left, $curr->right);
        if($curr->left){
            $queue->enqueue($curr->left);
        }
        if($curr->right){
            $queue->enqueue($curr->right);
        }
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
echo "Inorder traversal of the constructed tree is <br/>";
inOrder($root);
mirror($root);
echo "<br/>Inorder traversal of the mirror tree is <br/>";
inOrder($root);