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

function insertionInBinaryTree($root, $data): Node
{
    if ($root == NULL) {
        $root = new Node($data);
        return $root;
    }
    $queue = new SplQueue;
    $queue->enqueue($root);
    while (!$queue->isEmpty()) {
        $item = $queue->dequeue();
        if ($item->left != NULL) {
            $queue->enqueue($item->left);
        } else {
            $item->left = new Node($data);
            return $root;
        }
        if ($item->right != NULL) {
            $queue->enqueue($item->right);
        } else {
            $item->right = new Node($data);
            return $root;
        }
    }
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

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "In Order: ";
printInOrder($root);
echo "<br/>";

insertionInBinaryTree($root, 6);
insertionInBinaryTree($root, 7);

echo "In Order: ";
printInOrder($root);
echo "<br/>";
