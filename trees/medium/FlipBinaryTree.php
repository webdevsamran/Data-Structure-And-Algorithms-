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

function printLevelOrder($root){
    if($root == NULL){
        return;
    }
    $queue = new SplQueue;
    $queue->enqueue($root);
    while(1){
        $size = $queue->count();
        if($size == 0){
            break;
        }
        while($size > 0){
            $node = $queue->dequeue();
            echo $node->data." ";
            if($node->left != NULL){
                $queue->enqueue($node->left);
            }
            if($node->right != NULL){
                $queue->enqueue($node->right);
            }
            $size--;
        }
        echo "<br/>";
    }
}

function flipBinaryTree(&$root){
    if($root == NULL){
        return $root;
    }
    if($root->left == NULL && $root->right == NULL){
        return $root;
    }
    $nodeLeft = flipBinaryTree($root->left);
    $root->left->left = $root->right;
    $root->left->right = $root;
    $root->left = $root->right = NULL;

    return $nodeLeft;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->right->left = new Node(4);
$root->right->right = new Node(5);

echo "Level order traversal of given tree<br/>";
printLevelOrder($root);

$root = flipBinaryTree($root);

echo "<br/>Level order traversal of the flipped tree<br/>";
printLevelOrder($root);