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

function printInOrderWithoutRecursion($root): void
{
    $stack = new SplStack;
    $temp = $root;
    while ($temp || !$stack->isEmpty()) {
        while ($temp) {
            $stack->push($temp);
            $temp = $temp->left;
        }
        $temp = $stack->pop();
        echo $temp->data . " ";
        $temp = $temp->right;
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "IN Order without Recursion: ";
printInOrderWithoutRecursion($root);
echo "<br/>";
