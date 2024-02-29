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

function getHeight($root): int
{
    if ($root == NULL) {
        return 0;
    } else {
        $ldepth = getHeight($root->left);
        $rdepth = getHeight($root->right);
        if ($ldepth > $rdepth) {
            return $ldepth + 1;
        } else {
            return $rdepth + 1;
        }
    }
}

function printSpiral($root): void
{
    $height = getHeight($root);
    $ltr = false;
    for ($i = 1; $i <= $height; $i++) {
        printLevelOrder($root, $i, $ltr);
        $ltr = !$ltr;
    }
}

function printLevelOrder($root, $level, $ltr): void
{
    if ($root == NULL) {
        return;
    }
    if ($level == 1) {
        echo $root->data . " ";
    } else if ($level > 1) {
        if ($ltr) {
            printLevelOrder($root->left, $level - 1, $ltr);
            printLevelOrder($root->right, $level - 1, $ltr);
        } else {
            printLevelOrder($root->right, $level - 1, $ltr);
            printLevelOrder($root->left, $level - 1, $ltr);
        }
    }
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);

echo "Spiral Level Order: ";
printSpiral($root);
echo "<br/>";
