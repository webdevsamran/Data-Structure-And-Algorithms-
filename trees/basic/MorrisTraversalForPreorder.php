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

function morrisTraversalPreorder($root): void
{
    while ($root) {
        if ($root->left == NULL) {
            echo $root->data . " ";
            $root = $root->right;
        } else {
            $current = $root->left;
            while ($current->right && $current->right != $root) {
                $current = $current->right;
            }
            if ($current->right == $root) {
                $current->right = NULL;
                $root = $root->right;
            } else {
                echo $root->data . " ";
                $current->right = $root;
                $root = $root->left;
            }
        }
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "Morris Pre Order without Recursion: ";
morrisTraversalPreorder($root);
echo "<br/>";
