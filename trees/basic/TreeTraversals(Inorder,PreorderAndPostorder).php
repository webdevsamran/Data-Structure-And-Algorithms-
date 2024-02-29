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

function printPreOrder($root): void
{
    if ($root == NULL) {
        return;
    }
    echo $root->data . " ";
    printPreOrder($root->left);
    printPreOrder($root->right);
}

function printInOrder($root): void
{
    if ($root == NULL) {
        return;
    }
    printInOrder($root->left);
    echo $root->data . " ";
    printInOrder($root->right);
}

function printPostOrder($root): void
{
    if ($root == NULL) {
        return;
    }
    printPostOrder($root->left);
    printPostOrder($root->right);
    echo $root->data . " ";
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "Pre Order: ";
printPreOrder($root);
echo "<br/>";

echo "In Order: ";
printInOrder($root);
echo "<br/>";

echo "Post Order: ";
printPostOrder($root);
echo "<br/>";
