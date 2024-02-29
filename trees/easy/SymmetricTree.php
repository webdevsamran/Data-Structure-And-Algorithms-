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

function isMirror($node1, $node2): bool
{
    if ($node1 == NULL && $node2 == NULL) {
        return true;
    }
    if ($node1 && $node2 && $node1->data == $node2->data) {
        return isMirror($node1->left, $node2->right) && isMirror($node1->right, $node2->left);
    }
    return false;
}

function isSymmetric($root): bool
{
    return isMirror($root, $root);
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(2);
$root->left->left = new Node(3);
$root->left->right = new Node(4);
$root->right->left = new Node(4);
$root->right->right = new Node(3);

if (isSymmetric($root))
    echo "Symmetric";
else
    echo "Not symmetric";
