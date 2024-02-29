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

function printLeftNode(&$root): void
{
    if ($root == NULL) {
        return;
    }
    if ($root->left) {
        echo $root->data . " ";
        printLeftNode($root->left);
    } else if ($root->right) {
        echo $root->data . " ";
        printLeftNode($root->right);
    }
}

function printLeaves(&$root): void
{
    if ($root == NULL) {
        return;
    }
    printLeaves($root->left);
    if (!($root->left) && !($root->right)) {
        echo $root->data . " ";
    }
    printLeaves($root->right);
}

function printRightNode(&$root): void
{
    if ($root == NULL) {
        return;
    }
    if ($root->right) {
        printRightNode($root->right);
        echo $root->data . " ";
    } else if ($root->left) {
        printRightNode($root->left);
        echo $root->data . " ";
    }
}

function boundaryTraversalPrint($root): void
{
    if ($root == NULL) {
        return;
    }
    echo $root->data . " ";
    printLeftNode($root->left);
    printLeaves($root->left);
    printLeaves($root->right);
    printRightNode($root->right);
}

$root = new Node(20);
$root->left = new Node(8);
$root->left->left = new Node(4);
$root->left->right = new Node(12);
$root->left->right->left = new Node(10);
$root->left->right->right = new Node(14);
$root->right = new Node(22);
$root->right->right = new Node(25);

echo "Diagonal Print: ";
boundaryTraversalPrint($root);
echo "<br/>";
