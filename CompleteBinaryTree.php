<?php

class Node
{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
    }
}

function countNodes($root): int
{
    if ($root == NULL) {
        return 0;
    }
    return (1 + countNodes($root->left) + countNodes($root->right));
}

function isCompleteTree($root, $index, $nodes_len): bool
{
    if ($root == NULL) {
        return true;
    }
    if ($index >= $nodes_len) {
        return false;
    }
    return (isCompleteTree($root->left, (2 * $index) + 1, $nodes_len) && isCompleteTree($root->right, (2 * $index) + 2, $nodes_len));
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->left->right->left = new Node(6);
// $root->left->right->right = new Node(7);

$totalnodes = countNodes($root);
$index = 0;

if (isCompleteTree($root, $index, $totalnodes))
    echo "The tree is a Complete binary tree\n";
else
    echo "The tree is not a Complete binary tree\n";

/* 
// Checking if a binary tree is a complete binary tree in C++

#include <iostream>

using namespace std;

struct Node {
  int key;
  struct Node *left, *right;
};

// Create node
struct Node *newNode(char k) {
  struct Node *node = (struct Node *)malloc(sizeof(struct Node));
  node->key = k;
  node->right = node->left = NULL;
  return node;
}

// Count the number of nodes
int countNumNodes(struct Node *root) {
  if (root == NULL)
    return (0);
  return (1 + countNumNodes(root->left) + countNumNodes(root->right));
}

// Check if the tree is a complete binary tree
bool checkComplete(struct Node *root, int index, int numberNodes) {
  
  // Check if the tree is empty
  if (root == NULL)
    return true;

  if (index >= numberNodes)
    return false;

  return (checkComplete(root->left, 2 * index + 1, numberNodes) && checkComplete(root->right, 2 * index + 2, numberNodes));
}

int main() {
  struct Node *root = NULL;
  root = newNode(1);
  root->left = newNode(2);
  root->right = newNode(3);
  root->left->left = newNode(4);
  root->left->right = newNode(5);
  root->right->left = newNode(6);

  int node_count = countNumNodes(root);
  int index = 0;

  if (checkComplete(root, index, node_count))
    cout << "The tree is a complete binary tree\n";
  else
    cout << "The tree is not a complete binary tree\n";
}

*/