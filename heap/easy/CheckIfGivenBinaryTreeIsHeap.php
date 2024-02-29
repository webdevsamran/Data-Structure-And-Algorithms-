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

function countNodes($root): int
{
    if ($root == NULL) {
        return 0;
    }
    return (1 + (countNodes($root->left)) + (countNodes($root->right)));
}

function isComplete(&$root, $index, $total_nodes): bool
{
    if ($root == NULL) {
        return true;
    }
    if ($index >= $total_nodes) {
        return false;
    }
    return (isComplete($root, 2 * $index + 1, $total_nodes) && isComplete($root, 2 * $index + 2, $total_nodes));
}

function isHeap(&$root): bool
{
    if ($root->left == NULL && $root->right == NULL) {
        return true;
    }
    if ($root->right == NULL) {
        return ($root->data >= $root->left->data);
    } else {
        if ($root->data >= $root->left->data && $root->data >= $root->right->data) {
            return (isHeap($root->left) && isHeap($root->right));
        } else {
            return false;
        }
    }
}

function isBinaryTreeHeap(&$root): bool
{
    $totalNodes = countNodes($root);
    $index = 0;
    if (isComplete($root, $index, $totalNodes) && isHeap($root)) {
        return true;
    }
    return false;
}

$root = new Node(10);
$root->left = new Node(9);
$root->right = new Node(8);
$root->left->left = new Node(7);
$root->left->right = new Node(6);
$root->right->left = new Node(5);
$root->right->right = new Node(4);
$root->left->left->left = new Node(3);
$root->left->left->right = new Node(2);
$root->left->right->left = new Node(1);

// Function call
if (isHeap($root))
    echo "Given binary tree is a Heap.<br/>\n";
else
    echo "Given binary tree is not a Heap.<br/>\n";
