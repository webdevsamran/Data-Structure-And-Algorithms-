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

function printNodes($root,$start,$end){
    if($root == NULL){
        return;
    }

    $queue = new SplQueue;
    $queue->enqueue($root);

    $curr = NULL;
    $level = 0;

    while(!$queue->isEmpty()){
        $level++;
        $size = $queue->count();
        while($size != 0){
            $curr = $queue->dequeue();
            
            if($level >= $start && $level <= $end){
                echo $curr->data." ";
            }
            if($curr->left != NULL){
                $queue->enqueue($curr->left);
            }
            if($curr->right != NULL){
                $queue->enqueue($curr->right);
            }
            $size--;
        }
        if($level >= $start && $level <= $end){
            echo "<br/>";
        }
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);

/* Constructed binary Node is
        1
    / \
    2   3
    / \ / \
    4 5 6 7 
*/

$start = 2;
$end = 3;
printNodes($root, $start, $end);