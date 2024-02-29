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

function zigZagTraversal($root){
    if(!$root){
        return array();
    }
    $ans = array();
    $queue = new SplQueue;
    $queue->enqueue($root);
    $flag = false;
    while(!$queue->isEmpty()){
        $size = $queue->count();
        $level = array();
        for($i = 0; $i < $size; $i++){
            $node = $queue->dequeue();
            array_push($level,$node->data);
            if($node->left){
                $queue->enqueue($node->left);
            }
            if($node->right){
                $queue->enqueue($node->right);
            }
        }
        $flag = !$flag;
        if($flag == false){
            $level = array_reverse($level);
        }
        for($i = 0; $i < sizeof($level); $i++){
            array_push($ans,$level[$i]);
        }
    }
    return $ans;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(7);
$root->left->right = new Node(6);
$root->right->left = new Node(5);
$root->right->right = new Node(4);
echo "ZigZag Order traversal of binary tree is <br/>";
$v = zigZagTraversal($root);
for ($i = 0; $i < sizeof($v); $i++) 
{ 
    echo $v[$i] . " ";
}