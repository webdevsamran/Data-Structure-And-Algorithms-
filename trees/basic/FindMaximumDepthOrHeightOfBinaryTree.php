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

function printMaxHeight($root): int
{
    if ($root == NULL) {
        return 0;
    } else {
        $ldepth = printMaxHeight($root->left);
        $rdepth = printMaxHeight($root->right);
        if ($ldepth > $rdepth) {
            return $ldepth + 1;
        } else {
            return $rdepth + 1;
        }
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "Maximum Height is: ";
echo printMaxHeight($root);
echo "<br/>";
