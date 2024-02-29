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

function verticalOrder($root){
    if(!$root){
        return ;
    }
    $map = array();
    $hd = 0;
    $queue = new SplQueue;
    $queue->enqueue([$root,$hd]);
    $mn = $mx = 0;
    while(!$queue->isEmpty()){
        $temp = $queue->dequeue();
        $hd = $temp[1];
        $node = $temp[0];
        $map[$hd][] = $node;
        if($node->left){
            $queue->enqueue([$node->left,$hd - 1]);
        }
        if($node->right){
            $queue->enqueue([$node->right,$hd + 1]);
        }
        if($mn > $hd){
            $mn = $hd;
        }
        if($mx < $hd){
            $mx = $hd;
        }
    }
    for($i = $mn; $i <= $mx; $i++){
        $tmp = $map[$i];
        for($j = 0; $j < sizeof($tmp); $j++){
            echo $tmp[$j]->data . " ";
        }
        echo "<br/>";
    }
}

$node = new Node(1);
$node->left = new Node(2);
$node->right = new Node(3);
$node->left->left = new Node(4);
$node->right->right = new Node(5);
$node->right->right->left = new Node(6);

verticalOrder($node);