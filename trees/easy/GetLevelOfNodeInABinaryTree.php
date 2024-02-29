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

function printLevel($root, $x): int
{
    if ($root == NULL) {
        return 0;
    }
    $queue = new SplQueue;
    $queue->enqueue($root);
    $curr_level = 1;
    while (!$queue->isEmpty()) {
        $size = $queue->count();
        while ($size--) {
            $node = $queue->dequeue();
            if ($node->data == $x) {
                return $curr_level;
            }
            if ($node->left != NULL) {
                $queue->enqueue($node->left);
            }
            if ($node->right != NULL) {
                $queue->enqueue($node->right);
            }
        }
        $curr_level++;
    }
    return 0;
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(7);
$root->right->right = new Node(6);

echo printLevel($root, 6) . "<br/>";
echo printLevel($root, 1) . "<br/>";
echo printLevel($root, 2) . "<br/>";
