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

function newNode($data): Node
{
    $node = new Node($data);
    return $node;
}

function inOrder($root): void
{
    if ($root == NULL) {
        return;
    }
    inOrder($root->left);
    echo $root->data . " ";
    inOrder($root->right);
}

function minValueNode($root): Node
{
    $current = $root;
    while ($current && $current->left != NULL) {
        $current = $current->left;
    }
    return $current;
}

function insert($root, $data): Node
{
    if ($root == NULL) {
        return newNode($data);
    }
    if ($data < $root->data) {
        $root->left = insert($root->left, $data);
    } else {
        $root->right = insert($root->right, $data);
    }
    return $root;
}

function delete($root, $data): Node
{
    if ($root == NULL) {
        return $root;
    } else if ($data < $root->data) {
        $root->left = delete($root->left, $data);
    } else if ($data > $root->data) {
        $root->right = delete($root->right, $data);
    } else {
        if ($root->left == NULL) {
            $temp = $root->right;
            $root = NULL;
            return $temp;
        } else if ($root->right == NULL) {
            $temp = $root->left;
            $root = NULL;
            return $temp;
        }
        $temp = minValueNode($root->right);
        $root->data = $temp->data;
        $root->right = delete($root->right, $temp->data);
    }
    return $root;
}

$root = NULL;
$root = insert($root, 8);
$root = insert($root, 3);
$root = insert($root, 1);
$root = insert($root, 6);
$root = insert($root, 7);
$root = insert($root, 10);
$root = insert($root, 14);
$root = insert($root, 4);

echo "Inorder traversal: ";
inorder($root);
echo "<br/>\n";
echo "\nAfter deleting 10\n";
$root = delete($root, 10);
echo "<br/>\n";
echo "Inorder traversal: ";
inorder($root);
