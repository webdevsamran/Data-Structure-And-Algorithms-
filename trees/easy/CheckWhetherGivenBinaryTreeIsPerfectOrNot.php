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

function findDepth($root): int
{
    $d = 0;
    while ($root != NULL) {
        $d++;
        $root = $root->left;
    }
    return $d;
}

function isPerfectR($root, $d, $level = 0): bool
{
    if ($root == NULL) {
        return true;
    }
    if ($root->left == NULL && $root->right == NULL) {
        return ($d == $level + 1);
    }
    if ($root->left == NULL || $root->right == NULL) {
        return false;
    }
    return isPerfectR($root->left, $d, $level + 1) && isPerfectR($root->right, $d, $level + 1);
}

function isPerfect($root): bool
{
    $d = findDepth($root);
    return isPerfectR($root, $d);
}

$root = new Node(10);
$root->left = new Node(20);
$root->right = new Node(30);

$root->left->left = new Node(40);
$root->left->right = new Node(50);
$root->right->left = new Node(60);
$root->right->right = new Node(70);

echo (isPerfect($root)) ? "Yes" : "No";
