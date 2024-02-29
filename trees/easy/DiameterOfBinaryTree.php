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

function treeHeight($root): int
{
    if ($root == NULL) {
        return 0;
    }
    return 1 + max(treeHeight($root->left), treeHeight($root->right));
}

function treeDiameter($root): int
{
    if ($root == NULL) {
        return 0;
    }
    $lHeight = treeHeight($root->left);
    $rHeight = treeHeight($root->right);

    $lDiameter = treeDiameter($root->left);
    $rDiameter = treeDiameter($root->right);

    return max($lHeight + $rHeight + 1, max($lDiameter, $rDiameter));
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "Diameter of the tree is " . treeDiameter($root);
