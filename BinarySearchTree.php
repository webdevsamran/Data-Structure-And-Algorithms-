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

/* 
// Binary Search Tree operations in C++

#include <iostream>
using namespace std;

struct node {
  int key;
  struct node *left, *right;
};

// Create a node
struct node *newNode(int item) {
  struct node *temp = (struct node *)malloc(sizeof(struct node));
  temp->key = item;
  temp->left = temp->right = NULL;
  return temp;
}

// Inorder Traversal
void inorder(struct node *root) {
  if (root != NULL) {
    // Traverse left
    inorder(root->left);

    // Traverse root
    cout << root->key << " -> ";

    // Traverse right
    inorder(root->right);
  }
}

// Insert a node
struct node *insert(struct node *node, int key) {
  // Return a new node if the tree is empty
  if (node == NULL) return newNode(key);

  // Traverse to the right place and insert the node
  if (key < node->key)
    node->left = insert(node->left, key);
  else
    node->right = insert(node->right, key);

  return node;
}

// Find the inorder successor
struct node *minValueNode(struct node *node) {
  struct node *current = node;

  // Find the leftmost leaf
  while (current && current->left != NULL)
    current = current->left;

  return current;
}

// Deleting a node
struct node *deleteNode(struct node *root, int key) {
  // Return if the tree is empty
  if (root == NULL) return root;

  // Find the node to be deleted
  if (key < root->key)
    root->left = deleteNode(root->left, key);
  else if (key > root->key)
    root->right = deleteNode(root->right, key);
  else {
    // If the node is with only one child or no child
    if (root->left == NULL) {
      struct node *temp = root->right;
      free(root);
      return temp;
    } else if (root->right == NULL) {
      struct node *temp = root->left;
      free(root);
      return temp;
    }

    // If the node has two children
    struct node *temp = minValueNode(root->right);

    // Place the inorder successor in position of the node to be deleted
    root->key = temp->key;

    // Delete the inorder successor
    root->right = deleteNode(root->right, temp->key);
  }
  return root;
}

// Driver code
int main() {
  struct node *root = NULL;
  root = insert(root, 8);
  root = insert(root, 3);
  root = insert(root, 1);
  root = insert(root, 6);
  root = insert(root, 7);
  root = insert(root, 10);
  root = insert(root, 14);
  root = insert(root, 4);

  cout << "Inorder traversal: ";
  inorder(root);

  cout << "\nAfter deleting 10\n";
  root = deleteNode(root, 10);
  cout << "Inorder traversal: ";
  inorder(root);
}
*/