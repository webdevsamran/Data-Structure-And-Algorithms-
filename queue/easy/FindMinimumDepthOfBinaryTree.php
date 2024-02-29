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

function minDepth($root): int
{
    if ($root == NULL) {
        return 0;
    }
    if ($root->left == NULL && $root->right == NULL) {
        return 1;
    }
    $l = PHP_INT_MAX;
    $r = PHP_INT_MAX;
    if ($root->left) {
        $l = minDepth($root->left);
        echo "l value is: " . $l . "<br/>";
    }
    if ($root->right) {
        $r = minDepth($root->right);
        echo "r value is: " . $r . "<br/>";
    }
    return min($l, $r) + 1;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);
echo minDepth($root);
