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

function isSumProperty($root){
    $sum = 0;
    if(!$root || (!$root->left && !$root->right)){
        return 1;
    }else{
        if($root->left){
            $sum += $root->left->data;
        }
        if($root->right){
            $sum += $root->right->data;
        }
        return (($root->data == $sum) && isSumProperty($root->left) && isSumProperty($root->right));
    }
}

$root = new Node(10);
$root->left = new Node(8);
$root->right = new Node(2);
$root->left->left = new Node(3);
$root->left->right = new Node(5);
$root->right->right = new Node(2);

// Function call
if (isSumProperty($root))
    echo "The given tree satisfies the children sum property ";
else
    echo "The given tree does not satisfy the children sum property ";