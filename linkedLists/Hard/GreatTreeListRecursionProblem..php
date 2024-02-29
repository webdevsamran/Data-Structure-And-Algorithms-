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

function displayCList($head)
{
    echo "Circular Linked List is :<br/>";
    $itr = $head;
    do {
        echo $itr->data . " ";
        $itr = $itr->right;
    } while ($head != $itr);
    echo "<br/>";
}

function concatenate($leftList,$rightList){
    if($leftList == NULL){
        return $rightList;
    }
    if($rightList == NULL){
        return $leftList;
    }
    $lastLeft = $leftList->left;
    $lastRight = $rightList->left;

    $lastLeft->right = $rightList;
    $lastRight->left = $lastLeft;

    $lastLeft->left = $lastRight;
    $lastRight->right = $leftList;

    return $leftList;
}

function bTreeToCList($root){
    if($root == NULL){
        return NULL;
    }
    $left = bTreeToCList($root->left);
    $right = bTreeToCList($root->right);
    $root->left = $root->right = $root;
    return concatenate(concatenate($left, $root), $right);
}

$root = new Node(10);
$root->left = new Node(12);
$root->right = new Node(15);
$root->left->left = new Node(25);
$root->left->right = new Node(30);
$root->right->left = new Node(36);

$head = bTreeToCList($root);
displayCList($head);