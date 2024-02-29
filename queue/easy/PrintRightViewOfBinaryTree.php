<?php

class Node
{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
    }
}

function rightViewUntil($root, $level, &$max_level): void
{
    if ($root == NULL) {
        return;
    }
    if ($max_level < $level) {
        echo $root->data . " ";
        $max_level = $level;
    }
    rightViewUntil($root->right, $level + 1, $max_level);
    rightViewUntil($root->left, $level + 1, $max_level);
}

function rightView($root): void
{
    $max_level = 0;
    rightViewUntil($root, 1, $max_level);
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);
$root->right->right->right = new Node(8);

rightView($root);
