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

function isCompleteBT($root){
    $queue =new SplQueue;
    $queue->enqueue($root);
    $flag = false;

    while(!$queue->isEmpty()){
        $temp = $queue->dequeue();
        if($temp == NULL){
            $flag = true;
        }else{
            if($flag){
                return false;
            }
            $queue->enqueue($root->left);
            $queue->enqueue($root->right);
        }
    }

    return true;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);

if (isCompleteBT($root) == true)
    echo "Complete Binary Tree";
else
    echo "NOT Complete Binary Tree";