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

function printLevelOrder($root): void
{
    if ($root == NULL) {
        return;
    }
    $queue = new SplQueue();
    $queue->enqueue($root);
    while (!$queue->isEmpty()) {
        $item = $queue->dequeue();
        echo $item->data . " ";
        if ($item->left != NULL) {
            $queue->enqueue($item->left);
        }
        if ($item->right != NULL) {
            $queue->enqueue($item->right);
        }
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "Level Order: ";
printLevelOrder($root);
echo "<br/>";
