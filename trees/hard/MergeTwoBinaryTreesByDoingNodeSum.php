<?php

class Node{
    public $data;
    public $left;
    public $right;

    function __construct($data)
    {
        $this->data = $data;
        $this->left = $this->right = NULL;
    }
}

function inorder($node)
{
    if (!$node)
        return;
    inorder($node->left);
    echo $node->data . " ";
    inorder($node->right);
}

function MergeTrees($root1,$root2){
    if(!$root1){
        return $root2;
    }
    if(!$root2){
        return $root1;
    }
    $root1->data += $root2->data;
    $root1->left = MergeTrees($root1->left,$root2->left);
    $root1->right = MergeTrees($root1->right,$root2->right);
    return $root1;
}

$root1 = new Node(1);
$root1->left = new Node(2);
$root1->right = new Node(3);
$root1->left->left = new Node(4);
$root1->left->right = new Node(5);
$root1->right->right = new Node(6);

$root2 = new Node(4);
$root2->left = new Node(1);
$root2->right = new Node(7);
$root2->left->left = new Node(3);
$root2->right->left = new Node(2);
$root2->right->right = new Node(6);

$root3 = MergeTrees($root1, $root2);
printf("The Merged Binary Tree is: ");
    inorder($root3);