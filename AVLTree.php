<?php

class Node
{
    public $data;
    public $left;
    public $right;
    public $height;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
        $this->height = 1;
    }
}

function getHeight($node): int
{
    if ($node == NULL) {
        return 0;
    }
    return $node->height;
}

function getMax($a, $b): int
{
    return ($a > $b) ? $a : $b;
}

function balanceFactor($node): int
{
    if ($node == NULL) {
        return 0;
    }
    return getHeight($node->left) - getHeight($node->right);
}

function nodeWithMinValue($node): Node
{
    if ($node == NULL) {
        return $node;
    }
    $current = $node;
    while ($current->left != NULL) {
        $current = $current->left;
    }
    return $current;
}

function newNode($data): Node
{
    $node = new Node($data);
    return $node;
}

function rightRotate($y): Node
{
    $x = $y->left;
    $temp = $x->right;
    $x->right = $y;
    $y->left = $temp;
    $x->height = max(getHeight($x->left), getHeight($x->right)) + 1;
    $y->height = max(getHeight($y->left), getHeight($y->right)) + 1;
    return $x;
}

function leftRotate($x): Node
{
    $y = $x->right;
    $temp = $y->left;
    $y->left = $x;
    $x->right = $temp;
    $x->height = max(getHeight($x->left), getHeight($x->right)) + 1;
    $y->height = max(getHeight($y->left), getHeight($y->right)) + 1;
    return $y;
}

function insertNode(&$node, $data): Node
{
    if ($node == NULL) {
        return newNode($data);
    } else if ($data < $node->data) {
        $node->left = insertNode($node->left, $data);
    } else if ($data > $node->data) {
        $node->right = insertNode($node->right, $data);
    } else {
        return $node;
    }
    $node->height = 1 + max(getHeight($node->left), getHeight($node->right));
    $balanceFactor = balanceFactor($node);
    if ($balanceFactor > 1) {
        if ($data < $node->left->data) {
            return rightRotate($node);
        } else if ($data > $node->left->data) {
            $node->left = leftRotate($node->left);
            return rightRotate($node);
        }
    }
    if ($balanceFactor < -1) {
        if ($data > $node->right->data) {
            return leftRotate($node);
        } else if ($data < $node->right->data) {
            $node->right = rightRotate($node->right);
            return leftRotate($node);
        }
    }
    return $node;
}

function deleteNode(&$node, $data)
{
    if ($node == NULL) {
        return $node;
    }
    if ($data < $node->data) {
        $node->left = deleteNode($node->left, $data);
    } else if ($data > $node->data) {
        $node->right = deleteNode($node->right, $data);
    } else {
        if ($node->left == NULL || $node->right == NULL) {
            $temp = $node->left ? $node->left : $node->right;
            if ($temp == NULL) {
                $temp = $node;
                $node = NULL;
            } else {
                $node = $temp;
            }
            $temp = NULL;
        } else {
            $temp = nodeWithMinValue($node->right);
            $node->data = $temp->data;
            $node->right = deleteNode($node->right, $temp->data);
        }
    }
    if ($node == NULL) {
        return $node;
    }
    $node->height = 1 + max(getHeight($node->left), getHeight($node->right));
    $balanceFactor = balanceFactor($node);
    if ($balanceFactor > 1) {
        if (balanceFactor($node->left) >= 0) {
            return rightRotate($node);
        } else {
            $node->left = leftRotate($node->left);
            return rightRotate($node);
        }
    }
    if ($balanceFactor < -1) {
        if (balanceFactor($node->right) <= 0) {
            return leftRotate($node);
        } else {
            $node->right = rightRotate($node->right);
            return leftRotate($node);
        }
    }
    return $node;
}

function printTree($node, $indent, $last): void
{
    if ($node != NULL) {
        echo $indent;
        if ($last) {
            echo "R----";
            $indent .= "     ";
        } else {
            echo "L----";
            $indent .= "|    ";
        }
        echo $node->data;
        echo "<br/>\n";
        printTree($node->left, $indent, false);
        printTree($node->right, $indent, true);
    }
}

$root = NULL;
$root = insertNode($root, 33);
$root = insertNode($root, 13);
$root = insertNode($root, 53);
$root = insertNode($root, 9);
$root = insertNode($root, 21);
$root = insertNode($root, 61);
$root = insertNode($root, 8);
$root = insertNode($root, 11);
printTree($root, "", true);
$root = deleteNode($root, 13);
echo "<br/>\n";
printTree($root, "", true);


