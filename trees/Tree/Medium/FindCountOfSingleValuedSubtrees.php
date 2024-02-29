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

function countSingleUtil($root,&$count){
    if(!$root){
        return true;
    }
    $left = countSingleUtil($root->left,$count);
    $right = countSingleUtil($root->right,$count);
    if($left == false || $right == false){
        return false;
    }
    if($root->left && $root->data != $root->left->data){
        return false;
    }
    if($root->right && $root->data != $root->right->data){
        return false;
    }
    $count++;
    return true;
}

function countSingle($root){
    $count = 0;
    countSingleUtil($root,$count);
    return $count;
}

$root        = new Node(5);
$root->left        = new Node(4);
$root->right       = new Node(5);
$root->left->left  = new Node(4);
$root->left->right = new Node(4);
$root->right->right = new Node(5);

echo "Count of Single Valued Subtrees is " . countSingle($root);