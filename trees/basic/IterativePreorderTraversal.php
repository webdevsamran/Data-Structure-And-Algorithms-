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

function iterativePreOrder($root): void
{
    if ($root == NULL) {
        return;
    }
    $stack = new SplStack;
    $stack->push($root);
    while (!$stack->isEmpty()) {
        $item = $stack->pop();
        echo $item->data . " ";
        if ($item->right) {
            $stack->push($item->right);
        }
        if ($item->left) {
            $stack->push($item->left);
        }
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "PRE Order without Recursion: ";
iterativePreOrder($root);
echo "<br/>";
