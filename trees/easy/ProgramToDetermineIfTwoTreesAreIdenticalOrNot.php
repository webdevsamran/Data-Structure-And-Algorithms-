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

function identicalTrees($node1, $node2): bool
{
    if ($node1 == NULL && $node2 == NULL) {
        return true;
    }
    if ($node1 != NULL && $node2 != NULL) {
        return (($node1->data == $node2->data) && identicalTrees($node1->left, $node2->left) && identicalTrees($node1->right, $node2->right));
    }
}

$root1 = new Node(1);
$root1->left = new Node(2);
$root1->right = new Node(3);
$root1->left->left = new Node(4);
$root1->left->right = new Node(5);

$root2 = new Node(1);
$root2->left = new Node(2);
$root2->right = new Node(3);
$root2->left->left = new Node(4);
$root2->left->right = new Node(5);

// Function call
if (identicalTrees($root1, $root2))
    echo "Both trees are identical.";
else
    echo "Trees are not identical.";
