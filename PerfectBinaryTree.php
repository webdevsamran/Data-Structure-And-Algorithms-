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

function depth($root): int
{
    $depth = 0;
    while ($root != NULL) {
        $depth++;
        $root = $root->left;
    }
    return $depth;
}

function isPerfectTree($root): bool
{
    $depth = depth($root);
    return isPerfect($root, $depth);
}

function isPerfect($root, $depth, $level = 0): bool
{
    if ($root == NULL) {
        return true;
    }
    if ($root->left == NULL && $root->right == NULL) {
        return ($depth == $level + 1);
    }
    if ($root->left == NULL || $root->right == NULL) {
        return false;
    }
    return isPerfect($root->left, $depth, $level + 1) && isPerfect($root->right, $depth, $level + 1);
}

$root = new Node(1);
$root->left = new Node(2);
$root->right = new Node(3);
$root->left->left = new Node(4);
$root->left->right = new Node(5);
$root->left->right->left = new Node(6);
$root->left->right->right = new Node(7);

if (isPerfectTree($root))
    echo "The tree is a Perfect binary tree\n";
else
    echo "The tree is not a Perfect binary tree\n";

echo "<br/>";

$root1 = new Node(1);
$root1->left = new Node(2);
$root1->right = new Node(3);
$root1->left->left = new Node(4);
$root1->left->right = new Node(5);
$root1->right->left = new Node(6);
$root1->right->right = new Node(7);

if (isPerfectTree($root1))
    echo "The tree is a Perfect binary tree\n";
else
    echo "The tree is not a Perfect binary tree\n";

/* 
// Checking if a binary tree is a perfect binary tree in C++

#include <iostream>
using namespace std;

struct Node {
  int key;
  struct Node *left, *right;
};

int depth(Node *node) {
  int d = 0;
  while (node != NULL) {
    d++;
    node = node->left;
  }
  return d;
}

bool isPerfectR(struct Node *root, int d, int level = 0) {
  if (root == NULL)
    return true;

  if (root->left == NULL && root->right == NULL)
    return (d == level + 1);

  if (root->left == NULL || root->right == NULL)
    return false;

  return isPerfectR(root->left, d, level + 1) &&
       isPerfectR(root->right, d, level + 1);
}

bool isPerfect(Node *root) {
  int d = depth(root);
  return isPerfectR(root, d);
}

struct Node *newNode(int k) {
  struct Node *node = new Node;
  node->key = k;
  node->right = node->left = NULL;
  return node;
}

int main() {
  struct Node *root = NULL;
  root = newNode(1);
  root->left = newNode(2);
  root->right = newNode(3);
  root->left->left = newNode(4);
  root->left->right = newNode(5);
  root->right->left = newNode(6);

  if (isPerfect(root))
    cout << "The tree is a perfect binary tree\n";
  else
    cout << "The tree is not a perfect binary tree\n";
}
*/