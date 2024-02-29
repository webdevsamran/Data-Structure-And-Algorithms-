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

function areIdentical($T,$S){
    if(!$T && !$S){
        return true;
    }
    if(!$T || !$S){
        return false;
    }
    return ($T->data == $S->data && areIdentical($T->left, $S->left) && areIdentical($T->right, $S->right));
}

function isSubtree($T,$S){
    if(!$S){
        return true;
    }
    if(!$T){
        return false;
    }
    if(areIdentical($T,$S)){
        return true;
    }
    return isSubtree($T->left,$S) || isSubtree($T->right,$S);
}

$T = new Node(26);
$T->right = new Node(3);
$T->right->right = new Node(3);
$T->left = new Node(10);
$T->left->left = new Node(4);
$T->left->left->right = new Node(30);
$T->left->right = new Node(6);
$S = new Node(10);
$S->right = new Node(6);
$S->left = new Node(4);
$S->left->right = new Node(30);

if (isSubtree($T, $S))
    echo "Tree 2 is subtree of Tree 1";
else
    echo "Tree 2 is not a subtree of Tree 1";