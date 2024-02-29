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

function iterativePostOrderUsingTwoStacks($root): void
{
    if ($root == NULL) {
        return;
    }
    $stack1 = new SplStack;
    $stack2 = new SplStack;
    $stack1->push($root);
    while (!$stack1->isEmpty()) {
        $item = $stack1->pop();
        $stack2->push($item);
        if ($item->left) {
            $stack1->push($item->left);
        }
        if ($item->right) {
            $stack1->push($item->right);
        }
    }
    while (!$stack2->isEmpty()) {
        $item = $stack2->pop();
        echo $item->data . " ";
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->right->left = new Node(6);
$root->right->right = new Node(7);

echo "POST Order without Recursion: ";
iterativePostOrderUsingTwoStacks($root);
echo "<br/>";
