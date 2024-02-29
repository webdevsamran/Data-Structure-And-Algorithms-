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

function helper(&$res,$root,$d){
    if(!$root){
        return;
    }
    if($d == sizeof($res)){
        array_push($res,$root->data);
    }else{
        $res[$d] = max($res[$d], $root->data);
    }
    helper($res,$root->left,$d+1);
    helper($res,$root->right,$d+1);
}

function largestValues($root){
    $res = array();
    helper($res,$root,0);
    return $res;
}

$root = NULL;
$root = new Node(4);
$root->left = new Node(9);
$root->right = new Node(2);
$root->left->left = new Node(3);
$root->left->right = new Node(5);
$root->right->right = new Node(7);
    
$res = largestValues($root);
for ($i = 0; $i < sizeof($res); $i++)
    echo $res[$i] . " ";