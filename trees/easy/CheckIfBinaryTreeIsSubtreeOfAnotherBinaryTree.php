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

function isIdentical($root, $node): bool
{
    if ($root == NULL && $node == NULL) {
        return true;
    }
    if ($root == NULL || $node == NULL) {
        return false;
    }
    return ($root->data == $node->data) && isIdentical($root->left, $node->left) && isIdentical($root->right, $node->right);
}

function isSubtree($root, $tree): bool
{
    if ($root == NULL) {
        return false;
    }
    if ($tree == NULL) {
        return true;
    }
    if (isIdentical($root, $tree)) {
        return true;
    }
    return isSubtree($root->left, $tree) || isSubtree($root->right, $tree);
}

$root = new Node(26);
$root->right = new Node(3);
$root->right->right = new Node(3);
$root->left = new Node(10);
$root->left->left = new Node(4);
$root->left->left->right = new Node(30);
$root->left->right = new Node(6);

$tree = new Node(10);
$tree->right = new Node(6);
$tree->left = new Node(4);
$tree->left->right = new Node(30);

echo isSubtree($root, $tree) ? "Yes" : "No";
