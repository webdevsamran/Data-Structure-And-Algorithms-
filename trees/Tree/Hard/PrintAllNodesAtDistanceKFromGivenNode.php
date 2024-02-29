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

function distanceK($root,$target,$k){
    $ans = array();
    $queue = new SplQueue;
    $queue->enqueue($root);
    $map = array();
    $need = NULL;
    while($queue->count()){
        $s = $queue->count();
        for($i = 0; $i < $s; $i++){
            $temp = $queue->dequeue();
            if($temp == $target){
                $need = $temp;
            }
            if($temp->left){
                $queue->enqueue($temp->left);
                $map[serialize($temp->left)] = $temp;
            }
            if($temp->right){
                $queue->enqueue($temp->right);
                $map[serialize($temp->right)] = $temp;
            }
        }
    }
    $mapp = array();
    $queue->enqueue($need);
    $c = 0;
    while($queue->count()){
        $s = $queue->count();
        for($i = 0; $i < $s; $i++){
            $temp = $queue->dequeue();
            $mapp[serialize($temp)] = 1;
            if($c == $k){
                array_push($ans, $temp->data);
            }
            if($temp->left && !isset($mapp[serialize($temp->left)])){
                $queue->enqueue($temp->left);
            }
            if($temp->right && !isset($mapp[serialize($temp->right)])){
                $queue->enqueue($temp->right);
            }
            if($map[serialize($temp)] && !isset($mapp[serialize($temp)])){
                $queue->enqueue($map[serialize($temp)]);
            }
        }
        $c++;
        if($c > $k){
            break;
        }
    }
    return $ans;
}

$root = new Node(20);
$root->left = new Node(8);
$root->right = new Node(22);
$root->left->left = new Node(4);
$root->left->right = new Node(12);
$root->left->right->left = new Node(10);
$root->left->right->right = new Node(4);
$target = $root->left->right;
$result = distanceK($root, $target, 2);
echo "<pre>";
print_r($result);