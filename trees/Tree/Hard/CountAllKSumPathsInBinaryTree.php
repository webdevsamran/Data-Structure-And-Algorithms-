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

function k_paths($root,$k,&$map,$sum,&$res){
    if($root){
        if($sum + $root->data == $k){
            $res++;
        }
        $res += $map[$sum + $root->data - $k];
        $map[$sum + $root->data]++;
        k_paths($root->left,$k,$map,$sum+$root->data,$res);
        k_paths($root->right,$k,$map,$sum+$root->data,$res);
        $map[$sum + $root->data]--;
    }
}

function printCount($root,$k){
    $res = 0;
    $map = array();
    k_paths($root,$k,$map,0,$res);
    return $res;
}

$root = new Node(1);
$root->left = new Node(2);
$root->left->left = new Node(1);
$root->left->right = new Node(2);
$root->right = new Node(-1);
$root->right->left = new Node(3);
$root->right->left->left = new Node(2);
$root->right->left->right = new Node(5);
$k = 3;
echo "No of paths with sum equals to " . $k . " are : " . printCount($root, $k);