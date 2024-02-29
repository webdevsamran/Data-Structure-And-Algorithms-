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

function leftView($node){
    if(!$node){
        return $node;
    }
    $queue = new SplQueue;
    $queue->enqueue($node);
    $ans = array();
    while(!$queue->isEmpty()){
        $s = $queue->count();
        $a = -1;
        while($s--){
            $f = $queue->dequeue();
            if($a == -1){
                $a = $f->data;
            }
            if($f->left){
                $queue->enqueue($f->left);
            }
            if($f->right){
                $queue->enqueue($f->right);
            }
        }
        array_push($ans,$a);
    }
    return $ans;
}

$node = new Node(1);
$node->left = new Node(2);
$node->right = new Node(3);
$node->left->left = new Node(4);
$node->right->right = new Node(5);
$node->right->right->left = new Node(6);

print_r(leftView($node));