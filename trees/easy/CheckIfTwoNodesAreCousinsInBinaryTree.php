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

function isSibling($root, $node1, $node2): bool
{
    if ($root == NULL) {
        return false;
    }
    return (($root->left == $node1 && $root->right == $node2) || ($root->left == $node2 && $root->right == $node1) || (isSibling($root->left, $node1, $node2)) || isSibling($root->right, $node1, $node2));
}

function level($root, $node, $level): int
{
    if ($root == NULL) {
        return 0;
    }
    if ($root == $node) {
        return $level;
    }
    $l = level($root->left, $node, $level + 1);
    if ($l != 0) {
        return $l;
    }
    return level($root->right, $node, $level + 1);
}

function isCousin($root, $node1, $node2): bool
{
    if ((level($root, $node1, 1) == level($root, $node2, 1)) && !isSibling($root, $node1, $node2)) {
        return true;
    }
    return false;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->left->right->right = new Node(15);
$root->right->left = new Node(6);
$root->right->right = new Node(7);
$root->right->left->right = new Node(8);
$Node1 = $root->left->left;
$Node2 = $root->right->right;

if (isCousin($root, $Node1, $Node2))
    printf("Yes\n");
else
    printf("No\n");
