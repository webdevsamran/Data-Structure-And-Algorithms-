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

function gcd($a,$b){
    if($b == 0){
        return $a;
    }
    return gcd($b,$a%$b);
}

function max_gcd_helper($root,&$ans){
    if(!$root){
        return 0;
    }
    $left_gcd = max_gcd_helper($root->left,$ans);
    $right_gcd = max_gcd_helper($root->right,$ans);
    if($left_gcd && $right_gcd){
        $sibiling_gcd = gcd($left_gcd,$right_gcd);
        $ans = max($ans,$sibiling_gcd);
    }
    return ($root->left) ? gcd($root->data,$left_gcd) : $root->data;
}

function max_gcd($root){
    $ans = 0;
    max_gcd_helper($root,$ans);
    return $ans;
}

$root = new Node(10);
$root->left = new Node(5);
$root->right = new Node(15);
$root->left->left = new Node(4);
$root->left->right = new Node(8);
$root->right->left = new Node(10);
$root->right->right = new Node(20);
echo max_gcd($root);