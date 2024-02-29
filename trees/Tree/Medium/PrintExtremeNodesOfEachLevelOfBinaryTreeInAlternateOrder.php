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

function printExtremeNodes($root){
    if(!$root){
        return;
    }
    $queue = new SplQueue;
    $queue->enqueue($root);
    $flag = false;
    while(!$queue->isEmpty()){
        $nodeCount = $queue->count();
        $n = $nodeCount;
        while($n--){
            $curr = $queue->dequeue();
            if($curr->left){
                $queue->enqueue($curr->left);
            }
            if($curr->right){
                $queue->enqueue($curr->right);
            }
            if($flag && $n == $nodeCount - 1){
                echo $curr->data . " ";
            }
            if(!$flag && $n == 0){
                echo $curr->data . " ";
            }
        }
        $flag = !$flag;
    }
}

$root = new Node(1);
 
$root->left = new Node(2);
$root->right = new Node(3);

$root->left->left  = new Node(4);
$root->left->right = new Node(5);
$root->right->right = new Node(7);

$root->left->left->left  = new Node(8);
$root->left->left->right  = new Node(9);
$root->left->right->left  = new Node(10);
$root->left->right->right  = new Node(11);
$root->right->right->left  = new Node(14);
$root->right->right->right  = new Node(15);

$root->left->left->left->left  = new Node(16);
$root->left->left->left->right  = new Node(17);
$root->right->right->right->right  = new Node(31);

printExtremeNodes($root);