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

function maxSum($arr,$n){
    $max_ending_here = PHP_INT_MIN;
    $max_so_far = PHP_INT_MIN;
    for($i = 0; $i < $n; $i++){
        if($max_ending_here < 0){
            $max_ending_here = $arr[$i];
        }else{
            $max_ending_here += $arr[$i];
        }
        $max_so_far = max($max_so_far,$max_ending_here);
    }
    return $max_so_far;
}

function maxSpiralSum($root){
    if(!$root){
        return 0;
    }
    $s1 = new SplStack;
    $s2 = new SplStack;
    $arr = array();
    $s1->push($root);
    while(!$s1->isEmpty() || !$s2->isEmpty()){
        while(!$s1->isEmpty()){
            $temp = $s1->pop();
            array_push($arr,$temp->data);
            if($temp->right){
                $s2->push($temp->right);
            }
            if($temp->left){
                $s2->push($temp->left);
            }
        }
        while(!$s2->isEmpty()){
            $temp = $s2->pop();
            array_push($arr,$temp->data);
            if($temp->left){
                $s1->push($temp->left);
            }
            if($temp->right){
                $s1->push($temp->right);
            }
        }
    }
    return maxSum($arr,sizeof($arr));
}

$root = new Node(-2);
$root->left = new Node(-3);
$root->right = new Node(4);
$root->left->left = new Node(5);
$root->left->right = new Node(1);
$root->right->left = new Node(-2);
$root->right->right = new Node(-1);
$root->left->left->left = new Node(-3);
$root->right->right->right = new Node(2);

echo "Maximum Spiral Sum = " . maxSpiralSum($root);