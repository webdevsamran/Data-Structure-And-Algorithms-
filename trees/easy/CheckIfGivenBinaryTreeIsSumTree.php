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

// function isSumTree($root)
// {
//     if ($root == NULL || ($root->left  == NULL && $root->right == NULL)) {
//         return true;
//     }
//     $queue = new SplQueue;
//     $queue->enqueue($root);
//     while (!$queue->isEmpty()) {
//         $node = $queue->dequeue();
//         if ($node->left == NULL && $node->right == NULL) {
//             continue;
//         }
//         $sum = 0;
//         if ($node->left != NULL) {
//             $sum += $node->left->data;
//             $queue->enqueue($node->left);
//         }
//         if ($node->right != NULL) {
//             $sum += $node->right->data;
//             $queue->enqueue($node->right);
//         }
//         if ($sum != $node->data) {
//             return false;
//         }
//     }
//     return true;
// }

function sum($root)
{
    if ($root == NULL) {
        return 0;
    }
    return (sum($root->left)) + $root->data + (sum($root->right));
}

function isSumTree($root)
{
    $ls = NULL;
    $rs = NULL;

    if ($root == NULL || ($root->left == NULL && $root->right == NULL)) {
        return true;
    }

    $ls = sum($root->left);
    $rs = sum($root->right);

    if (($root->data = $ls + $rs) && isSumTree($root->left) && isSumTree($root->right)) {
        return true;
    }
    return false;
}

$root = new Node(26);
$root->left = new Node(10);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(6);
$root->right->right = new Node(3);

if (isSumTree($root)) {
    echo "Given binary tree is a sum tree.";
} else {
    echo "Given binary tree is not a sum tree.";
}
