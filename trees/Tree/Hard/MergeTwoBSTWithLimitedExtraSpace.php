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

function mergeTwoBST($root1,$root2){
    $res = array();
    $stack1 = $stack2 = new SplStack;
    while($root1 || $root2 || !$stack1->isEmpty() || !$stack2->isEmpty()){
        while($root1){
            $stack1->push($root1);
            $root1 = $root1->left;
        }
        while($root2){
            $stack2->push($root2);
            $root2 = $root2->left;
        }
        $s1_data = $stack1->top();
        $s2_data = $stack2->top();
        if($stack2->isEmpty() || (!$stack1->isEmpty() && $s1_data->data <= $s2_data->data)){
            $root1 = $stack1->pop();
            array_push($res,$root1->data);
            $root1 = $root1->right;
        }else{
            $root2 = $stack2->pop();
            array_push($res,$root2->data);
            $root2 = $root2->right;
        }
    }
    return $res;
}

$root1 = $root2 = NULL;
$root1 = new Node(3);
$root1->left = new Node(1);
$root1->right = new Node(5);
$root2 = new Node(4);
$root2->left = new Node(2);
$root2->right = new Node(6);
$ans = mergeTwoBST($root1, $root2);
echo "<pre>";
print_r($ans);
foreach($ans as $val){
    echo $val . " ";
}