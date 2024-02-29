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

function printInorder($root){
    if($root == NULL){
        return;
    }
    printInorder($root->left);
    echo "[ " . $root->data . " ";
    if($root->random == NULL){
        echo ", NULL ";
    }else{
        echo ", " . $root->random->data . " ";
    }
    echo "] ";
    printInorder($root->right);
}

function copyLeftRightNode($treeNode,&$map){
    if($treeNode == NULL){
        return NULL;
    }
    $cloneNode = new Node($treeNode->data);
    $map[serialize($treeNode)] = $cloneNode;
    $cloneNode->left = copyLeftRightNode($treeNode->left,$map);
    $cloneNode->right = copyLeftRightNode($treeNode->right,$map);
    return $cloneNode;
}

function copyRandom($treeNode,&$map){
    if($treeNode == NULL){
        return;
    }
    $map[serialize($treeNode)]->random = $map[serialize($treeNode->random)];
    copyRandom($treeNode->left,$map);
    copyRandom($treeNode->right,$map);
}

function cloneTree($tree){
    if($tree == NULL){
        return NULL;
    }
    $myMap = array();
    $newTree = copyLeftRightNode($tree,$myMap);
    copyRandom($tree,$myMap);
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