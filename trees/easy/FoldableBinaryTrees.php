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

function mirror(&$root): void
{
    if ($root == NULL) {
        return;
    } else {
        $temp = NULL;
        mirror($root->left);
        mirror($root->right);

        $temp = $root->left;
        $root->left = $root->right;
        $root->right = $temp;
    }
}

function isStructSame($node1, $node2): bool
{
    if ($node1 == NULL && $node2 == NULL) {
        return true;
    }
    if ($node1 != NULL && $node2 != NULL && isStructSame($node1->left, $node2->left) && isStructSame($node1->right, $node2->right)) {
        return true;
    }
    return false;
}

function isFoldable($root): bool
{
    $res = NULL;
    if ($root == NULL) {
        return true;
    }
    mirror($root->left);
    $res = isStructSame($root->left, $root->right);
    mirror($root->left);
    return $res;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->right = new Node(4);
$root->right->left = new Node(5);

echo (isFoldable($root)) ? "Tree is Foldable" : "Tree is not Foldable";
