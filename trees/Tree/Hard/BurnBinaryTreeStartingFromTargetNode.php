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

$map = array();

function buildMap($root,$parent){
    global $map;
    if(!$root){
        return;
    }
    if(!array_key_exists(serialize($root),$map)){
        if($parent){
            $map[serialize($root)][] = $parent;
            $map[serialize($parent)][] = $root;
        }
        buildMap($root->left,$root);
        buildMap($root->right,$root);
    }
}

function burnTree($root,$target){
    global $map;
    if(!$root){
        return;
    }
    buildMap($root,NULL);
    if(!array_key_exists(serialize($target),$map)){
        echo "Target Not Found.<br/>";
        return;
    }
    $visited = array();
    $queue = new SplQueue;
    $queue->enqueue($target);
    array_push($visited,serialize($target));
    while(!$queue->isEmpty()){
        $size = $queue->count();
        for($i = 0; $i < $size; $i++){
            $node = $queue->dequeue();
            echo $node->data . " ";
            foreach($map[serialize($node)] as $val){
                if(in_array(serialize($val),$visited)){
                    continue;
                }
                array_push($visited,serialize($val));
                $queue->enqueue($val);
            }
        }
        echo "<br/>";
    }
}

$root = new Node(12);
$root->left = new Node(13);
$root->right = new Node(10);
$root->right->left = new Node(14);
$root->right->right = new Node(15);
$left = $root->right->left;
$right = $root->right->right;
$left->left = new Node(21);
$left->right = new Node(24);
$right->left = new Node(22);
$right->right = new Node(23);
burnTree($root, $left);