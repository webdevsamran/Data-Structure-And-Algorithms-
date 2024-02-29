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

function findMaxSum($root){
    $max_sum = PHP_INT_MIN;
    $stack = new SplStack;
    $stack->push([$root,0]);
    while(!$stack->isEmpty()){
        $item = $stack->pop();
        $node = $item[0];
        $state = $item[1];
        if($node == NULL){
            continue;
        }
        if($state == 0){
            $stack->push([$node,1]);
            $stack->push([$node->left,0]);
        }else if($state == 1){
            $stack->push([$node,2]);
            $stack->push([$node->right,0]);
        }else{
            $left_sum = ($node->left != NULL) ? $node->left->data : 0;
            $right_sum = ($node->right != NULL) ? $node->right->data : 0;
            $max_sum = max($max_sum, $node->data + max(0,$left_sum) + max(0,$right_sum));
            $max_child_sum = max($left_sum,$right_sum);
            $node->data += max(0,$max_child_sum);
        }
    }
    return $max_sum;
}

$root = new Node(10);
$root->left = new Node(2);
$root->right = new Node(-25);
$root->left->left = new Node(20);
$root->left->right = new Node(1);
$root->right->left = new Node(3);
$root->right->right = new Node(4);

$max_sum = findMaxSum($root);
echo "Maximum Path Sum: " . $max_sum;