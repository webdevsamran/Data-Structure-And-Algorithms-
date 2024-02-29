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

function areMirror($node1, $node2): bool
{
    if ($node1 == NULL && $node2 == NULL) {
        return true;
    }
    if ($node1 == NULL || $node2 == NULL) {
        return false;
    }
    return ($node1->data == $node2->data) && areMirror($node1->left, $node2->right) && areMirror($node1->right, $node2->left);
}

$node1 = new Node(1);
$node1->left = new Node(2);
$node1->right = new Node(3);
$node1->left->left  = new Node(4);
$node1->left->right = new Node(5);

$node2 = new Node(1);
$node2->left = new Node(3);
$node2->right = new Node(2);
$node2->right->left = new Node(5);
$node2->right->right = new Node(4);

echo areMirror($node1, $node2) ? "Yes" : "No";
