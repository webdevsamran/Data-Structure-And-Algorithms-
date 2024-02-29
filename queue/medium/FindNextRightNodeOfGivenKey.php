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

function nextRight($root,$key){
    if($root == NULL){
        return 0;
    }
    $queueN = new SplQueue;
    $queueL = new SplQueue;

    $level = 0;

    $queueN->enqueue($root);
    $queueL->enqueue($level);

    while($queueN->count()){
        $node = $queueN->dequeue();
        $level = $queueL->dequeue();

        if($node->data == $key){
            if($queueN->count() == 0 || $queueL->top() != $level){
                return NULL;
            }
            return $queueN->top();
        }

        if($node->left != NULL){
            $queueN->enqueue($node->left);
            $queueL->enqueue($level+1);
        }

        if($node->right != NULL){
            $queueN->enqueue($node->right);
            $queueL->enqueue($level+1);
        }
    }

    return NULL;
}

function test($root,$key){
    $nr = nextRight($root,$key);
    if ($nr != NULL)
      echo "Next Right of " . $key . " is " . $nr->data . "<br/>";
    else
      echo "No next right node found for " . $key . "<br/>";
}

$root = new Node(10);
$root->left = new Node(2);
$root->right = new Node(6);
$root->right->right = new Node(5);
$root->left->left = new Node(8);
$root->left->right = new Node(4);

test($root, 10);
test($root, 2);
test($root, 6);
test($root, 5);
test($root, 8);
test($root, 4);