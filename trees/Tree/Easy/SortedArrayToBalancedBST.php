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

function sortedArrayToBST($arr,$start,$end){
    if($start > $end){
        return NULL;
    }
    $mid = (int)(($start + $end) / 2);
    $root = new Node($arr[$mid]);
    $root->left = sortedArrayToBST($arr,$start,$mid-1);
    $root->right = sortedArrayToBST($arr,$mid+1,$end);
    return $root;
}

function preOrder($root){
    if(!$root){
        return;
    }
    echo $root->data . " ";
    preOrder($root->left);
    preOrder($root->right);
}

$arr = [ 1, 2, 3, 4, 5, 6, 7 ];
$n = sizeof($arr);
$root = sortedArrayToBST($arr, 0, $n - 1);
echo "PreOrder Traversal of constructed BST: ";
preOrder($root);