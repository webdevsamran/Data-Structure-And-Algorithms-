<?php

class Node
{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = NULL;
    }
}

function countNodes($root): int
{
    if ($root == NULL) {
        return 0;
    }
    return countNodes($root->left) + 1 + countNodes($root->right);
}

function checkRec($root, $total): bool
{
    if ($root == NULL) {
        return false;
    }
    if (countNodes($root) == $total - countNodes($root)) {
        return true;
    }
    return checkRec($root->left, $total) || checkRec($root->right, $total);
}

function check($root): bool
{
    $count = countNodes($root);
    return checkRec($root, $count);
}

$root = new Node(5);
$root->left = new Node(1);
$root->right = new Node(6);
$root->left->left = new Node(3);
$root->right->left = new Node(7);
$root->right->right = new Node(4);

echo check($root) ?  "YES" : "NO";
