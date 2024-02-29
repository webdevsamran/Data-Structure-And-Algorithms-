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

function printPath($root,$target_leaf){
    if(!$root){
        return false;
    }
    if ($root == $target_leaf || printPath($root->left, $target_leaf) || printPath($root->right, $target_leaf)) {
        echo $root->data . " ";
        return true;
    }
    return false;
}

function getTargetLeaf($node, &$max_sum, $cur_sum, &$target_leaf){
    if(!$node){
        return;
    }
    $cur_sum = $cur_sum + $node->data;
    if($node->left == NULL && $node->right == NULL){
        if($cur_sum > $max_sum){
            $max_sum = $cur_sum;
            $target_leaf = $node;
        }
    }
    getTargetLeaf($node->left, $max_sum, $cur_sum, $target_leaf);
    getTargetLeaf($node->right, $max_sum, $cur_sum, $target_leaf);
}

function maxSumPath($root){
    if(!$root){
        return 0;
    }
    $target_leaf = NULL;
    $max_sum = PHP_INT_MIN;
    getTargetLeaf($root, $max_sum, 0, $target_leaf);
    printPath($root, $target_leaf);
    return $max_sum;
}

$root = NULL;
$root = new Node(10);
$root->left = new Node(-2);
$root->right = new Node(7);
$root->left->left = new Node(8);
$root->left->right = new Node(-4);
echo "Following are the nodes on the maximum sum path <br/>";
$sum = maxSumPath($root);
echo "<br/>Sum of the nodes is " . $sum;