/* 
// AVL tree implementation in C++

#include <iostream>
using namespace std;

class Node {
   public:
  int key;
  Node *left;
  Node *right;
  int height;
};

int max(int a, int b);

// Calculate height
int height(Node *N) {
  if (N == NULL)
    return 0;
  return N->height;
}

int max(int a, int b) {
  return (a > b) ? a : b;
}

// New node creation
Node *newNode(int key) {
  Node *node = new Node();
  node->key = key;
  node->left = NULL;
  node->right = NULL;
  node->height = 1;
  return (node);
}

// Rotate right
Node *rightRotate(Node *y) {
  Node *x = y->left;
  Node *T2 = x->right;
  x->right = y;
  y->left = T2;
  y->height = max(height(y->left),
          height(y->right)) +
        1;
  x->height = max(height(x->left),
          height(x->right)) +
        1;
  return x;
}

// Rotate left
Node *leftRotate(Node *x) {
  Node *y = x->right;
  Node *T2 = y->left;
  y->left = x;
  x->right = T2;
  x->height = max(height(x->left),
          height(x->right)) +
        1;
  y->height = max(height(y->left),
          height(y->right)) +
        1;
  return y;
}

// Get the balance factor of each node
int getBalanceFactor(Node *N) {
  if (N == NULL)
    return 0;
  return height(N->left) -
       height(N->right);
}

// Insert a node
Node *insertNode(Node *node, int key) {
  // Find the correct postion and insert the node
  if (node == NULL)
    return (newNode(key));
  if (key < node->key)
    node->left = insertNode(node->left, key);
  else if (key > node->key)
    node->right = insertNode(node->right, key);
  else
    return node;

  // Update the balance factor of each node and
  // balance the tree
  node->height = 1 + max(height(node->left),
               height(node->right));
  int balanceFactor = getBalanceFactor(node);
  if (balanceFactor > 1) {
    if (key < node->left->key) {
      return rightRotate(node);
    } else if (key > node->left->key) {
      node->left = leftRotate(node->left);
      return rightRotate(node);
    }
  }
  if (balanceFactor < -1) {
    if (key > node->right->key) {
      return leftRotate(node);
    } else if (key < node->right->key) {
      node->right = rightRotate(node->right);
      return leftRotate(node);
    }
  }
  return node;
}

// Node with minimum value
Node *nodeWithMimumValue(Node *node) {
  Node *current = node;
  while (current->left != NULL)
    current = current->left;
  return current;
}

// Delete a node
Node *deleteNode(Node *root, int key) {
  // Find the node and delete it
  if (root == NULL)
    return root;
  if (key < root->key)
    root->left = deleteNode(root->left, key);
  else if (key > root->key)
    root->right = deleteNode(root->right, key);
  else {
    if ((root->left == NULL) ||
      (root->right == NULL)) {
      Node *temp = root->left ? root->left : root->right;
      if (temp == NULL) {
        temp = root;
        root = NULL;
      } else
        *root = *temp;
      free(temp);
    } else {
      Node *temp = nodeWithMimumValue(root->right);
      root->key = temp->key;
      root->right = deleteNode(root->right,
                   temp->key);
    }
  }

  if (root == NULL)
    return root;

  // Update the balance factor of each node and
  // balance the tree
  root->height = 1 + max(height(root->left),
               height(root->right));
  int balanceFactor = getBalanceFactor(root);
  if (balanceFactor > 1) {
    if (getBalanceFactor(root->left) >= 0) {
      return rightRotate(root);
    } else {
      root->left = leftRotate(root->left);
      return rightRotate(root);
    }
  }
  if (balanceFactor < -1) {
    if (getBalanceFactor(root->right) <= 0) {
      return leftRotate(root);
    } else {
      root->right = rightRotate(root->right);
      return leftRotate(root);
    }
  }
  return root;
}

// Print the tree
void printTree(Node *root, string indent, bool last) {
  if (root != nullptr) {
    cout << indent;
    if (last) {
      cout << "R----";
      indent += "   ";
    } else {
      cout << "L----";
      indent += "|  ";
    }
    cout << root->key << endl;
    printTree(root->left, indent, false);
    printTree(root->right, indent, true);
  }
}

int main() {
  Node *root = NULL;
  root = insertNode(root, 33);
  root = insertNode(root, 13);
  root = insertNode(root, 53);
  root = insertNode(root, 9);
  root = insertNode(root, 21);
  root = insertNode(root, 61);
  root = insertNode(root, 8);
  root = insertNode(root, 11);
  printTree(root, "", true);
  root = deleteNode(root, 13);
  cout << "After deleting " << endl;
  printTree(root, "", true);
}
*/