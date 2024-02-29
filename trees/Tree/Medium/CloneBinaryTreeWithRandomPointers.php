<?php

class Node{
    public $data;
    public $left;
    public $right;
    public $random;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = $this->random = NULL;
    }
}

function printInorder($node)
{
    if ($node == NULL)
        return;
    printInorder($node->left);
    echo "[" . $node->data . " ";
    if ($node->random == NULL)
        echo "NULL], ";
    else
        echo $node->random->data . "], ";
    printInorder($node->right);
}

function copyLeftRightNode($tree,&$map){
    if(!$tree){
        return NULL;
    }
    $cloneNode = new Node($tree->data);
    $map[serialize($tree)] = $cloneNode;
    $cloneNode->left = copyLeftRightNode($tree->left,$map);
    $cloneNode->right = copyLeftRightNode($tree->right,$map);
    return $cloneNode;
}

function copyRandom($tree,&$map){
    if(!$tree){
        return;
    }
    $map[serialize($tree)]->random = $map[serialize($tree->random)];
    copyRandom($tree->left,$map);
    copyRandom($tree->right,$map);
}

function cloneTree($tree){
    if(!$tree){
        return NULL;
    }
    $map = array();
    $newTree = copyLeftRightNode($tree, $map);
    copyRandom($tree, $map);
    return $newTree;
}

$tree = new Node(1);
$tree->left = new Node(2);
$tree->right = new Node(3);
$tree->left->left = new Node(4);
$tree->left->right = new Node(5);
$tree->random = $tree->left->right;
$tree->left->left->random = $tree;
$tree->left->right->random = $tree->right;

echo "Inorder traversal of original binary tree is: <br/>";
printInorder($tree);
$clone = cloneTree($tree);
echo "<br/><br/>Inorder traversal of cloned binary tree is: <br/>";
printInorder($clone);