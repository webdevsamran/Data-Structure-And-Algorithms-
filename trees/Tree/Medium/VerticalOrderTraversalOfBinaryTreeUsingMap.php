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

function getVerticalOrder($root, $hd, &$map){
    if(!$root){
        return;
    }
    $map[$hd][] = $root->data;
    getVerticalOrder($root->left, $hd - 1, $map);
    getVerticalOrder($root->right, $hd + 1, $map);
}

function printVerticalOrder($root){
    $map = array();
    $hd = 0;
    getVerticalOrder($root, $hd, $map);
    echo "<pre>";
    print_r($map);
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);
$root->right->left->right = new Node(8);
$root->right->right->right = new Node(9);
echo "Vertical order traversal is <br/>";
printVerticalOrder($root);