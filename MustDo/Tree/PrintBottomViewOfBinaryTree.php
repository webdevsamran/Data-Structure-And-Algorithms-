<?php

class Node{
    public $data;
    public $left;
    public $right;
    public $hd;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = NULL;
        $this->hd = PHP_INT_MAX;
    }
}

function bottomView($node){
    if(!$node){
        return NULL;
    }
    $hd = 0;
    $map = array();
    $queue = new SplQueue;
    $node->hd = $hd;
    $queue->enqueue($node);
    while(!$queue->isEmpty()){
        $temp = $queue->dequeue();
        $hd = $temp->hd;
        $map[$hd] = $temp->data;
        if($temp->left){
            $temp->left->hd = $hd - 1;
            $queue->enqueue($temp->left);
        }
        if($temp->right){
            $temp->right->hd = $hd + 1;
            $queue->enqueue($temp->right);
        }
    }
    ksort($map);
    echo "<pre>";
    print_r($map);
    foreach($map as $key => $val){
        echo $val . " ";
    }
}

$node = new Node(1);
$node->left = new Node(2);
$node->right = new Node(3);
$node->left->left = new Node(4);
$node->right->right = new Node(5);
$node->right->right->left = new Node(6);

bottomView($node);