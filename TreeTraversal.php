<?php

class Node{
    public $data;
    public $left;
    public $right;

    function __construct($data){
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
    }
}

function preOrderTraversal(&$node) : void {
    if($node == NULL){
        return;
    }
    echo $node->data." ";
    preOrderTraversal($node->left);
    preOrderTraversal($node->right);
}

function inOrderTraversal(&$node) : void {
    if($node == NULL){
        return;
    }
    preOrderTraversal($node->left);
    echo $node->data." ";
    preOrderTraversal($node->right);
}

function postOrderTraversal(&$node) : void {
    if($node == NULL){
        return;
    }
    preOrderTraversal($node->left);
    preOrderTraversal($node->right);
    echo $node->data." ";
}

$node = new Node(1);
$node->left = new Node(2);
$node->right = new Node(3);
$node->left->left = new Node(4);
$node->left->right = new Node(5);
$node->right->left = new Node(6);
$node->right->right = new Node(7);

echo "PreOrder Traversal: ";
preOrderTraversal($node);
echo "<br/>";

echo "InOrder Traversal: ";
inOrderTraversal($node);
echo "<br/>";

echo "PostOrder Traversal: ";
postOrderTraversal($node);
echo "<br/>";

/* 
// Tree traversal in C++

#include <iostream>
using namespace std;

struct Node {
  int data;
  struct Node *left, *right;
  Node(int data) {
    this->data = data;
    left = right = NULL;
  }
};

// Preorder traversal
void preorderTraversal(struct Node* node) {
  if (node == NULL)
    return;

  cout << node->data << "->";
  preorderTraversal(node->left);
  preorderTraversal(node->right);
}

// Postorder traversal
void postorderTraversal(struct Node* node) {
  if (node == NULL)
    return;

  postorderTraversal(node->left);
  postorderTraversal(node->right);
  cout << node->data << "->";
}

// Inorder traversal
void inorderTraversal(struct Node* node) {
  if (node == NULL)
    return;

  inorderTraversal(node->left);
  cout << node->data << "->";
  inorderTraversal(node->right);
}

int main() {
  struct Node* root = new Node(1);
  root->left = new Node(12);
  root->right = new Node(9);
  root->left->left = new Node(5);
  root->left->right = new Node(6);

  cout << "Inorder traversal ";
  inorderTraversal(root);

  cout << "\nPreorder traversal ";
  preorderTraversal(root);

  cout << "\nPostorder traversal ";
  postorderTraversal(root);
*/