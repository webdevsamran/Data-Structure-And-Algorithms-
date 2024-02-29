<?php

class Node{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
    }
}

function levelOrder($root){
    if($root == NULL){
        return;
    }
    $queue = new SplQueue;
    $curr = NULL;
    $queue->enqueue($root);
    $queue->enqueue(NULL);

    while($queue->count() > 1){
        $curr = $queue->dequeue();
        if($curr == NULL){
            $queue->enqueue(NULL);
            echo "<br/>";
        }else{
            if($curr->left){
                $queue->enqueue($curr->left);
            }
            if($curr->right){
                $queue->enqueue($curr->right);
            }
            echo $curr->data." ";
        }
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->right = new Node(6);

levelOrder($root);