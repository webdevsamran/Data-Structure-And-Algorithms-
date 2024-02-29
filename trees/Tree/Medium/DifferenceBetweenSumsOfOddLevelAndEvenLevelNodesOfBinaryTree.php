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

function evenOddLevelDifference($root){
    if(!$root){
        return 0;
    }
    $queue = new SplQueue;
    $queue->enqueue($root);
    $level = 0;
    $evenSum = $oddSum = 0;
    while(!$queue->isEmpty()){
        $size = $queue->count();
        $level += 1;
        while($size--){
            $temp = $queue->dequeue();
            if($level % 2 == 0){
                $evenSum += $temp->data;
            }else{
                $oddSum += $temp->data;
            }
            if($temp->left){
                $queue->enqueue($temp->left);
            }
            if($temp->right){
                $queue->enqueue($temp->right);
            }
        }
    }
    return ($oddSum - $evenSum);
}

$root = new Node(5);
$root->left = new Node(2);
$root->right = new Node(6);
$root->left->left = new Node(1);
$root->left->right = new Node(4);
$root->left->right->left = new Node(3);
$root->right->right = new Node(8);
$root->right->right->right = new Node(9);
$root->right->right->left = new Node(7);
$result = evenOddLevelDifference($root);
echo "difference between sums is :: ";
echo $result;