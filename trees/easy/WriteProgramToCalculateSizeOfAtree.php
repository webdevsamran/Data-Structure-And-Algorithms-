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

function treeSize($root): int
{
    if ($root == NULL) {
        return 0;
    }
    return treeSize($root->left) + 1 + treeSize($root->right);
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "Size of the tree is " . treeSize($root);
